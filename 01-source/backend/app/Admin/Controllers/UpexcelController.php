<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;

use Illuminate\Support\MessageBag;
use Encore\Admin\Facades\Admin;
use App\Admin\Extensions\ShowArtwork;
use Illuminate\Http\Request; 
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EquipImport;
use App\Models\Equipment;
use App\Models\ETable;
use App\Models\EquipNode;
use App\Models\EquipShelf;
use App\Models\Shelf;

class UpexcelController extends Controller{

    public function index(Content $content){
        return $content
            ->header('Upload')
            ->body($this->grid());
    }

    public function grid(){
        $grid->tools(function ($tools) {
            $tools->append(new GlobalUploadButton());
        });
    }
    
    /**
     * 解析excel,向工具表添加数据
     */
    public function upload(Request $request)
    {
        //获得请求的方法
        $method = $request->method();

        //post请求则解析文件
        if ($method == 'POST')
        {

            //按时间命名文件
            $name = time().'.xls';

            //文件保存到storage/app/public
            $path = $request->file('upfile')->storeAs('public',$name);

            $res = Excel::toArray(new EquipImport, request()->file('upfile'));
            
            for($i=1;$i<count($res[0]);$i++)//res[0]第一个表格多少行
            {

                $Equ = new ETable();
                $Equ->equip_type_id   = $res[0][$i][0];
                $Equ->install_type    = $res[0][$i][1];
                $Equ->garden_id       = $res[0][$i][2];
                $Equ->block_id        = $res[0][$i][3];
                $Equ->name            = $res[0][$i][4];
                /**
                 * 加入验证，如果code为空则跳出 for 循环
                 */
                if($res[0][$i][5]=='')
                {
                    break;
                }
                $Equ->code            = $res[0][$i][5];
                $Equ->address         = $res[0][$i][6];
                $Equ->desc            = $res[0][$i][7];
                $Equ->equip_list      = $res[0][$i][8];
                $Equ->user_id         = $res[0][$i][9];
                $Equ->status          = $res[0][$i][10];
                $Equ->kind_code       = $res[0][$i][11];
                $Equ->vulgo           = $res[0][$i][12];
                $Equ->unit_type       = $res[0][$i][13];
                $Equ->manage_type     = $res[0][$i][14];
                $Equ->use_frequency   = $res[0][$i][15];
                $Equ->manage_division = $res[0][$i][16];
                $Equ->veri_division   = $res[0][$i][17];
                $Equ->tools_classify  = $res[0][$i][18];
                $Equ->device_classify = $res[0][$i][19];
                $Equ->interface_type  = $res[0][$i][20];
                $Equ->function        = $res[0][$i][21];
                $Equ->mainten_object  = $res[0][$i][22];
                $Equ->manufacturer    = $res[0][$i][23];
                $Equ->unit_measure    = $res[0][$i][24];
                $Equ->need_mainte     = $res[0][$i][25];
                $Equ->mainte_period   = $res[0][$i][26];
                $Equ->length          = $res[0][$i][27];
                $Equ->wide            = $res[0][$i][28];//宽= $res[0][$i][0];
                $Equ->high            = $res[0][$i][29];//高= $res[0][$i][0];
                $Equ->weight          = $res[0][$i][30];//重量= $res[0][$i][0];
                $Equ->refer_price     = $res[0][$i][31];//参考价格= $res[0][$i][0];
                $Equ->private         = $res[0][$i][32];//是否专用= $res[0][$i][0];
                $Equ->perform_para    = $res[0][$i][33];//性能参数= $res[0][$i][0];
                $Equ->reqveri         = $res[0][$i][34];//是否需要检定= $res[0][$i][0];
                $Equ->veri_period     = $res[0][$i][35];//检定周期= $res[0][$i][0];
                $Equ->veri_require    = $res[0][$i][36];//检定要求= $res[0][$i][0];
                $Equ->verimax         = $res[0][$i][37];//检定上限= $res[0][$i][0];
                $Equ->verimin         = $res[0][$i][38];//检定下限= $res[0][$i][0];
                $Equ->nationality     = $res[0][$i][39];//国别= $res[0][$i][0];
                $Equ->device_life     = $res[0][$i][40];//设备寿命= $res[0][$i][0];
                $Equ->shelf_product   = $res[0][$i][41];//是否货架产品= $res[0][$i][0];
                $Equ->entrance        = $res[0][$i][42];//是否进口= $res[0][$i][0];
                $Equ->random_acc      = $res[0][$i][43];//随机附件= $res[0][$i][0];
                $Equ->remark          = $res[0][$i][44];//备注$readtable->,
                
                $Equ->save();

                /**
                 * 判断是否属于工具箱
                 */
                if((int)$res[0][$i][45]==1)
                {
                    $this->UpEquipNode($res,$i);//工具箱工具关联表函数
                    /**
                    * 判断是否为工具箱工具，工具箱工具不用加入灯关联,两种情况插入关联表
                    */

                    if((int)$res[0][$i][0]==5)
                    {
                        $this->UpEquipShevles($res, $i);//工具与灯关联表插入数据
                    }
                }
                /**
                 * 判断是否为工具箱工具，工具箱工具不用加入灯关联,两种情况插入关联表
                 */
                else
                {
                    if((int)$res[0][$i][0]==1)
                    {
                        $this->UpEquipShevles($res, $i);//工具与灯关联表插入数据
                    }
                }         
            }
                

                //提示成功信息
            $success = new MessageBag([
                'title'   => '恭喜',
                'message' => '导入成功',
            ]);

           return back()->with(compact('success'));

        }

            //如果是get请求，则返回上传页面
        if ($method == 'GET')
            {
            return Admin::content(function (Content $content) {

                $content->header('导入数据');
               // $content->description('导入数据');
                $content->body(view('GlobalUpload'));
            });
        }
    }
   
    /**
     *  工具箱关联表插入数据
     */
    public function UpEquipNode($EquNodeData, $i)
    {
        if((int)$EquNodeData[0][$i][0]!=5&& (int)$EquNodeData[0][$i][45]==1)
        {
            $EquNode = new EquipNode();
            $EquNode->equip_type_id = $EquNodeData[0][$i][0];
            /**
             * 拼接工具包编码
             */
            $Equipmentid = Equipment::where('code',substr($EquNodeData[0][$i][5], 0, 8).'00')->first();
            $EquNode->equipment_id = $Equipmentid->id;
            $EquNode->level= '0';
            $Equipmentcode = Equipment::where('code',$EquNodeData[0][$i][5])->first();  
            $EquNode->name = $Equipmentcode->id;
            $EquNode->code= $EquNodeData[0][$i][5];
            $EquNode->order  = '0';
            $EquNode->unit   = '0';
            $EquNode->desc   = '0';
            $EquNode->maxval = '0';
            $EquNode->minval = '0';
            $EquNode->status = '1';
            $EquNode->user_id= '1';
            $EquNode->save();
        }
    }

    /**
     * 灯与工具关联表插入对应信息
     */
    public function UpEquipShevles($EquShevlesData,$i)
    {
        
        $EquShelf = new EquipShelf();
        /**
        * 获取设备的id
         */
        $Equipmentid = Equipment::where('code',$EquShevlesData[0][$i][5])->first();
        $EquShelf->equipment_id = $Equipmentid->id;
           
        /**
         * 从类似 1号货架  2-2   的结构中的数据转化为货架灯的id
         * (i-1)*18 + (j-1)*6 + k   i代表货架, j代表层数, k代表节点
         * 
         */
        // $EquShelf->shelf_id = ((int)$EquShevlesData[0][$i][3]-1)*18 + ((int)substr($EquShevlesData[0][$i][6], 0, 1)-1)*6 + ;
        /**
         * $block_id是货架
         * $level是层数
         * $orderes是点
         */
        $block_id = (int)$EquShevlesData[0][$i][3];
        $level    = (int)substr($EquShevlesData[0][$i][6], 0, 1);
        $orderes =(int)pow(2, (int)substr($EquShevlesData[0][$i][6], 2, 1)-1) ;
        $EquiShelfId = Shelf::where(['block_id'=>$block_id, 'level'=>$level, 'orderes'=>$orderes])->first();
        $EquShelf->shelf_id = $EquiShelfId->id;
        $EquShelf->save();

        
    }
}
    
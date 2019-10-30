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
use App\Imports\UserInfoImport;
use App\Models\User;
use Illuminate\Support\Facades\Hash;//laravel encryption

class UpUserInfoController extends Controller{

    public function index(Content $content){
        return $content
            ->header('Upload')
            ->body($this->grid());
    }

    public function grid(){
        // $grid->tools(function ($tools) {
        //     $url = "/excel/upload";
        //     $icon = "fa-backward";
        //     $text = "导入Excel文件";
        //     $tools->append(new ShowArtwork($url,$icon,$text));
        // });
        $grid->tools(function ($tools) {
            $tools->append(new GlobalUploadButton());
        });
    }

    public function upload(Request $request)
        {
            //获得请求的方法
            $method = $request->method();

            //post请求则解析文件
            if ($method == 'POST'){

                //按时间命名文件
                $name = time().'.xls';

                //文件保存到storage/app/public
                $path = $request->file('upfile')->storeAs('public',$name);
                
                //laravelExcel内部导入
                $res = Excel::toArray(new UserInfoImport, request()->file('upfile'));
                
                    for($i=1;$i<count($res[0]);$i++)//res[0]第一个表格
                    {
                        $ui = new User();
                        $ui->name            = $res[0][$i][0];
                        $ui->password        = Hash::make($res[0][$i][1]);
                        //password encryption
                        $ui->email           = $res[0][$i][2];//$res[0][$i][2];
                        $ui->avatar          = $res[0][$i][3];//照片
                        $ui->serialnum       = $res[0][$i][4];//人员编号
                        $ui->duty            = $res[0][$i][5];//人员职务
                  
                        $ui->save();   
                    }
                

                //提示，当然，可以自己用try来处理数据库异常，这里懒得处理了。。。
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
}
    
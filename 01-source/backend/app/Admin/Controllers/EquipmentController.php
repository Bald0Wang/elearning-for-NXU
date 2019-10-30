<?php

namespace App\Admin\Controllers;

use App\Models\Equipment;
use App\Models\EquipType;
use App\Models\Garden;
use App\Models\Block;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

use Webpatser\Uuid\Uuid;

class EquipmentController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('列表')
            ->description('')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('详情')
            ->description('')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('修改')
            ->description('')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('新增')
            ->description('')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Equipment);

        $grid->id('Id');
        $grid->equip_type()->name('设备类型');
        $grid->install_type('注册类型')->display(function($install_type) {
            $dict = array(
                0 => '园区', 1 => '田块'
            );
            return $dict[$install_type];
        });
        $grid->garden()->name('园区');
        $grid->block()->name('田块');
        $grid->name('设备名称');
        $grid->code('设备代码');
        $grid->address('地址');
        $grid->desc('地址');
        $grid->user_id('用户');
        $grid->status('设备状态');
        
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Equipment::findOrFail($id));

        $show->id('Id');
        $show->equip_type_id('设备类型');
        $show->install_type('注册类型')->display(function($install_type) {
            $dict = array(
                0 => '园区', 1 => '田块'
            );
            return $dict[$install_type];
        });
        $show->garden_id('园区');
        $show->block_id('田块');
        $show->name('设备名称');
        $show->code('设备代码');
        $show->address('地址');
        $show->desc('地址');
        $show->user_id('用户');
        $show->status('设备状态');
        
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Equipment);

        $form->select('equip_type_id','设备类型')->options(EquipType::all()->pluck('name', 'id'));
        $form->select('install_type', '注册类型')->options([0 => '园区', 1 => '田块']);
        $form->select('garden_id','园区')->options(Garden::all()->pluck('name', 'id'));
        $form->select('block_id','田块')->options(Block::all()->pluck('name', 'id'));
        $form->text('name', '设备名称');
        $form->text('code', '设备代码');
        $form->text('address', '地址');
        $form->text('desc', '说明');
        $form->number('user_id', '用户');
        $form->number('status', '设备状态');
        

        return $form;
    }
}

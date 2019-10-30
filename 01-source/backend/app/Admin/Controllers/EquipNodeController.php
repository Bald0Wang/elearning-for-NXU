<?php

namespace App\Admin\Controllers;

use App\Models\EquipNode;
use App\Models\EquipType;
use App\Models\Equipment;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EquipNodeController extends Controller
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
            ->header('编辑')
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
        $grid = new Grid(new EquipNode);

        $grid->id('Id');
        $grid->equip_type()->name('设备类型');
        $grid->equipment()->name('设备名称');
        $grid->level('分层');
        $grid->name('节点名称');
        $grid->code('节点编码');
        $grid->order('显示顺序');
        $grid->unit('单位');
        $grid->desc('描述');
        $grid->maxval('最大值');
        $grid->minval('最小值');
        $grid->user_id('用户');
        $grid->status('节点状态')->display(function($status) {
            $dict = array(
                0 => '无效', 1 => '有效'
            );
            return $dict[$status];
        });

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
        $show = new Show(EquipNode::findOrFail($id));

        $show->id('Id');
        $show->equip_type()->name('设备类型');
        $show->equipment()->name('设备名称');
        $show->level('分层');
        $show->name('节点名称');
        $show->code('节点编码');
        $show->order('显示顺序');
        $show->unit('单位');
        $show->desc('描述');
        $show->maxval('最大值');
        $show->minval('最小值');
        $show->user_id('用户');
        $show->status('节点状态')->display(function($status) {
            $dict = array(
                0 => '无效', 1 => '有效'
            );
            return $dict[$status];
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new EquipNode);

        $form->select('equip_type_id','设备类型')->options(EquipType::all()->pluck('name', 'id'));
        $form->select('equipment_id','设备名称')->options(Equipment::all()->pluck('name', 'id'));
        $form->text('level', '分层');
        $form->text('name', '节点名称');
        $form->text('code', '节点编码');
        $form->number('order', '显示顺序');
        $form->text('unit', '单位');
        $form->text('desc', '描述');
        $form->decimal('maxval', '最大值')->default(0.00);
        $form->decimal('minval', '最小值')->default(0.00);
        $form->number('user_id', '用户');
        $form->select('status', '节点状态')->options([1=>'有效',0=>'无效']);

        return $form;
    }
}

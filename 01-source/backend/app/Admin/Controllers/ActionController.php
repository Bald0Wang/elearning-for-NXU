<?php

namespace App\Admin\Controllers;

use App\Models\Action;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\ActionType;
use App\Models\Block;

class ActionController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('活动');
            $content->description('列表');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('修改');
            $content->description('');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('新增');
            $content->description('');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Action::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('操作');
            $grid->desc('说明');
            $grid->action_type()->name('操作类型');
            $grid->block_inst()->name('田块');
            $grid->unit('计量单位');
            $grid->quant('数量');
            $grid->user_id('操作人');
            $grid->status('状态')->display(function($status) {
                $dict = array(
                    0 => '未完成', 1 => '已完成'
                );
                return $dict[$status];
            });
           
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Action::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '操作');
            $form->text('desc', '说明');
            $form->select('action_type_id', '操作类型')->options(ActionType::all()->pluck('name', 'id'));
            $form->select('block_inst_id', '田块')->options(Block::all()->pluck('name', 'id'));
            $form->text('unit', '计量单位');
            $form->text('quant', '数量');
            $form->text('user_id', '操作人');
            $form->select('status','状态')->options([1=>'已完成',0=>'未完成']);   
        });
    }
}

<?php

namespace App\Admin\Controllers;

use App\Models\BlockInstIndexData;
use App\Models\BlockInst;
use App\Models\Block;
use App\Models\Plant;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\User;

class BlockInstIndexDataController extends Controller
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

            $content->header('田块');
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

            $content->header('田块');
            $content->description('列表');

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

            $content->header('田块');
            $content->description('列表');

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
        return Admin::grid(BlockInstIndexData::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->block_inst_id('作物');
            $grid->index_id('作物指标');
            $grid->name('名称');
            $grid->content('描述');
            $grid->value('测量值');
            $grid->status('状态');
            $grid->user_id('创建人');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(BlockInstIndexData::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('block_inst_id','作物');
            $form->text('index_id','作物指标');
            $form->text('name', '名称');
            $form->text('content', '描述');
            $form->text('value', '测量值');
            $form->text('user_id','创建人');
            $form->select('status', '状态')->options(['0', '1']);
        });
    }
}
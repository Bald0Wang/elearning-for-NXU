<?php

namespace App\Admin\Controllers;

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

class BlockInstController extends Controller
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

            $content->header('田块实例');
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

            $content->header('田块实例');
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

            $content->header('田块实例');
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
        return Admin::grid(BlockInst::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->block_id('田块');
            $grid->plant_id('作物');
            $grid->num('作物株数');
            $grid->user_id('创建人');
            $grid->status('状态');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(BlockInst::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('block_id','田块');
            $form->text('plant_id','作物');
            $form->text('num', '作物株数');
            $form->text('user_id','创建人');
            $form->select('status', '状态')->options(['0', '1']);
        });
    }
}

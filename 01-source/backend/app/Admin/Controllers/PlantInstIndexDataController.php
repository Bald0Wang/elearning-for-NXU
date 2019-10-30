<?php

namespace App\Admin\Controllers;

use App\Models\PlantInstIndexData;
use App\Models\Plant;
use App\Models\Category;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class PlantInstIndexDataController extends Controller
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

            $content->header('农作物');
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

            $content->header('农作物');
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

            $content->header('农作物');
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
        return Admin::grid(PlantInstIndexData::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->plant_inst_id('作物实例');
            $grid->index_id('作物指标');
            $grid->name('名称');
            $grid->content('描述');
            $grid->value('测量值');
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
        return Admin::form(PlantInstIndexData::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('plant_inst_id','作物实例');
            $form->text('index_id', '作物指标');
            $form->text('name', '名称');
            $form->text('content', '描述');
            $form->text('value', '测量值');
            $form->text('user_id','创建人');
            $form->select('status', '状态')->options(['0', '1']);
        });
    }
}

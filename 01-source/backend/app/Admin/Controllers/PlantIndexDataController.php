<?php

namespace App\Admin\Controllers;

use App\Models\PlantIndexData;
use App\Models\Plant;
use App\Models\Category;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class PlantIndexDataController extends Controller
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
        return Admin::grid(PlantIndexData::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->plant_id('作物');
            $grid->index_id('作物指标');
            $grid->name('名称');
            $grid->desc('描述');
            $grid->begin_early('最早开始时间');
            $grid->begin_late('最晚开始时间');
            $grid->end_early('最早开始时间');
            $grid->end_late('最晚开始时间');
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
        return Admin::form(PlantIndexData::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('plant_id','作物');
            $form->text('index_id', '作物指标');
            $form->text('name', '名称');
            $form->text('desc', '描述');
            $form->text('begin_early', '最早开始时间');
            $form->text('begin_late','最晚开始时间');
            $form->text('end_early', '最早开始时间');
            $form->text('end_late', '最晚开始时间');
            $form->text('user_id', '创建人');
            $form->select('status', '状态')->options(['0', '1']);
        });
    }
}

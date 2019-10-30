<?php

namespace App\Admin\Controllers;

use App\Models\Garden;
use App\Models\Location;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class GardenController extends Controller
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

            $content->header('园区');
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

            $content->header('园区');
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

            $content->header('园区');
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
        return Admin::grid(Garden::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('园区名称');
            $grid->desc('园区介绍');
            $grid->principal('负责人');
            $grid->phone('园区联系电话');
            $grid->image('园区图片');
            $grid->icon('园区图标');
            $grid->location_id('园区所属地区');
            $grid->area('面积(平方米)');
            $grid->cultivated_area('耕种面积(平方米)');
            $grid->coordinate('园区中心坐标');
            $grid->border('园区边界坐标');
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
        return Admin::form(Garden::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '园区名称');
            $form->text('desc', '园区介绍');
            $form->text('principal', '负责人');
            $form->mobile('phone', '园区联系电话')->options(['mask' => '999 9999 9999']);
            $form->image('image', '园区图片')->move('public/images/');
            $form->text('icon', '园区图标');
            $form->text('location_id','园区所属地区');
            $form->text('area', '面积(平方米)');
            $form->text('cultivated_area', '耕种面积(平方米)');
            $form->text('coordinate', '园区中心坐标');
            $form->text('border', '园区边界坐标');
            $form->select('status', '状态')->options(['0','1']);
            $form->text('user_id', '创建人');
        });
    }
}

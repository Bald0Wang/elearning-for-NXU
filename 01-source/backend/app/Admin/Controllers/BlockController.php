<?php

namespace App\Admin\Controllers;

use App\Models\Block;
use App\Models\Garden;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GardenController;
use Encore\Admin\Controllers\ModelForm;

class BlockController extends Controller
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
        return Admin::grid(Block::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('名称');
            $grid->garden_id('园区');
            $grid->principal('负责人');
            $grid->phone('联系电话');
            $grid->area('面积');
            $grid->coordinate('田块中心坐标');
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
        return Admin::form(Block::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name','名称');
            $form->select('garden_id','园区')->options(Garden::all()->pluck('name', 'id'));
            $form->text('principal','负责人');
            $form->mobile('phone','联系电话');
            $form->text('area','面积');
            $form->text('coordinate','田块中心坐标');
            $form->text('border','园区边界坐标');
            $form->text('user_id','创建人');
            $form->select('status','状态')->options(['0','1']);
        });
    }
}

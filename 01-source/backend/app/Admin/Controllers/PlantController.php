<?php

namespace App\Admin\Controllers;

use App\Models\Plant;
use App\Models\Category;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class PlantController extends Controller
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
        return Admin::grid(Plant::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->category_id('作物类型');
            $grid->name('作物名称');
            $grid->desc('作物说明');
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
        return Admin::form(Plant::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('category_id','作物类型');
            $form->text('name', '作物名称');
            $form->text('desc', '作物说明');
            $form->text('user_id','创建人');
            $form->select('status', '状态')->options(['0', '1']);
        });
    }
}

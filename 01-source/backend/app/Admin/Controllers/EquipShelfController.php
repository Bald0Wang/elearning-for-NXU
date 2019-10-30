<?php

namespace App\Admin\Controllers;

use App\Models\EquipShelf;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Models\Equipment;
use App\Models\Shelf;

class EquipShelfController extends Controller
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
            ->description('信息')
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
            ->description('信息')
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
            ->description('信息')
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
            ->header('创建')
            ->description('信息')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new EquipShelf);
        $grid->id('ID')->sortable();
        $grid->equipment()->name('设备名称');
        $grid->shelf()->name('货架名称');
        $grid->i2c('led地址');
        
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
        $show = new Show(EquipShelf::findOrFail($id));
        $show->id('ID');
        $show->equipment_id('设备名称');
        $show->shelf_id('货架名称');
        $show->i2c('led地址');


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new EquipShelf);
        $form->select('equipment_id','设备名称')->options(Equipment::all()->pluck('name', 'id'));
        $form->select('shelf_id','货架名称')->options(Shelf::all()->pluck('name', 'id'));
        $form->text('i2c', 'led地址');
        return $form;
    }
}

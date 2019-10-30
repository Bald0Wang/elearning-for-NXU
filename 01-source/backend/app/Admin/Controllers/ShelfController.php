<?php

namespace App\Admin\Controllers;

use App\Models\Shelf;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Models\Block;

class ShelfController extends Controller
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
            ->header('货架层次')
            ->description('列表')
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
        $grid = new Grid(new Shelf);
        $grid->id('ID')->sortable();
        $grid->block()->name();
        $grid->name('层次名称');
        $grid->level('层');
        $grid->order('顺序');
        $grid->i2c('i2C地址');
        $grid->topic('树莓派地址');
        $grid->status('状态')->display(function($status) {
            $dict = array(
                0 => '正常', 1 => '异常'
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
        $show = new Show(Shelf::findOrFail($id));
        $show->id('ID')->sortable();
        $show->block_id('货架名称');
        $show->name('层次名称');
        $show->level('层');
        $show->order('顺序');
        $show->i2c('i2C地址');
        $show->topic('树莓派地址');
        $show->status('状态')->display(function($status) {
            $dict = array(
                0 => '正常', 1 => '异常'
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
        $form = new Form(new Shelf);
        $form->display('id', 'ID');
        $form->select('block_id','货架名称')->options(Block::all()->pluck('name', 'id'));
        $form->text('name', '货架名称');
        $form->number('level', '层');
        $form->number('order', '顺序');
        $form->text('i2c', 'i2C地址');
        $form->text('topic', '树莓派地址');
        $form->select('status', '状态')->options([0 => '正常', 1 => '异常']);

        return $form;
    }
}

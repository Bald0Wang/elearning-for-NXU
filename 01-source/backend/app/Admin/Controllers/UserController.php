<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Admin\Extensions\ShowArtwork;

class UserController extends Controller
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
            ->header('用户管理')
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
        $grid = new Grid(new User);
        $grid->id('ID')->sortable();
        $grid->name('人员名称');
        $grid->password('密码');
        $grid->email('邮箱');
        $grid->avatar('人员照片');
        $grid->serialnum('人员编号');
        $grid->duty('人员职责');
        $grid->tools(function ($tools) {
            $url = "/admin/userinfo/upload";
            $icon = "fa-backward";
            $text = "上传";
            $tools->append(new ShowArtwork($url,$icon,$text));
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
        $show = new Show(User::findOrFail($id));
        $show->id('ID')->sortable();
        $show->name('人员名称');
        $show->password('密码');
        $show->email('邮箱');
        $show->avatar('人员照片');
        $show->serialnum('人员编号');
        $show->duty('人员职责');
     
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User);
        $form->display('id', 'ID');
        $form->text('name', '人员名称');
        $form->text('password', '密码');
        $form->saving(function (Form $form) {
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = bcrypt($form->password);
            }
        });
        $form->text('email', '邮箱');
        $form->image('avatar', '照片');
        $form->number('serialnum', '人员编号');
        $form->select('duty', '人员职责')->options(['管理员'=> '管理员', '维修员'=> '维修员']);
        return $form;
    }
}

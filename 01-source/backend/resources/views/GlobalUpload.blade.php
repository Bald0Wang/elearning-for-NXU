<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">导入数据</h3>
            <div class="box-tools">
                <div class="btn-group pull-right" style="margin-right: 5px">
                    <a href="{{url()->current(-1)}}" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{URL::current()}}" method="post" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" pjax-container="">

            <div class="box-body">
                <div class="fields-group">
                    <div class="form-group  ">
                        <label for="tt" class="col-sm-2  control-label">上传文件</label>
                        <div class="col-sm-8">
                            <input type="file" class="upfile" name="upfile">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="btn-group pull-right">
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                    <div class="btn-group pull-left">
                        <button type="reset" class="btn btn-warning">撤销</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="_previous_" value="{{URL::current()}}" class="_previous_">
            <!-- /.box-footer -->
        </form>
    </div>
    <div class="alert alert-info" role="alert"></div>
</div>
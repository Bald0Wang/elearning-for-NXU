@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="row page-title-row">
            <div class="col-md-6">
            <!-- 改 -->
                <h3>students index
                    <small>» students</small>
                </h3>
            </div>
            <div class="col-md-6 text-right">
            <!-- 改 -->
                <a href="/admin/students/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> 新增标签
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('admin.students.errors')
                @include('admin.students.success')
                <table id="tags-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>introdcution</th>
                        <th>usingfor</th>
                        <th>hardtype</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $tag)
                        <tr>
                            <td class="hidden-sm">{{ $tag->introdcution }}</td>
                            <td class="hidden-sm">{{ $tag->usingfor }}</td>
                            <td class="hidden-sm">{{ $tag->hardtype }}</td>
                            <!-- <td class="hidden-sm">{{ $tag->user_id }}</td> -->
                            <!-- <td class="hidden-sm">{{ $tag->eid_type_id }}</td> -->
                            <!-- <td class="hidden-sm">
                                @if ($tag->reverse_direction)
                                    逆序
                                @else
                                    升序
                                @endif
                            </td> -->
                            <td>
                            <!-- 改 -->
                                <a href="/admin/students/{{ $tag->id }}/edit" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> 编辑
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('scripts')

@stop
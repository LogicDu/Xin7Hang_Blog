@extends('adminpage')
@section('content')
    <div class="row">
        <div class="col-lg-10">
            <h1>分类管理</h1>
        </div>
        <div class="col-lg-2 veritcal-bottom">
            <a href="{!! url('categorys','create') !!}">
                <span class="fa fa-plus"></span>
                添加分类
            </a>
        </div>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>分类名称</th>
                <th>Url名称</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categorys as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->url_name }}</td>
                <td>
                    <a href="{!! url('categorys', [$category->id,'edit']) !!}" class="btn btn-sm" role="button">编辑</a>
                    <a href="{!! url('categorys', [$category->id , 'del']) !!}" class="btn btn-sm" role="button">删除</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->
@stop
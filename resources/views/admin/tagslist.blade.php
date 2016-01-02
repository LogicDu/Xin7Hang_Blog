@extends('adminpage')
@section('content')
    <div class="row">
        <div class="col-lg-10">
            <h1>标签管理</h1>
        </div>
        <div class="col-lg-2 veritcal-bottom">
            <a href="{!! url('tags','create') !!}">
                <span class="fa fa-plus"></span>
                添加标签
            </a>
        </div>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>标签</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="{!! url('tags', [$tag->id,'edit']) !!}" class="btn btn-sm" role="button">编辑</a>
                        <a href="{!! url('tags', [$tag->id , 'del']) !!}" class="btn btn-sm" role="button">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->
@endsection
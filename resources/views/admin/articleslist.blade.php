@extends('adminpage')
@section('content')
    <div class="row">
        <div class="col-lg-10">
            <h1>文章管理</h1>
        </div>
        <div class="col-lg-2 veritcal-bottom">
            <a href="{!! url('articles','create') !!}" class="btn btn-lg btn-primary">
                <span class="fa fa-plus"></span>
                添加文章
            </a>
        </div>
    </div>
    <hr>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>文章标题</th>
                <th>url名称</th>
                <th>阅读数量</th>
                <th>点赞数量</th>
                <th>发布时间</th>
                <th>创建时间</th>
                <th>上次修改时间</th>
                <th>文章状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->url_name }}</td>
                    <td>{{ $article->readed_num }}</td>
                    <td>{{ $article->like_num }}</td>
                    <td>{{ $article->published_at }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td>{{ $article->updated_at }}</td>
                    <td>
                        @if($article->status == 0 )
                            正常
                        @elseif ($article->status == 1)
                            草稿
                        @else
                            <div class="danger">删除</div>
                        @endif

                    </td>
                    <td>
                        <a href="{!! url('articles', [$article->id,'edit']) !!}" class="btn btn-sm btn-info" role="button">编辑</a>
                        <a href="{!! url('articles', [$article->id , 'del']) !!}" class="btn btn-sm btn-danger" role="button">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->
@stop
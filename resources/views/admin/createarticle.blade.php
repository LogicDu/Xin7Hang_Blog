@extends('adminpage')

@section('css')
    <link href="/bower_components/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
    {!! Form::open(array('url'=>'articles','method'=>'POST')) !!}
        <h1>添加新文章</h1>
        <!--- Title Field --->
        <div class="form-group">
            {!! Form::label('title', '标题:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <!--- url-name Field --->
        <div class="form-group">
            {!! Form::label('url_name', 'URL名称:') !!}
            {!! Form::text('url_name', null, ['class' => 'form-control']) !!}
        </div>

        <!--- content Field --->
        <div class="form-group" id="markdown-editor">
            {!! Form::label('content', '文章内容:') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            @include('common.markdown-editor')
        </div>
        <div class="col-md-6">
            <!--- Published_at Field --->
            <div class="form-group">
                {!! Form::label('published_at', 'Published_at:') !!}
                {!! Form::input('date','published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id','选择文章分类:') !!}
                {!! Form::select('category_id',$cate_array,null,['placeholder' => '请选择']) !!}
            </div>

            <!--- Tag Select Field --->
            <div class="form-group">
                {!! Form::label('tag_list','选择标签') !!}
                <div data-tags-inputs-name="tags" id="tagBox"></div>
                <div>
                    @foreach($tags as $k => $v)
                        <a class="btn btn-sm add-tags-button" href="javascript:void(0)" >{{ $v }}</a>
                    @endforeach
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <!--- image Field --->
            {!! Form::label('image','上传标题图:') !!}
            <input id="imageUpload" name="imageUpload" type="file" class="file-loading">
            <input type="hidden" name="image" id="image" value="">

        </div>
        <!--- submit Field --->
        {!! Form::submit('发布文章',['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @if($errors->any())
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
@section('scripts')
    <script type="text/javascript" src="/bower_components/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js"></script>
    <script type="text/javascript" src="/bower_components/bootstrap-fileinput/js/fileinput.js"></script>
    <script type="text/javascript" src="/bower_components/bootstrap-fileinput/js/fileinput_locale_zh.js"></script>
    <script>
        $(document).on('ready', function() {
            $("#imageUpload").fileinput({
                @if(isset($article->image ))
                    initialPreview: [
                        '<img src="{{ $article->image }}}" class="file-preview-image" alt="{{ $article->title }}" title="{{ $article->title }}">',
                    ],
                @endif
                language:   "zh",
                overwriteInitial: false,
                maxFileSize: 1024,
                uploadUrl   : "{!! url('upload/image') !!}",
                uploadExtraData:    {_token:"{{ csrf_token() }}"},
            });
            $("#imageUpload").on('fileuploaded', function(event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                        response = data.response, reader = data.reader;
                $("#image").val(response.url);
            });
        });
    </script>

@endsection
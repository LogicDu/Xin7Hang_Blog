@extends('GuestMain')
@section('css')
    <link href="http://cdn.bootcss.com/highlight.js/8.0/styles/monokai_sublime.min.css" rel="stylesheet">
@endsection
@section('title')
    {{$article->title}}_
@endsection
@section('content')
    <ol class="breadcrumb">
        <li><a href="{!! url('/') !!}">心启航</a></li>
        <li><a href="{!! url('categorys/'. $article->category->id) !!}">{{$article->category->name}}</a></li>
    </ol>
    <div class="row">
        <div class="col-md-10">
            <h1>{{ $article->title }}</h1>
            <div>
                <small><span class="glyphicon glyphicon-time"></span>  {{ $article->published_at->diffForHumans() }} </small>
                <small><span class="glyphicon glyphicon-eye-open"></span> {{ $article->readed_num }}次 </small>
                <small><span class="glyphicon glyphicon-comment"></span>  X次 </small>
                <small id="liked-num"><span class="glyphicon glyphicon-thumbs-up"></span> {{ $article->like_num }}次 </small>
                <a class="like-panel btn btn-sm" href="javascript:void(0)" article_id="{{$article->id}}">
                    <small>赞一个</small>
                </a>
                @foreach($article->tags as $tags)
                    <a href="{!! url('tags/'.$tags->id) !!}"><small><span class="glyphicon glyphicon-tag"></span> {{ $tags->name }}</small></a>
                @endforeach
            </div>
        </div>
    </div>
    <hr>
    @if(isset($article->image))
        <img src="{{ $article->image }}" alt="" class="img-responsive">
    @endif
        <article>
            <div class="body">
                {!! \Plugins\MarkDownEditor\MdeDecode::decode($article->content) !!}
            </div>
        </article>
    <!-- 多说评论框 start -->
    <div class="ds-thread" data-thread-key="{{$article->id}}" data-title="{{$article->title}}" data-url="{!! url('articles/'.$article->id) !!}"></div>
    <!-- 多说评论框 end -->
@endsection

@section('scripts')
        <script src="/vendor/jquery.cookie.js"></script>
        <script src="http://cdn.bootcss.com/highlight.js/8.0/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>
        <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
    <script type="text/javascript">
        var duoshuoQuery = {short_name:"xin7hang"};
        (function() {
            var ds = document.createElement('script');
            ds.type = 'text/javascript';ds.async = true;
            ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
            ds.charset = 'UTF-8';
            (document.getElementsByTagName('head')[0]
            || document.getElementsByTagName('body')[0]).appendChild(ds);
        })();
    </script>
    <!-- 多说公共JS代码 end -->

    <script type="text/javascript">
        $(document).ready(function(){
            if ($.cookie('liked_{{$article->id}}') == 'true'){
                $(".like-panel").attr('disabled','disabled');
                $(".like-panel").text("已经赞过了!");
            }else{
                $(".like-panel").click(function(){
                    this.disabled = true;
                    $(".like-panel").attr('disabled','disabled');
                    $(".like-panel").text("已经赞过了!");
                    $("#liked-num").html("<span class=\"glyphicon glyphicon-thumbs-up\"></span> {!! $article->like_num +1 !!}次");

                    $.get("/articles/" + $(this).attr("article_id") +"/like",function(){
                        $.cookie('liked_{{$article->id}}',true);
                    });

                });
            }
        });

    </script>
@endsection
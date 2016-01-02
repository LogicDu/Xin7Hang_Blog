@extends('GuestMain')
@section('content')

    @include("include.navbar")
    @include("include.tags")

    @foreach($articles as $article)
        <div class="media">
            <div class="media-body">
                <a href="{!! url("categorys/" . $article->category->id) !!}"> <small>{{ $article->category->name }}</small></a>
                <h2 class="media-heading"><a href="{!! url('articles',$article->id) !!}">{{ $article->title }}</a></h2>
                <blockquote>{{ $article->intro }}</blockquote>
                <div class="media-info">
                    <small><span class="glyphicon glyphicon-time"></span>  {{$article->published_at->diffForHumans()}} </small>
                    <small><span class="glyphicon glyphicon-eye-open"></span>{{$article->readed_num}}次 </small>
                    <small><span class="glyphicon glyphicon-comment"></span>X次</small>
                    <small><span class="glyphicon glyphicon-thumbs-up"></span> {{$article->like_num}}次 </small>
                    @foreach($article->tags as $tags)
                        <a href="{!! url('tags/'. $tags->id) !!}"><small><span class="glyphicon glyphicon-tag"></span> {{ $tags->name }}</small></a>
                    @endforeach
                </div>
            </div>
            @if(isset($article->image) && $article->image <> '')
                <div class="media-right media-middle">
                    <a href="{!! url('articles',$article->id) !!}">
                        <img src="{!! getThumbnil($article->image,array('width'=>100,'height'=>100)) !!}" alt="{{$article->title}}" class="media-object img-thumbnail img-responsive">
                    </a>
                </div>
            @endif
        </div>
        <div class="list-border"></div>
    @endforeach
@endsection
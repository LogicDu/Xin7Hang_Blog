@extends('adminpage')
@section('content')
    <h1>Articles</h1>

    <hr>

    @foreach($articles as $article)
        <h2><a href="{{ url('articles',$article->id) }}">{{ $article->title }}</a><small>{{ $article->published_at->diffForHumans() }}</small></h2>
        <article>

            <div class="body">
                {{ $article->content }}
            </div>
        </article>
    @endforeach

@stop
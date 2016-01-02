{{--标签按钮开始--}}
<div class="text-right">
    <span class="glyphicon glyphicon-tags"></span> 标签:
    {{--@yield('tag_button')--}}
    @foreach($tags as $tag)
        <a class="btn" href="{!! url('tags/' . $tag->id) !!}">{{ $tag->name }}</a>
    @endforeach
</div>
{{--标签按钮结束--}}
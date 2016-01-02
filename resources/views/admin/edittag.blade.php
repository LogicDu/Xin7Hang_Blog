@extends('adminpage')
@section('content')
    <h1>Edit the Tag</h1>
    <hr>
    {!! Form::model($tag,['method'=>'PATCH','url'=>'/tags/' . $tag->id]) !!}
            <!--- Category Name Field --->
    <div class="form-group">
        {!! Form::label('name', 'Tag Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <!--- Submit Field --->
    {!! Form::submit('EDIT',['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}
    @if($errors->any())
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
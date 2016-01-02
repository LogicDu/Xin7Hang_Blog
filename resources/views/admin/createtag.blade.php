@extends('adminpage')
@section('content')
    <h1>Create Tag</h1>
    <hr>
    {!! Form::open(['url'=>'/tags']) !!}
    <!--- Tag Name Field --->
    <div class="form-group">
        {!! Form::label('name', 'Tag Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    
    <!--- Create Field --->
    {!! Form::submit('Create',['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}}

    @if($errors->any())
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection
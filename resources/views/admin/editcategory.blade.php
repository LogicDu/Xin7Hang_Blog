@extends('adminpage')
@section('content')
    <h1>Edit the Category</h1>
    <hr>
    {!! Form::model($category,['method'=>'PATCH','url'=>'/categorys/' . $category->id]) !!}
            <!--- Category Name Field --->
    <div class="form-group">
        {!! Form::label('name', 'Category Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Url Name Field --->
    <div class="form-group">
        {!! Form::label('url_name', 'Url Name:') !!}
        {!! Form::text('url_name', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Create Field --->
    {!! Form::submit('EDIT',['class'=>'btn btn-primary form-control']) !!}
@endsection
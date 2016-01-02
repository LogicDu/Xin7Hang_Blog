@extends('adminpage')
@section('content')
    <div class="row">
        <div class="col-lg-10">
            <h1>创建分类</h1>
        </div>
        <div class="col-lg-2 veritcal-bottom">
            <a href="{!! url('categorys','create') !!}">
                <span class="fa fa-folder"></span>
                添加分类
            </a>
        </div>

    </div>

    <hr>
    {!! Form::open(['url'=>'/categorys']) !!}
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
    {!! Form::submit('CREATE',['class'=>'btn btn-primary form-control']) !!}
@stop
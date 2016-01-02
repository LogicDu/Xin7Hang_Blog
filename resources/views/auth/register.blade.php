@extends('GuestMain')
@section('content')
    <h1>注册用户</h1>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {!! Form::open(['url'=>'/auth/register']) !!}

            <!--- Name Field --->
            <div class="form-group">
                {!! Form::label('name', '用户名:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email','Email:') !!}
                {!! Form::email('email',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password','密码:') !!}
                {!! Form::password('password',['class' => 'form-control']) !!}
            </div>

            <!--- Password_confirmation Field --->
            <div class="form-group">
                {!! Form::label('password_confirmation', '密码确认:') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('注册',['class'=>'btn btn-primary form-control']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
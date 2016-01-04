@extends('adminpage')
@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">请登录吧</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'/auth/login']) !!}
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="密码" name="password" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">记住我
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            {!! Form::submit('登录',['class'=>'btn btn-lg btn-success btn-block']) !!}
                        </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop
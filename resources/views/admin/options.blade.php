@extends("adminpage")
@section("content")
    <h1>全局设置<small>所添加设置项用于模版显示相关设置</small></h1>
        <div class="col-md-8">
            {!! Form::open(array('url'=>'options/update','method'=>'PATCH')) !!}
            @foreach($options as $option)
                <!--- option Field --->
                <div class="form-group">
                    {!! Form::label($option->name, $option->label) !!}
                    {!! Form::text($option->name, $option->value, ['class' => 'form-control','index' => $option->id]) !!}
                </div>
            @endforeach
            <!--- submit Field --->
            {!! Form::submit('提交更改',['class'=>'btn btn-primary form-control']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">增加设置项</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url'=>'options/store','method'=>'POST')) !!}
                    <!--- 设置项显示名称 Field --->
                    <div class="form-group">
                        {!! Form::label('label', '设置项显示名称:') !!}
                        {!! Form::text('label', null, ['class' => 'form-control']) !!}
                    </div>
                    <!--- 配置项变量名 Field --->
                    <div class="form-group">
                        {!! Form::label('name', '配置项变量名:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <!--- 默认值 Field --->
                    <div class="form-group">
                        {!! Form::label('value', '默认值:') !!}
                        {!! Form::text('value', null, ['class' => 'form-control']) !!}
                    </div>

                    <!--- 添加 Field --->
                    {!! Form::submit('确认添加',['class'=>'btn btn-info form-control']) !!}

                    {!! Form::close() !!}
                    @if($errors->any())
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
@endsection
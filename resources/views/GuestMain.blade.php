<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title') {!! OverallSetup::getOption('site_name') !!} </title>
    <link href="/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('css')
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <div class="container-fluid  full-height">
        <div class="row full-height">
            {{--左侧Logo,站点标题,主分类按钮区开始--}}
            <div class="col-md-3 left-main-area full-height fixed-position">
                <div class="logo-area text-right col-md-11">
                    <h1>{!! OverallSetup::getOption('site_name') !!}</h1>
                    <h3>{!! OverallSetup::getOption('kouhao') !!}</h3>
                    <a href="#" class="btn main-btn">
                        <span class="glyphicon glyphicon-th-list"></span>
                        文  章
                    </a>
                    <a href="#" class="btn main-btn">
                        <span class="glyphicon glyphicon-camera"></span>
                        照  片
                    </a>
                    <a href="#" class="btn main-btn">
                        <span class="glyphicon glyphicon-user"></span>
                        关于我
                    </a>
                </div>
            </div>
            {{--左侧Logo,站点标题,主分类按钮区结束--}}

            {{--右侧文章列表区域开始--}}
            <div class="col-md-6 col-md-offset-3 right-area">
                {{--文章分类导航条开始--}}
                @yield('content')
                {{--文章列表结束--}}

            </div>
            {{--右侧文章列表区域结束--}}
            <div class="clearfix"></div>
            <div class="footer col-md-6 col-md-offset-3">
                {!! OverallSetup::getOption('beian') !!}
            </div>
        </div>

    </div>


    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.js"></script>
    <script src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    @yield('scripts')
</body>
</html>
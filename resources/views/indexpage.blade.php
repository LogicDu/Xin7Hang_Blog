<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MyBlog</title>
    <link href="/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
<div class="main-row">
    <!-- 左侧logo主导航区-->
    <div class="left-main-area col-md-2">

        <div class="row">
            <div class="col-md-12">
                <h1 class="logo-title">心启航</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2 class="logo-sec">聊技术，晒照片</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p class="logo-thd">网上属于自己的自留地！</p>
            </div>
        </div>

        <div class=" main-nav">

            <div class="col-md-4">
                <span class="glyphicon glyphicon-th-list"></span>
                <div id="glyphicon-th-list">文章</div>
            </div>
            <div class="col-md-4">
                <span class="glyphicon glyphicon-camera"></span>
                <div id="glyphicon-camera">照片</div>
            </div>
            <div class="col-md-4">
                <span class="glyphicon glyphicon-user"></span>
                <div id="glyphicon-user">关于</div>
            </div>

        </div>

        <div class="at-bottom">
            <span>新启航&nbsp&nbsp©2015</span>
        </div>

    </div>
    <!-- 右侧最新博文循环区域-->
    <div class="col-md-10 col-md-offset-2">
        <!-- 导航条-->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        @yield('nav_category')
                    </ul>
                    <form class="navbar-form navbar-right" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="找你想看的...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                            </span>
                        </div>
                    </form>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- 导航条结束-->
        <!-- 标签按钮-->
        <div class="tag-list">
            @yield('tag_button')
        </div>
        <!-- 标签按钮结束-->

        <!-- 文章列表-->
        @yield('content')
        <!--文章列表结束-->

    </div>
</div>

<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.js"></script>
<script src="/js/main.js"></script>
<script src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
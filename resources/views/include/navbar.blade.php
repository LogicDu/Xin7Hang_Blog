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
            <a class="navbar-brand">
                <span class="glyphicon glyphicon-th-list"></span>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                {{--@yield('nav_category')--}}
                @foreach($categorys as $cate)
                    <li><a href="{!! url('categorys/'.$cate->id) !!}">{{ $cate->name }}</a></li>
                @endforeach
            </ul>
            {{--<form class="navbar-form navbar-right" role="search">--}}
                {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control" placeholder="找你想看的...">--}}
                            {{--<span class="input-group-btn">--}}
                                {{--<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>--}}
                            {{--</span>--}}
                {{--</div>--}}
            {{--</form>--}}
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
{{--导航条结束--}}

<div id="navbar-full">
    <div id="navbar">

        <nav class="navbar navbar-inverse navbar-transparent navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        CashbackVN
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="javascript:void(0);" data-toggle="search" class="hidden-xs"><i class="fa fa-search"></i></a>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left navbar-search-form" role="search">
                        <div class="form-group">
                            <input type="text" value="" class="form-control" placeholder="{{ trans('message.search_placeholder') }}">
                        </div>
                        {{--<button type="submit" class="btn-default">{{ trans('message.search_button') }}</button>--}}
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::user())
                            <li class="dropdown">
                                <a href="#"
                                   class="dropdown-toggle"
                                   data-toggle="dropdown"
                                   role="button"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    <span class="glyphicon glyphicon-user" area-hidden="true"></span>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('account') }}">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                            {{ trans('message.account-setting') }}
                                        </a>
                                    </li>
                                    @if(Auth::user()->is_admin)
                                        <li>
                                            <a href="{{ url('admin') }}">
                                                <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Admin
                                            </a>
                                        </li>
                                    @endif
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="{{ action('Auth\AuthController@getLogout') }}">
                                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                            {{ trans('message.logout') }}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li><a href='{{ action('Auth\AuthController@getLogin') }}'>
                                    {{ trans('message.login') }}
                                </a> </li>
                            <li><button class="btn btn-primary" onclick="location.href='{{ action('Auth\AuthController@getRegister') }}'">
                                    <b>{{ trans('message.register') }}</b>
                                </button> </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="blurred-container">
            <div class="img-src" style="background-image: url({{ URL::asset('img/bg.jpg') }})"></div>
        </div>

    </div>
</div>
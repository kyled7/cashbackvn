<nav class="navbar navbar-material-indigo navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                Appname
            </a>
        </div>

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
                <li><button class="btn btn-link navbar-btn" onclick="location.href='{{ action('Auth\AuthController@getLogin') }}'">
                        {{ trans('message.login') }}
                    </button> </li>
                <li><button class="btn btn-material-deep-orange btn-raised navbar-btn" onclick="location.href='{{ action('Auth\AuthController@getRegister') }}'">
                        <b>{{ trans('message.register') }}</b>
                    </button> </li>
            @endif
        </ul>
    </div>
</nav>
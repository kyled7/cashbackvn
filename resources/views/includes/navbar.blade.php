<nav class="navbar navbar-default navbar-fixed-top">
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
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/auth/logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log out</a>
                        </li>
                    </ul>
                </li>
            @else
                <li><button class="btn btn-link navbar-btn" onclick="location.href='/auth/login'">
                        {{ trans('message.login') }}
                    </button> </li>
                <li><button class="btn btn-info btn-raised navbar-btn" onclick="location.href='/auth/register'">
                        {{ trans('message.register') }}
                    </button> </li>
            @endif
        </ul>
    </div>
</nav>
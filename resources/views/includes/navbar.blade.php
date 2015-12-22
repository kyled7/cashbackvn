<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                CashbackVN
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">

            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown mega-dropdown">
                    <button class="btn btn-warning navbar-btn dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Danh mục
                    </button>

                    <ul class="dropdown-menu mega-dropdown-menu row">
                        <li class="col-sm-3">
                            <ul>
                                <li>
                                    <a href="#" class="dropdown-header btn-link">
                                        <i class="fa fa-mobile"></i> Điện tử & công nghệ
                                    </a>
                                </li>
                                <li><a href="#">Lazada</a></li>
                                <li><a href="#">Tiki.vn</a></li>
                                <li><a href="#">Thegioididong.com.vn</a></li>
                                <li>
                                    <a href="#" class="btn-link text-right detail-link"><i>Xem tất cả</i></a>
                                </li>
                                <li class="divider"></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">
                                    Mẹ và bé
                                </li>
                                <li><a href="#">shoptretho.com.vn</a></li>
                                <li><a href="#">deca.</a></li>
                                <li class="divider"></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">
                                    <i class="fa fa-suitcase"></i> Du lịch
                                </li>
                                <li><a href="#">mytour.vn</a></li>
                                <li><a href="#">ivivu.com</a></li>
                                <li><a href="#">yourtour.vn</a></li>
                                <li class="divider"></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">
                                    <i class="fa fa-suitcase"></i> Thời trang
                                </li>
                                <li><a href="#">zalora.vn</a></li>
                                <li><a href="#">lazada.vn</a></li>
                                <li><a href="#">blue.vn</a></li>
                                <li><a href="#">blue.vn</a></li>
                                <li><a href="#">blue.vn</a></li>
                                <li class="divider"></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">
                                    <i class="fa fa-suitcase"></i> Du lịch
                                </li>
                                <li><a href="#">mytour.vn</a></li>
                                <li><a href="#">ivivu.com</a></li>
                                <li><a href="#">yourtour.vn</a></li>
                                <li class="divider"></li>
                            </ul>
                        </li>
                    </ul>

                </li>
            </ul>


            <form class="navbar-form navbar-left search-form" role="search">
                <div class="form-search search-only">
                    <i class="search-icon glyphicon glyphicon-search"></i>
                    <input type="text" placeholder="{{ trans('message.search-placeholder') }}"
                           class="form-control search-query">
                </div>
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
                    <li><a class="navbar-link" href='{{ action('Auth\AuthController@getLogin') }}'>
                            {{ trans('message.login') }}
                        </a></li>
                    <li>
                        <button class="btn btn-warning navbar-btn"
                                onclick="location.href='{{ action('Auth\AuthController@getRegister') }}'">
                            {{ trans('message.register') }}
                        </button>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
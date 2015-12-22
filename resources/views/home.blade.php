@extends('layouts.default')

@section('title', 'Welcome!')

@section('content')
    <div class="container">
        <div class="row">
            {{--Home slide--}}
            <div class="col-md-8 wow fadeInLeft">
                <div id="home-slide" class="carousel home-slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#home-slide" data-slide-to="0" class=""></li>
                        <li data-target="#home-slide" data-slide-to="1" class="active"></li>
                        <li data-target="#home-slide" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item">
                            <a href="#"><img src="/lib/Bootflat/img/slider1.jpg"></a>
                        </div>
                        <div class="item active">
                            <a href="#"> <img src="/lib/Bootflat/img/slider2.jpg"></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="/lib/Bootflat/img/slider3.jpg"></a>
                        </div>
                    </div>
                    {{--<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">--}}
                    {{--<span class="glyphicon glyphicon-chevron-left"></span>--}}
                    {{--</a>--}}
                    {{--<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">--}}
                    {{--<span class="glyphicon glyphicon-chevron-right"></span>--}}
                    {{--</a>--}}
                </div>
            </div>
            {{--End home slide--}}

            {{--User widget--}}
            <div class="col-md-4 home-user-widget wow fadeInRight">
                @if(Auth::user())
                    <h3 class="title">Xin chào, {{ Auth::user()->name }}</h3>
                    <p>
                        Tổng tài khoản: <b>{{ number_format(Auth::user()->available_amount, 0, ',', '.') }}</b> đ
                    </p>
                    <p>
                        Số dư khả dụng: <b>{{ number_format(Auth::user()->available_amount, 0, ',', '.') }}</b> đ
                    </p>
                    <p>
                        Chờ xác nhận: <b>{{ number_format(Auth::user()->pending_amount, 0, ',', '.') }}</b> đ
                    </p>
                    <p>
                        Giao dịch huỷ bỏ: <b>{{ number_format(Auth::user()->rejected_amount, 0, ',', '.') }}</b> đ
                    </p>
                    <a href="{{ url('#') }}" class="btn btn-warning center-block">Xem chi tiết!</a>
                @else
                    <h3 class="title">Hoàn tiền dễ dàng</h3>
                    <p>
                        <i class="fa fa-sign-in fa-2x"></i> <span>Tham gia Cashback miễn phí</span>
                    </p>
                    <p>
                        <i class="fa fa-shopping-cart fa-2x"></i> <span>Mua sắm trên website yêu thích</span>
                    </p>
                    <p>
                        <i class="fa fa-money fa-2x"></i> <span>Nhận hoàn tiền từ cashback</span>
                    </p>
                    <div class="text-right">
                        <a href="#" class="btn btn-info">Tìm hiểu thêm</a>
                    </div>
                    <a href="{{ url('user/register') }}" class="btn btn-warning center-block">Bắt đầu ngay!</a>
                @endif
            </div>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="col-lg-12 wow fadeInDown">
                <h2 class="page-header">Khuyến mại hot</h2>
            </div>
            <div class="col-sm-4 col-md-3 wow fadeInDown">
                <div class="thumbnail">
                    <img src="http://vn-live-g.slatic.net/images/logo-og-vn.jpg" alt="...">

                    <div class="caption">
                        <h3>Lazada.vn</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 wow fadeInDown">
                <div class="thumbnail">
                    <img src="http://vn-live-g.slatic.net/images/logo-og-vn.jpg" alt="...">

                    <div class="caption">
                        <h3>Lazada.vn</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 wow fadeInDown">
                <div class="thumbnail">
                    <img src="http://vn-live-g.slatic.net/images/logo-og-vn.jpg" alt="...">

                    <div class="caption">
                        <h3>Lazada.vn</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 wow fadeInDown">
                <div class="thumbnail">
                    <img src="http://vn-live-g.slatic.net/images/logo-og-vn.jpg" alt="...">

                    <div class="caption">
                        <h3>Lazada.vn</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 wow fadeInDown">
                <div class="thumbnail">
                    <img src="http://vn-live-g.slatic.net/images/logo-og-vn.jpg" alt="...">

                    <div class="caption">
                        <h3>Lazada.vn</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 wow fadeInDown">
                <div class="thumbnail">
                    <img src="http://vn-live-g.slatic.net/images/logo-og-vn.jpg" alt="...">

                    <div class="caption">
                        <h3>Lazada.vn</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 wow fadeInDown">
                <div class="thumbnail">
                    <img src="http://vn-live-g.slatic.net/images/logo-og-vn.jpg" alt="...">

                    <div class="caption">
                        <h3>Lazada.vn</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 wow fadeInDown">
                <div class="thumbnail">
                    <img src="http://vn-live-g.slatic.net/images/logo-og-vn.jpg" alt="...">

                    <div class="caption">
                        <h3>Lazada.vn</h3>
                    </div>
                </div>
            </div>

            <div class="col-xs-4 col-xs-offset-4 wow fadeInDown">
                <a href="#" class="btn btn-lg btn-warning btn-block">Xem tất cả...</a>
            </div>
        </div>
    </div>
@stop


@extends('layouts.default')

@section('title', 'HoànTiền.VN - Hoàn tiền mua hàng trực tuyến Việt Nam!')

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
                        Tổng tài khoản: <b><span class="currency">{{ Auth::user()->total_amount }}</span></b>
                    </p>
                    <p>
                        Số dư khả dụng: <b><span class="currency">{{ Auth::user()->available_amount }}</span></b>
                    </p>
                    <p>
                        Chờ xác nhận: <b><span class="currency">{{ Auth::user()->pending_amount }}</span></b>
                    </p>
                    <p>
                        Giao dịch huỷ bỏ: <b><span class="currency">{{ Auth::user()->rejected_amount }}</span></b>
                    </p>
                    <a href="{{ action('Account\CashbackController@getIndex') }}" class="btn btn-warning center-block">Xem
                        chi tiết!</a>
                @else
                    <h3 class="text-center">Kiếm tiền với HoanTien.VN</h3>
                    <p>
                        <i class="fa fa-sign-in fa-2x"></i> <span>1. Đăng nhập HoanTien.VN</span>
                    </p>
                    <p>
                        <i class="fa fa-shopping-cart fa-2x"></i> <span>2. Mua sắm trên website yêu thích</span>
                    </p>
                    <p>
                        <i class="fa fa-money fa-2x"></i> <span>3. Nhận tiền từ HoanTien.VN</span>
                    </p>
                    <a href="{{ url('user/register') }}" class="btn btn-warning btn-lg btn-block">Bắt đầu ngay!</a>
                @endif
            </div>
        </div>

        {{--Home retailer--}}
        <div class="row">
            <div class="col-lg-12 wow fadeInDown">
                <h3 class="page-header">Website bán hàng</h3>
            </div>
            @foreach($retailers as $retailer)
            <div class="col-sm-4 col-md-3 wow fadeInDown marchant-container">
                <a href="{{ action('RetailerController@details', $retailer->slug) }}"
                   class="thumbnail merchant-item">
                    <img src="{{ url('images/'. $retailer->logo) }}">

                    <div class="caption text-center">
                        <h3>{{ $retailer->name }}</h3>
                    </div>

                    <div class="overlay text-center">
                        <div class="overlay-content">
                            <h4>Hoàn tiền @if($retailer->deals()->count() > 1) đến @endif</h4>

                            <h2>{{ $retailer->cashback }}</h2>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

            <div class="col-xs-4 col-xs-offset-4 wow fadeInDown">
                <a href="{{ action('RetailerController@index') }}" class="btn btn-lg btn-warning btn-block">Xem tất
                    cả...</a>
            </div>
        </div>
    </div>

@stop


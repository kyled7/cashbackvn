@extends('layouts.default')

@section('title', 'Welcome!')

@section('content')
    @if( !Auth::user())
        <div class="container-fluid intro-container">
            <h2 class="title text-center">3 bước đơn giản để kiếm tiền từ mua hàng online</h2>

            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <div class="col-sm-4 col-xs-12 text-center">
                    <img src="http://placehold.it/150" class="img-circle img-responsive img-bordered center-block"
                         alt="...">
                    <h2>Bước 1</h2>
                    <p>Đăng nhập moneyback.</p>
                </div>
                <div class="col-sm-4 col-xs-12 text-center">
                    <img src="http://placehold.it/150" class="img-circle img-responsive img-bordered center-block"
                         alt="...">

                    <h2>Bước 2</h2>

                    <p>Shopping.</p>
                </div>
                <div class="col-sm-4 col-xs-12 text-center">
                    <img src="http://placehold.it/150" class="img-circle img-responsive img-bordered center-block"
                         alt="...">

                    <h2>Bước 3</h2>

                    <p>Nhận hoàn tiền</p>
                </div>
            </div>

            <div class="col-xs-4 col-xs-offset-4">
                <a href="{{ url('user/register') }}" class="btn btn-lg btn-warning btn-block">Bắt đầu ngay!</a>
            </div>
        </div>
    @endif
    <div class="main">
        <div class="container">
            <div class="col-lg-12 wow fadeInDown">
                <h2 class="page-header">Khuyến mại hot</h2>
            </div>
            <div class="col-sm-6 col-md-4 wow fadeInDown">
                <div class="thumbnail">
                    <img src="http://vn-live-g.slatic.net/images/logo-og-vn.jpg" alt="...">

                    <div class="caption">
                        <h3>Lazada.vn</h3>

                        <p>Mua sắm với Lazada và nhận hoàn tiền đến 5%</p>

                        <p class="text-center"><a href="#" class="btn btn-default" role="button">Chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 wow fadeInDown">
                <div class="thumbnail">
                    <img src="https://img.deca.vn/upload/1-2015/header/2015-02-25/1424830821_logo-deca.png" alt="...">

                    <div class="caption">
                        <h3>Deca.vn</h3>

                        <p>Siêu thị mẹ và bé - hoàn tiền 5% hoá đơn thanh toán</p>

                        <p class="text-center"><a href="#" class="btn btn-default" role="button">Chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 wow fadeInDown">
                <div class="thumbnail">
                    <img src="http://vn-live-g.slatic.net/images/logo-og-vn.jpg" alt="...">

                    <div class="caption">
                        <h3>Lazada.vn</h3>

                        <p>Mua sắm với Lazada và nhận hoàn tiền đến 5%</p>

                        <p class="text-center"><a href="#" class="btn btn-default" role="button">Chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 wow fadeInDown">
                <div class="thumbnail">
                    <img src="http://www.elle.vn/wp-content/uploads/2015/09/28/logo_all2.png" alt="...">

                    <div class="caption">
                        <h3>Zalora.vn</h3>

                        <p>Thời trang online, hoàn tiền đến 10%</p>

                        <p class="text-center"><a href="#" class="btn btn-warning" role="button">Chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 wow fadeInDown">
                <div class="thumbnail">
                    <img src="https://img.deca.vn/upload/1-2015/header/2015-02-25/1424830821_logo-deca.png" alt="...">

                    <div class="caption">
                        <h3>Deca.vn</h3>

                        <p>Siêu thị mẹ và bé - hoàn tiền 5% hoá đơn thanh toán</p>

                        <p class="text-center"><a href="#" class="btn btn-default" role="button">Chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 wow fadeInDown">
                <div class="thumbnail">
                    <img src="http://www.elle.vn/wp-content/uploads/2015/09/28/logo_all2.png" alt="...">

                    <div class="caption">
                        <h3>Zalora.vn</h3>

                        <p>Thời trang online, hoàn tiền đến 10%</p>

                        <p class="text-center"><a href="#" class="btn btn-warning" role="button">Chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-xs-offset-4 wow fadeInDown">
                <a href="#" class="btn btn-lg btn-warning btn-block">Xem tất cả...</a>
            </div>
        </div>
    </div>
@stop


@extends('layouts.default')

@section('title', 'Welcome!')

@section('content')
    @if( !Auth::user())
        <div class="container-fluid intro-container">
            <h2 class="title text-center">3 bước đơn giản để kiếm tiền từ mua hàng online</h2>

            <div class="col-xs-12">
                <div class="col-md-3 col-md-offset-2 col-sm-4 col-xs-12" style="background-color: #0000ed">
                    <h2>Bước 1</h2>

                    <p>Đăng nhập moneyback.</p>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12" style="background-color: #00312D">
                    dsadsa
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12" style="background-color: #007d6e">
                    dsadsa
                </div>
            </div>
        </div>
    @endif
    <div class="main" style="height: 300px;">
        <div class="container">
            <div class="col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="http://vn-live-g.slatic.net/images/2014/logo/vn.png" class="img-thumbnail col-xs-6">

                        <div class="col-xs-6">
                            <a href="#" class="h3 retailer-title">Lazada</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                Retailer 1
            </div>
            <div class="col-xs-6">
                Retailer 1
            </div>
        </div>
    </div>
@stop


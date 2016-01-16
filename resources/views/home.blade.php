@extends('layouts.default')

@section('title', trans('message.page_title'))

@section('content')
    <div class="container">
        <div class="row">
            {{--Home slide--}}
            <div class="col-md-8 wow fadeInLeft">
                <div id="home-slide" class="carousel slide home-slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($carousels as $key => $carousel)
                            <li data-target="#home-slide" data-slide-to="{{$key}}" class=""></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($carousels as $key => $carousel)
                            <div class="item @if($key==0) active @endif">
                                <a href="{{ $carousel->link }}"><img src="{{ url('images/'. $carousel->image) }}"></a>
                        </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#home-slide" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#home-slide" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
            {{--End home slide--}}

            {{--User widget--}}
            <div class="col-md-4 home-user-widget wow fadeInRight">
                @if(Auth::user())
                    <h3 class="title">{{ trans('message.hello') }}, {{ Auth::user()->name }}</h3>
                    <p>
                        {{ trans('message.total_amount') }}: <b class="pull-right"><span class="currency">{{ Auth::user()->total_amount }}</span></b>
                    </p>
                    <p>
                        {{ trans('message.available_amount') }}: <b class="pull-right"><span class="currency">{{ Auth::user()->available_amount }}</span></b>
                    </p>
                    <p>
                        {{ trans('message.pending_amount') }}: <b class="pull-right"><span class="currency">{{ Auth::user()->pending_amount }}</span></b>
                    </p>
                    <p>
                        {{ trans('message.rejected_amount') }}: <b class="pull-right"><span class="currency">{{ Auth::user()->rejected_amount }}</span></b>
                    </p>
                    <a href="{{ action('Account\CashbackController@getIndex') }}" class="btn btn-warning center-block">Xem
                        chi tiết!</a>
                @else
                    <h3 class="text-center">{{ trans('message.homepage_steps_headline') }}</h3>
                    <p>
                        <i class="fa fa-sign-in fa-2x"></i> <span>{{ trans('message.homepage_steps_1') }}</span>
                    </p>
                    <p>
                        <i class="fa fa-shopping-cart fa-2x"></i> <span>{{ trans('message.homepage_steps_2') }}</span>
                    </p>
                    <p>
                        <i class="fa fa-money fa-2x"></i> <span>{{ trans('message.homepage_steps_3') }}</span>
                    </p>
                    <a href="{{ url('user/register') }}" class="btn btn-warning btn-lg btn-block">
                        {{trans('message.cta_button_register')}}
                        <div class="small">{{ trans('message.homepage_reward') }}</div>
                    </a>
                @endif
            </div>
        </div>

        {{--Home retailer--}}
        <div class="row">
            <div class="col-lg-12 wow fadeInDown">
                <h3 class="page-header">{{ trans('message.homepage_merchants') }}</h3>
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
                            <h4>{{ trans('message.cashback') }} @if($retailer->deals()->count() > 1) {{ trans('message.cashback_upto') }} @endif</h4>

                            <h2>{{ $retailer->cashback }}</h2>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

            <div class="col-xs-4 col-xs-offset-4 wow fadeInDown">
                <a href="{{ action('RetailerController@index') }}" class="btn btn-lg btn-warning btn-block">{{ trans('message.homepage_viewall') }}</a>
            </div>
        </div>
    </div>

@stop


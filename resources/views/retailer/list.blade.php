@extends('layouts.default')

@section('title', trans('message.page_title'))

@section('content')
    {!!  Html::script('js/jquery.jscroll.min.js')  !!}
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Trang mua hàng A-Z</h2>
            </div>
            <div class="retailer-list">
                @foreach($retailers as $retailer)
                    <div class="col-sm-4 col-md-3 wow fadeInDown marchant-container">
                        <a href="{{ action('RetailerController@details', $retailer->slug) }}"
                           class="thumbnail merchant-item">
                            <img src="{{ url('images/'. $retailer->logo) }}">

                            <div class="caption text-center">
                                <h3>{{$retailer->name}}</h3>
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
                {!! $retailers->render() !!}
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $('ul.pagination:visible:first').hide();

            $('div.retailer-list').jscroll({
                debug: true,
                autoTrigger: true,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.retailer-list',
                callback: function () {
                    $('ul.pagination:visible:first').hide();
                }
            });
        });
    </script>

@stop


@extends('layouts.default')

@section('title', $retailer->name)

@section('content')
    <div class="container retailer-details">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">{{ $retailer->name }}</h2>
            </div>

            <div class="col-xs-4">
                <img src="{{ url('images/'. $retailer->logo) }}" class="img-thumbnail">
            </div>

            <div class="col-xs-8">
                <p class="lead">{{ $retailer->description }}</p>
                <a href="{{ action('RetailerController@redirect', $retailer->slug) }}" class="btn btn-warning btn-lg"
                   target="_blank">Mua hàng</a>
            </div>

            <div class="col-xs-12">
                <table class="table deal-table">
                    <tr class="header">
                        <th width="80%">Chương trình áp dụng</th>
                        <th class="text-center">Hoàn tiền</th>
                    </tr>
                    @foreach($retailer->deals as $deal)
                        <tr>
                            <td>
                                <h4>{{ $deal->name }}</h4>
                                <i>{{ $deal->description }}</i>
                            </td>
                            <td class="text-center">
                                <h3>{{ $deal->cashback }}</h3>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop
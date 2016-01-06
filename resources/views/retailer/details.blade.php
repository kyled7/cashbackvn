@extends('layouts.default')

@section('title', $retailer->name)

@section('content')
    <div class="container">
        {{ $retailer }}

        <a href="{{ action('RetailerController@redirect', $retailer->slug) }}" class="btn btn-warning btn-lg" target="_blank">Mua hàng</a>
    </div>
@stop
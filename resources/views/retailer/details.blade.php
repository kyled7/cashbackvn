@extends('layouts.default')

@section('title', $retailer->name)

@section('content')
    <div class="container">
        {{ $retailer }}
    </div>
@stop
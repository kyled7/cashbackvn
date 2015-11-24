@extends('layouts.admin')

@section('title', 'Admin panel - Add retailer')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <h1 class="page-header">Add retailer</h1>
        </div>

        <div class="row">
            {!! Form::open(['url' => 'admin/retailers']) !!}

            @include('admin/retailers/_form')

            {!! Form::close() !!}
        </div>

    </div>
@stop
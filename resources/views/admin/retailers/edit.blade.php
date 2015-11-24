@extends('layouts.admin')

@section('title', 'Admin panel - Edit retailer')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <h1 class="page-header">Add retailer</h1>
        </div>

        <div class="row">
            {!! Form::model($retailer, ['method' => 'PATCH', 'route' => ['admin.retailers.update', $retailer->id]]) !!}

            @include('admin/retailers/_form')

            {!! Form::close() !!}
        </div>

    </div>
@stop
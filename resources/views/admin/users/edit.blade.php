@extends('layouts.admin')

@section('title', 'Admin panel - Edit retailer')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    {!! Form::model($retailer, ['method' => 'PATCH', 'route' => ['admin.retailers.update', $retailer->id], 'files'=>true]) !!}

                    @include('admin/retailers/_form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
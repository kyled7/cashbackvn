@extends('layouts.admin')

@section('title', 'Admin panel - Edit retailer')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                {!! Form::model($deal, ['method' => 'PATCH', 'route' => ['admin.deals.update', $deal->id]]) !!}

                @include('admin/deals/_form')

                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
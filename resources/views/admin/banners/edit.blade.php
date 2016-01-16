@extends('layouts.admin')

@section('title', 'Admin panel - Edit banner')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    {!! Form::model($banner, ['method' => 'PATCH', 'route' => ['admin.banners.update', $banner->id], 'files'=>true]) !!}

                    @include('admin/banners/_form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
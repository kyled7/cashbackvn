@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    {!! Form::open(['url' => 'admin/banners', 'files'=>true]) !!}

                    @include('admin/banners/_form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
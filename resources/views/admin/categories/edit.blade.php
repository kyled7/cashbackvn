@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    {!! Form::model($category, ['method' => 'PATCH', 'route' => ['admin.categories.update', $category->id]]) !!}

                    @include('admin/categories/_form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
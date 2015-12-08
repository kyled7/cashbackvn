@extends('layouts.admin')

@section('title', 'Admin panel - Edit retailer')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-2">
                            Name
                        </div>
                        <div class="col-sm-10">
                            <p class="lead">{{ $category->name }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            Icon
                        </div>
                        <div class="col-sm-10">
                            <i class="fa {{ $category->fa_icon }}"></i>
                        </div>
                    </div>

                    <div class="row">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary"><i
                                    class="fa fa-pencil"></i> Edit</a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['admin.categories.destroy', $category->id],
                            'onsubmit' => "return confirm('Do you really want to delete?');",
                            'class' => 'inline-block'
                        ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@extends('layouts.admin')

@section('title', 'Admin panel - Edit retailer')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ $retailer->name }}</h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-2">
                            Description
                        </div>
                        <div class="col-sm-10">
                            <p class="lead">{{ $retailer->description }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            Logo
                        </div>
                        <div class="col-sm-10">
                            <img src="{{ url('images/'. $retailer->logo) }}" class="img-thumbnail form-control"
                                 style="width: 200px; height: auto">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            Referral link
                        </div>
                        <div class="col-sm-10">
                            {{ $retailer->link }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            Cashback
                        </div>
                        <div class="col-sm-10">
                            {{ $retailer->cashback_value }} ({{ $retailer->cashback_type }})
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            Status
                        </div>
                        <div class="col-sm-10">
                            {{ $retailer->status }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            Created at
                        </div>
                        <div class="col-sm-10">
                            {{ $retailer->created_at }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            Updated at
                        </div>
                        <div class="col-sm-10">
                            {{ $retailer->updated_at }}
                        </div>
                    </div>

                    <div class="row">
                        <a href="{{ route('admin.retailers.edit', $retailer->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['admin.retailers.destroy', $retailer->id],
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
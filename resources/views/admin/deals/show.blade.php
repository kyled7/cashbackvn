@extends('layouts.admin')

@section('title', 'Admin panel - Deal')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ $deal->name }}</h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-2">
                            Description
                        </div>
                        <div class="col-sm-10">
                            <p class="lead">{{ $deal->description }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            Retailer
                        </div>
                        <div class="col-sm-10">
                            {{ $deal->retailer->name }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            Type
                        </div>
                        <div class="col-sm-10">
                            {{ $deal->type }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            Valid from
                        </div>
                        <div class="col-sm-10">
                            {{ $deal->valid_from }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            Expired
                        </div>
                        <div class="col-sm-10">
                            {{ $deal->expired_at }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            Cashback
                        </div>
                        <div class="col-sm-10">
                            {{ $deal->cashback_value }} ({{ $deal->cashback_type }})
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            Created at
                        </div>
                        <div class="col-sm-10">
                            {{ $deal->created_at }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            Updated at
                        </div>
                        <div class="col-sm-10">
                            {{ $deal->updated_at }}
                        </div>
                    </div>

                    <div class="row">
                        <a href="{{ route('admin.deals.edit', $deal->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['admin.deals.destroy', $deal->id],
                            'onsubmit' => "return confirm('Do you really want to delete?');",
                            'class' => 'inline'
                        ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
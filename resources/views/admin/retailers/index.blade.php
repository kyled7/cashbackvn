@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @if (Session::has('message'))
                <div class="alert alert-info alert-dismissible">{{ Session::get('message') }}</div>
            @endif
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Retailers management</h3>
                    <div class="box-tools">
                        <a href="{{ url('admin/retailers/create') }}"  class="btn btn-primary pull-right">Create</a><br>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th width="20%">Logo</th>
                                <th width="10%">Link</th>
                                <th width="5%">Cashback value</th>
                                <th width="5%">Type</th>
                                <th width="5%">Clicks</th>
                                <th width="5%">Status</th>
                                <th width="10%" align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($retailers as $retailer)
                            <tr>
                                <td><a href="{{ route('admin.retailers.show', $retailer->id) }}">{{ $retailer->name }}</a></td>
                                <td><img src="{{ url('images/'. $retailer->logo) }}" class="img-thumbnail"></td>
                                <td>{{ $retailer->link }}</td>
                                <td>{{ $retailer->cashback_value }}</td>
                                <td>{{ $retailer->cashback_type }}</td>
                                <td>{{ $retailer->clicks }}</td>
                                <td>
                                    <span class="label @if($retailer->status=='active') label-success @elseif($retailer->status=='inactive') label-default @endif">
                                        {{ $retailer->status }}
                                    </span>
                                </td>
                                <td align="center">
                                    <a href="{{ route('admin.retailers.edit', $retailer->id) }}" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['admin.retailers.destroy', $retailer->id],
                                        'onsubmit' => "return confirm('Do you really want to delete?');",
                                        'class' => 'inline'
                                    ]) !!}
                                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',
                                        ['class' => 'btn btn-danger btn-sm', 'type'=>'submit']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $retailers->render() !!}
                </div>
            </div>
        </div>
    </div>
@stop

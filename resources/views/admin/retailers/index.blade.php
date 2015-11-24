@extends('layouts.admin')

@section('title', 'Admin panel - Retailers')

@section('content')

    <div id="page-wrapper">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <div class="row">
            <h1 class="page-header">Retailers</h1>
        </div>

        <div class="row">
            <a href="{{ url('admin/retailers/create') }}"  class="btn btn-primary">Create</a><br>
        </div>

        <div class="row">
            <div class="dataTable_wrapper">
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
                            <td><img src="{{ $retailer->logo }}" class="img-thumbnail" > </td>
                            <td>{{ $retailer->link }}</td>
                            <td>{{ $retailer->cashback_value }}</td>
                            <td>{{ $retailer->cashback_type }}</td>
                            <td>{{ $retailer->clicks }}</td>
                            <td>{{ $retailer->status }}</td>
                            <td align="center">
                                <a href="{{ route('admin.retailers.edit', $retailer->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['admin.retailers.destroy', $retailer->id],
                                    'onsubmit' => "return confirm('Do you really want to delete?');",
                                    'class' => 'inline-block'
                                ]) !!}
                                {!! Form::submit('X', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {!! $retailers->render() !!}
        </div>
    </div>
@stop

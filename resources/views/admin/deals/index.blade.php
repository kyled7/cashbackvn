@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @if (Session::has('message'))
                <div class="alert alert-info alert-dismissible">{{ Session::get('message') }}</div>
            @endif
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Deals management</h3>
                    <div class="box-tools">
                        <a href="{{ url('admin/deals/create') }}"  class="btn btn-primary pull-right">Create</a><br>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th width="20%">Retailer</th>
                                <th width="5%">Cashback value</th>
                                <th width="5%">Type</th>
                                <th width="5%">Valid from</th>
                                <th width="5%">Expired</th>
                                <th width="10%" align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($deals as $deal)
                            <tr>
                                <td><a href="{{ route('admin.deals.show', $deal->id) }}">{{ $deal->name }}</a></td>
                                <td>{{ $deal->retailer->name }}</td>
                                <td>{{ $deal->cashback_value }} ({{$deal->cashback_type}})</td>
                                <td>{{ $deal->type }}</td>
                                <td>{{ $deal->valid_from }}</td>
                                <td>{{ $deal->expired_at }}</td>
                                <td align="center">
                                    <a href="{{ route('admin.deals.edit', $deal->id) }}" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['admin.deals.destroy', $deal->id],
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
                    {!! $deals->render() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @if (Session::has('message'))
                <div class="alert alert-info alert-dismissible">{{ Session::get('message') }}</div>
            @endif
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Banners management</h3>

                    <div class="box-tools">
                        <a href="{{ url('admin/banners/create') }}" class="btn btn-primary pull-right">Create</a><br>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Banner</th>
                            <th width="25%">Link</th>
                            <th width="10%">Type</th>
                            <th width="10%">Status</th>
                            <th width="10%">Valid from</th>
                            <th width="10%">Expired</th>
                            <th width="10%" align="center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.banners.show', $banner->id) }}">
                                        <img src="{{ url('images/'. $banner->image) }}" class="img-thumbnail">
                                    </a>
                                </td>
                                <td>{{ $banner->link }}</td>
                                <td>{{ $banner->type }}</td>
                                <td>{{ $banner->status }}</td>
                                <td>{{ $banner->valid_from }}</td>
                                <td>{{ $banner->expired_at }}</td>
                                <td align="center">
                                    <a href="{{ route('admin.banners.edit', $banner->id) }}"
                                       class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['admin.banners.destroy', $banner->id],
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
                    {!! $banners->render() !!}
                </div>
            </div>
        </div>
    </div>
@stop

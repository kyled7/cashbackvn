@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @if (Session::has('message'))
                <div class="alert alert-info alert-dismissible">{{ Session::get('message') }}</div>
            @endif
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users management</h3>
                    <div class="box-tools">
                        <a href="{{ url('admin/users/create') }}"  class="btn btn-primary pull-right">Create</a><br>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th width="20%">Name</th>
                                <th width="10%">Provider</th>
                                <th width="10%">Created</th>
                                <th width="10%" align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->email }}</a></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->provider }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td align="center">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['admin.users.destroy', $user->id],
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
                    {!! $users->render() !!}
                </div>
            </div>
        </div>
    </div>
@stop

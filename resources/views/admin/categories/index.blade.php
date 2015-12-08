@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @if (Session::has('message'))
                <div class="alert alert-info alert-dismissible">{{ Session::get('message') }}</div>
            @endif
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Category management</h3>

                    <div class="box-tools">
                        <a href="{{ url('admin/categories/create') }}" class="btn btn-primary pull-right">Create</a><br>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th width="20%">Icon</th>
                            <th width="20%" align="center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a>
                                </td>
                                <td><i class="fa fa-2x {{$category->fa_icon}}"></i></td>
                                <td align="center">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                       class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['admin.categories.destroy', $category->id],
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
                    {!! $categories->render() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@extends('layouts.admin')

@section('title', 'Admin panel - Retailers')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <h1 class="page-header">Retailers</h1>
        </div>

        <div class="row">
            <a href="{{ url('admin/retailers/create') }}"  class="btn btn-primary pull-right">Create</a>
        </div>

        <div class="row">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd gradeX">
                            <td>Trident</td>
                            <td>Internet Explorer 4.0</td>
                            <td>Win 95+</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

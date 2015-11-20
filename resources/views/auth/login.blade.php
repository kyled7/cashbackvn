@extends('layouts.default')

@section('title', 'Login')

@section('content')
    {!! Form::open(['class' => 'form-horizontal']) !!}
        <div class="form-group">
            {!! Form::label('email', 'Email address:', ['class' => 'col-sm-2 form-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password:', ['class' => 'col-sm-2 form-label']) !!}
            <div class="col-sm-10">
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('remember', 'Remember me', ['class' => 'col-sm-2 form-label']) !!}
            <div class="col-sm-10">
                {!! Form::checkbox('remember') !!}
            </div>
        </div>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="form-group">
            {!! Form::submit('Login', ['class' => 'btn btn-primary form-control']) !!}
        </div>

    {!! Form::close() !!}
@stop
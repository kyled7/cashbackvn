@extends('layouts.default')

@section('title', trans('message.login'))

@section('content')
    <div class="panel panel-primary auth-box center-block">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('message.login') }}</h3>
        </div>
        <div class="panel-body">
            {!! Form::open(['class' => 'bs_component']) !!}
                <div class="form-group label-floating @if ($errors->has('email')) has-error @endif">
                    {!! Form::label('email', trans('message.email'), ['class' => 'control-label']) !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                </div>

                <div class="form-group label-floating @if ($errors->has('password')) has-error @endif">
                    {!! Form::label('password', trans('message.password'), ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('remember') !!}
                            {{ trans('message.remember') }}
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <a href="{{ action('Auth\PasswordController@getEmail') }}" class="pull-right btn-lg">{{ trans('message.forgot-password') }}</a>
                </div>

                <div class="form-group">
                    {!! Form::submit(trans('message.login'), ['class' => 'btn btn-primary btn-block']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop
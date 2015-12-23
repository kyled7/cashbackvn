@extends('layouts.default')

@section('title', trans('message.login'))

@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('message.login') }}</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open() !!}
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
                        <div class="col-xs-6">
                            {!! Form::checkbox('remember', 1, null, ['id' => 'remember']) !!}
                            {!! Form::label('remember', trans('message.remember')) !!}
                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="{{ action('Auth\PasswordController@getEmail') }}"
                               class="btn btn-link">{{ trans('message.forgot-password') }}</a>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::submit(trans('message.login'), ['class' => 'btn btn-warning btn-block']) !!}
                    </div>

                    {!! Form::close() !!}

                    <hr>
                    <h4 class="title text-center">{{ trans('message.or-login-with') }}</h4>

                    <a href="{{ action('Auth\AuthController@getFacebook') }}">
                        <i class="fa fa-facebook-official fa-4x"></i>
                    </a>
                    <a href="{{ action('Auth\AuthController@getTwitter') }}">
                        <i class="fa fa-twitter-square fa-4x"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>
@stop
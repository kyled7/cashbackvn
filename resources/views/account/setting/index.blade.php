@extends('layouts.default')

@section('title', trans('message.account'))

@section('content')
    <div class="main">
        <div class="container">
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible">{{ Session::get('message') }}</div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible">{{ Session::get('error') }}</div>
            @endif
            @include('includes.account-setting-nav')

            <div class="row">
                <div class="col-xs-6">
                    <h1 class="title">
                        <small>Thông tin người dùng</small>
                    </h1>
                    {!! Form::model(Auth::user(), ['url' => 'account/setting/update', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                    <div class="form-group">
                        {!! Form::label('email', trans('message.email'), ['class' => 'control-label col-xs-3']) !!}
                        <div class="col-xs-9">
                            {!! Form::text('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                        </div>
                    </div>
                    <div class="form-group @if ($errors->has('name')) has-error @endif">
                        {!! Form::label('name', trans('message.name'), ['class' => 'control-label col-xs-3']) !!}
                        <div class="col-xs-9">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-9 col-xs-push-3">
                            {!! Form::submit(trans('message.account-update'), ['class' => 'btn btn-primary btn-fill']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>

                <div class="col-xs-6">
                    <h1 class="title">
                        <small>Thay đổi mật khẩu</small>
                    </h1>
                    {!! Form::open(['url' => 'account/setting/changepassword', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    <div class="form-group @if ($errors->has('origin_password')) has-error @endif">
                        {!! Form::label('origin_password', trans('message.origin-password'), ['class' => 'control-label  col-xs-3']) !!}
                        <div class="col-xs-9">
                            {!! Form::password('origin_password', ['class' => 'form-control']) !!}
                            @if ($errors->has('origin_password')) <p
                                    class="help-block">{{ $errors->first('origin_password') }}</p> @endif
                        </div>
                    </div>

                    <div class="form-group @if ($errors->has('password')) has-error @endif">
                        {!! Form::label('password', trans('message.new-password'), ['class' => 'control-label  col-xs-3']) !!}
                        <div class="col-xs-9">
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                            @if ($errors->has('password')) <p
                                    class="help-block">{{ $errors->first('password') }}</p> @endif
                        </div>
                    </div>

                    <div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">
                        {!! Form::label('password_confirmation', trans('message.password-confirmation'), ['class' => 'control-label  col-xs-3']) !!}
                        <div class="col-xs-9">
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                            @if ($errors->has('password_confirmation')) <p
                                    class="help-block">{{ $errors->first('password_confirmation') }}</p> @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-9 col-xs-push-3">
                            {!! Form::submit(trans('message.account-changepassword-btn'), ['class' => 'btn btn-primary btn-fill']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
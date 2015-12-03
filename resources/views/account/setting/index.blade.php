@extends('layouts.default')

@section('title', trans('message.account'))

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible">{{ Session::get('message') }}</div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible">{{ Session::get('error') }}</div>
    @endif
    @include('includes.account-setting-nav')

    <div class="col-xs-8 col-xs-push-2">
        <h1 class="title"><small>Thông tin người dùng</small></h1>
        {!! Form::model(Auth::user(), ['url' => 'account/setting/update', 'class' => 'form-horizontal', 'role' => 'form']) !!}

        <div class="form-group">
            {!! Form::label('email', trans('message.email'), ['class' => 'control-label col-xs-2']) !!}
            <div class="col-xs-9">
                {!! Form::text('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
            </div>
        </div>
        <div class="form-group @if ($errors->has('name')) has-error @endif">
            {!! Form::label('name', trans('message.name'), ['class' => 'control-label col-xs-2']) !!}
            <div class="col-xs-9">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-9 col-xs-push-2">
                {!! Form::submit(trans('message.account_update'), ['class' => 'btn btn-primary btn-fill']) !!}
            </div>
        </div>

        {!! Form::close() !!}

        <h1 class="title"><small>Thay đổi mật khẩu</small></h1>
        {!! Form::open(['url' => 'account/setting/changepassword', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <div class="form-group @if ($errors->has('origin_password')) has-error @endif">
            {!! Form::label('origin_password', trans('message.origin_password'), ['class' => 'control-label  col-xs-2']) !!}
            <div class="col-xs-9">
                {!! Form::password('origin_password', ['class' => 'form-control']) !!}
                @if ($errors->has('origin_password')) <p class="help-block">{{ $errors->first('origin_password') }}</p> @endif
            </div>
        </div>

        <div class="form-group @if ($errors->has('password')) has-error @endif">
            {!! Form::label('password', trans('message.new_password'), ['class' => 'control-label  col-xs-2']) !!}
            <div class="col-xs-9">
                {!! Form::password('password', ['class' => 'form-control']) !!}
                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
            </div>
        </div>

        <div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">
            {!! Form::label('password_confirmation', trans('message.password_confirmation'), ['class' => 'control-label  col-xs-2']) !!}
            <div class="col-xs-9">
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                @if ($errors->has('password_confirmation')) <p class="help-block">{{ $errors->first('password_confirmation') }}</p> @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-9 col-xs-push-2">
                {!! Form::submit(trans('message.account_changepassword_btn'), ['class' => 'btn btn-primary btn-fill']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@stop
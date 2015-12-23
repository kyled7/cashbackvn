@extends('layouts.default')

@section('title', trans('message.account'))

@section('content')
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
                <h3 class="page-header">Thông tin người dùng</h3>
                {!! Form::model($user, ['url' => 'account/setting/update', 'class' => 'form-horizontal', 'role' => 'form']) !!}

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
                <h4>Thông tin thanh toán</h4>

                <div class="form-group @if ($errors->has('account_setting.bank_name')) has-error @endif">
                    {!! Form::label('account_setting[bank_name]', trans('message.bank-name'), ['class' => 'control-label col-xs-3']) !!}
                    <div class="col-xs-9">
                        {!! Form::text('account_setting[bank_name]', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('account_setting.bank_name')) <p
                                class="help-block">{{ $errors->first('account_setting.bank_name') }}</p> @endif
                    </div>
                </div>
                <div class="form-group @if ($errors->has('account_setting.bank_branch')) has-error @endif">
                    {!! Form::label('account_setting[bank_branch]', trans('message.bank-branch'), ['class' => 'control-label col-xs-3']) !!}
                    <div class="col-xs-9">
                        {!! Form::text('account_setting[bank_branch]', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('account_setting.bank_branch')) <p
                                class="help-block">{{ $errors->first('account_setting.bank_branch') }}</p> @endif
                    </div>
                </div>
                <div class="form-group @if ($errors->has('account_setting.account_number')) has-error @endif">
                    {!! Form::label('account_setting[account_number]', trans('message.bank-account-number'), ['class' => 'control-label col-xs-3']) !!}
                    <div class="col-xs-9">
                        {!! Form::text('account_setting[account_number]', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('account_setting.account_number')) <p
                                class="help-block">{{ $errors->first('account_setting.account_number') }}</p> @endif
                    </div>
                </div>
                <div class="form-group @if ($errors->has('account_setting.account_name')) has-error @endif">
                    {!! Form::label('account_setting[account_name]', trans('message.bank-account-name'), ['class' => 'control-label col-xs-3']) !!}
                    <div class="col-xs-9">
                        {!! Form::text('account_setting[account_name]', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('account_setting.account_name')) <p
                                class="help-block">{{ $errors->first('account_setting.account_name') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-9 col-xs-push-3">
                        {!! Form::submit(trans('message.account-update'), ['class' => 'btn btn-warning']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>

            <div class="col-xs-6">
                <h3 class="page-header">Thay đổi mật khẩu</h3>
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
                        {!! Form::submit(trans('message.account-changepassword-btn'), ['class' => 'btn btn-warning']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
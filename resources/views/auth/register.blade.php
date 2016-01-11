@extends('layouts.default')

@section('title', trans('message.register'))

@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('message.register') }}</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open() !!}

                    <div class="form-group label-floating @if ($errors->has('name')) has-error @endif">
                        {!! Form::label('name', trans('message.name'), ['class' => 'control-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                    </div>

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

                    <div class="form-group label-floating @if ($errors->has('password_confirmation')) has-error @endif">
                        {!! Form::label('password_confirmation', trans('message.password-confirmation'), ['class' => 'control-label']) !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        @if ($errors->has('password_confirmation')) <p
                                class="help-block">{{ $errors->first('password_confirmation') }}</p> @endif
                    </div>

                    <div class="form-group">
                        {!! Form::submit(trans('message.register'), ['class' => 'btn btn-warning btn-block btn-lg']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
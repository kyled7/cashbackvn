@extends('layouts.default')

@section('title', trans('message.reset-password'))

@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('message.reset-password') }}</h3>
                </div>
                <div class="panel-body">
                    <p>{{ trans('message.reset-password-notice') }}</p>
                    {!! Form::open(['class' => 'bs_component']) !!}
                    <div class="form-group label-floating @if ($errors->has('email')) has-error @endif">
                        {!! Form::label('email', trans('message.email'), ['class' => 'control-label']) !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                    </div>

                    <div class="form-group">
                        {!! Form::submit(trans('message.reset-password-submit'), ['class' => 'btn btn-warning btn-block']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
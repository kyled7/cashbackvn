@extends('layouts.default')

@section('title', trans('message.reset-password'))

@section('content')
    <div class="panel panel-primary auth-box center-block">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('message.reset-password') }}</h3>
        </div>
        <div class="panel-body">
            {!! Form::open(['class' => 'bs_component']) !!}
            <div class="form-group label-floating @if ($errors->has('email')) has-error @endif">
                {!! Form::label('email', trans('message.email'), ['class' => 'control-label']) !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
            </div>

            <div class="form-group">
                {!! Form::submit(trans('message.reset-password'), ['class' => 'btn btn-primary btn-block']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop
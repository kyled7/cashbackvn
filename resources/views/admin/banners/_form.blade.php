<div class="form-group @if ($errors->has('image')) has-error @endif">
    {!! Form::label('image', 'Banner', ['class' => 'control-label']) !!}
    @if (isset($banner->image))
        <img src="{{ url('images/'. $banner->image) }}" class="img-thumbnail form-control"
             style="width: 200px; height: auto">
    @endif
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
    @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
</div>

<div class="form-group  @if ($errors->has('link')) has-error @endif">
    {!! Form::label('link', 'Link', ['class' => 'control-label']) !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
    @if ($errors->has('link')) <p class="help-block">{{ $errors->first('link') }}</p> @endif
</div>

<div class="form-group">
    {!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
    {!! Form::select('type', ['homeslide' => 'Home slide', 'other' => 'Other'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('valid_from', 'Valid from', ['class' => 'control-label']) !!}
    {!! Form::text('valid_from', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('expired_at', 'Expired date', ['class' => 'control-label']) !!}
    {!! Form::text('expired_at', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

<script>
    $(function () {
        $("#valid_from").datepicker({format: 'yyyy-mm-dd'});
        $("#expired_at").datepicker({format: 'yyyy-mm-dd'});
    });
</script>
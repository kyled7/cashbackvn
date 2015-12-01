<link href="{{ asset("/lib/AdminLTE/plugins/datepicker/datepicker3.css")}}" rel="stylesheet" type="text/css" />

<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<div class="form-group">
    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('retailer_id', 'Retailer', ['class' => 'control-label']) !!}
    {!! Form::select('retailer_id', $retailers, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
    {!! Form::select('type', ['regular' => 'Regular', 'exclusive' => 'Exclusive'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('cashback_value', 'Cashback value', ['class' => 'control-label']) !!}
    {!! Form::text('cashback_value', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('cashback_type', 'Cashback type', ['class' => 'control-label']) !!}
    {!! Form::select('cashback_type', ['percentage' => 'Percentage', 'amount' => 'Amount'], null, ['class' => 'form-control']) !!}
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

<script src="{{ asset ("/lib/AdminLTE/plugins/datepicker/bootstrap-datepicker.js") }}"></script>
<script>
    $(function() {
        $("#valid_from").datepicker({format: 'yyyy-mm-dd'});
        $("#expired_at").datepicker({format: 'yyyy-mm-dd'});
    });
</script>
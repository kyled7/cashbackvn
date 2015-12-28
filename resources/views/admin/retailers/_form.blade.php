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
    {!! Form::label('category_list', 'Categories', ['class' => 'control-label']) !!}
    {!! Form::select('category_list[]', $categories, null, ['class' => 'form-control categories', 'multiple']) !!}
</div>

<div class="form-group @if ($errors->has('logo')) has-error @endif">
    {!! Form::label('logo', 'Logo', ['class' => 'control-label']) !!}
    @if (isset($retailer->logo))
        <img src="{{ url('images/'. $retailer->logo) }}" class="img-thumbnail form-control"
             style="width: 200px; height: auto">
    @endif
    {!! Form::file('logo', null, ['class' => 'form-control']) !!}
    @if ($errors->has('logo')) <p class="help-block">{{ $errors->first('logo') }}</p> @endif
</div>

<div class="form-group">
    {!! Form::label('link', 'Referral link', ['class' => 'control-label']) !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
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
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.retailers.index') }}" class="btn btn-default">Back</a>
</div>

<script>
    $(function () {
        $(".categories").select2();
    });
</script>
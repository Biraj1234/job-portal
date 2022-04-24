<!--Name-->
<div class="form-group">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}

    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
@error('name')
    <p class="text text-danger">{{ $message }}</p>
@enderror


<!--Slug-->
<div class="form-group">
    {!! Form::label('slug', 'Slug', ['class' => 'control-label']) !!}

    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>
@error('slug')
    <p class="text text-danger">{{ $message }}</p>
@enderror


<div class="form-group">
    {!! Form::label('statustitle', 'Status', ['class' => 'control-label']) !!}
    {!! Form::radio('status', 1) !!}Active
    {!! Form::radio('status', 0, true) !!}Inactive
</div>

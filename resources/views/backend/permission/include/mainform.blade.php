<!--Module-->
<div class="form-group">
    {!! Form::label('title', 'Module', ['class' => 'control-label']) !!}

    {!! Form::select('module_id', $module, null, ['class' => 'form-control']) !!}
</div>
@error('title')
    <p class="text text-danger">{{ $message }}</p>
@enderror


<!--Title-->
<div class="form-group">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}

    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
@error('title')
    <p class="text text-danger">{{ $message }}</p>
@enderror

<!--Route-->
<div class="form-group">
    {!! Form::label('route', 'Route', ['class' => 'control-label']) !!}

    {!! Form::text('route', null, ['class' => 'form-control']) !!}
</div>
@error('route')
    <p class="text text-danger">{{ $message }}</p>
@enderror
<div class="form-group">
    {!! Form::label('statustitle', 'Status', ['class' => 'control-label']) !!}
    {!! Form::radio('status', 1) !!}Active
    {!! Form::radio('status', 0, true) !!}Inactive
</div>

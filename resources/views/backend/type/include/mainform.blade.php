<!--Location-->
<div class="form-group">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}

    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
@error('title')
    <p class="text text-danger">{{ $message }}</p>
@enderror

<div class="form-group">
    {!! Form::label('statustitle', 'Status', ['class' => 'control-label']) !!}
    {!! Form::radio('status', 1) !!}Active
    {!! Form::radio('status', 0, true) !!}Inactive
</div>

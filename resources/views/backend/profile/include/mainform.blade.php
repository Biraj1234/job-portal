<!--Name-->
<div class="form-group">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}

    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
@error('name')
    <p class="text text-danger">{{ $message }}</p>
@enderror

<!--Username-->
<div class="form-group">
    {!! Form::label('username', 'Username', ['class' => 'control-label']) !!}

    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>
@error('username')
    <p class="text text-danger">{{ $message }}</p>
@enderror

<!--Phone-->
<div class="form-group">
    {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}

    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>
@error('phone')
    <p class="text text-danger">{{ $message }}</p>
@enderror



<!--Email-->
<div class="form-group">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}

    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
@error('email')
    <p class="text text-danger">{{ $message }}</p>
@enderror


<!--Profile Picture-->
<div class="form-group">
    {!! Form::label('profile_name', 'Profile Picture', ['class' => 'control-label']) !!}

    {!! Form::file('profile_name', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <p><b><u>Old Photo</u></b></p>
    <img src="{{ asset('uploads/users/' . $data['row']->profile_picture) }}" alt="" width="100px">
    @error('profile_name')
        <p class="text text-danger">{{ $message }}</p>
    @enderror


</div>

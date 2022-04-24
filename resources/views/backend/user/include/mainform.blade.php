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

<!--Address-->
<div class="form-group">
    {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}

    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>
@error('address')
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



<!--Password-->
<div class="form-group">
    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}

    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
@error('password')
    <p class="text text-danger">{{ $message }}</p>
@enderror

<!--Confirm Password-->
<div class="form-group">
    {!! Form::label('cpassword', 'Confirm Password', ['class' => 'control-label']) !!}

    {!! Form::password('cpassword', ['class' => 'form-control']) !!}
</div>
@error('cpassword')
    <p class="text text-danger">Password didn't match</p>
@enderror


<!--Phone-->
<div class="form-group">
    {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}

    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>
@error('phone')
    <p class="text text-danger">{{ $message }}</p>
@enderror


<!--Role-->
<div class="form-group">
    {!! Form::label('role_id', 'Role', ['class' => 'control-label']) !!}

    {!! Form::select('role_id', $role, null, ['class' => 'form-control', 'placeholder' => 'Please select your role']) !!}
</div>
@error('role_id')
    <p class="text text-danger">{{ $message }}</p>
@enderror




<!--Profile Picture-->
<div class="form-group">
    {!! Form::label('profile_name', 'Profile Picture', ['class' => 'control-label']) !!}

    {!! Form::file('profile_name', ['class' => 'form-control']) !!}
</div>
@error('profile_name')
    <p class="text text-danger">{{ $message }}</p>
@enderror




<div class="form-group">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::radio('status', 1) !!}Active
    {!! Form::radio('status', 0, true) !!}Inactive
</div>

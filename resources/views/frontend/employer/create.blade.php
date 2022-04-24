@extends('frontend.layouts.master')


@section('content')
    <div class="form-container">
        <h3 style="text-align: center">
            <u>For {{ $title }}</u>
        </h3>
        {!! Form::open(['route' => $base_route . 'store', 'method' => 'post', 'files' => true]) !!}

        <!--Name-->
        <div class="mb-3">
            {!! Form::label('name', "Company's Name", ['class' => 'control-label']) !!}

            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            @error('name')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <!--Email-->
        <div class="mb-3">
            {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}

            {!! Form::email('email', null, ['class' => 'form-control']) !!}
            @error('email')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>


        <!--Password-->
        <div class="mb-3">
            {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}

            {!! Form::password('password', ['class' => 'form-control']) !!}
            @error('password')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <!--Confirm Password-->
        <div class="mb-3">
            {!! Form::label('cpassword', 'Confirm Password', ['class' => 'control-label']) !!}

            {!! Form::password('cpassword', ['class' => 'form-control']) !!}
            @error('cpassword')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>



        <!--Phone-->
        <div class="mb-3">
            {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}

            {!! Form::number('phone', null, ['class' => 'form-control']) !!}
            @error('phone')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Address-->
        <div class="mb-3">
            {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}

            {!! Form::text('address', null, ['class' => 'form-control']) !!}
            @error('address')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Description-->
        <div class="mb-3">
            {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}

            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            @error('description')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>





        <!--Logo-->
        <div class="mb-3">
            {!! Form::label('logo_name', "Company's Logo", ['class' => 'control-label']) !!}

            {!! Form::file('logo_name', null, ['class' => 'form-control']) !!}
            @error('logo_name')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection

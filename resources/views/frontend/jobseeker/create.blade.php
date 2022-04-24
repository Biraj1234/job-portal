@extends('frontend.layouts.master')


@section('content')
    <div class="form-container">
        <h3 style="text-align: center">
            <u>For {{ $title }}</u>
        </h3>
        {!! Form::open(['route' => $base_route . 'store', 'method' => 'post', 'files' => true]) !!}

        <!--Name-->
        <div class="mb-3">
            {!! Form::label('name', 'Full Name', ['class' => 'control-label']) !!}

            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            @error('name')
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

        <!--Username-->
        <div class="mb-3">
            {!! Form::label('username', 'Username', ['class' => 'control-label']) !!}

            {!! Form::text('username', null, ['class' => 'form-control']) !!}
            @error('username')
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

        <!--Bio-->
        <div class="mb-3">
            {!! Form::label('bio', 'Bio', ['class' => 'control-label']) !!}

            {!! Form::textarea('bio', null, ['class' => 'form-control']) !!}
            @error('bio')
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

        <!--DOB-->
        <div class="mb-3">
            {!! Form::label('dob', 'Date of Birth', ['class' => 'control-label']) !!}

            {!! Form::date('dob', null, ['class' => 'form-control']) !!}
            @error('dob')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Profile Picture-->
        <div class="mb-3">
            {!! Form::label('profile_name', 'Profile Picture', ['class' => 'control-label']) !!}

            {!! Form::file('profile_name', null, ['class' => 'form-control']) !!}
            @error('profile_name')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Skills-->
        <div class="mb-3">
            {!! Form::label('job_skill_id', 'Skills', ['class' => 'control-label']) !!}

            <select id="nameId" name="job_skill_id[]" class="form-control" multiple="multiple">

                @foreach ($skill as $d)
                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                @endforeach

            </select>


            @error('job_skill_id')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Prefered Category-->
        <div class="mb-3">
            {!! Form::label('category_id', 'Prefered Category', ['class' => 'control-label']) !!}
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Select a category']) !!}
            @error('category_id')
                <p class="text text-danger">{{ $message }}</p>
            @enderror



            @error('employee_search')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>


        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection

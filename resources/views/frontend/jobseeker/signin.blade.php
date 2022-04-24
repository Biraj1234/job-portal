@extends('frontend.layouts.master')


@section('content')
    <div class="form-container">
        @include('frontend.includes.flashmessage')
        <h3 style="text-align: center">
            {{ $title }} Login
        </h3>
        {!! Form::open(['route' => 'jobseeker.login', 'method' => 'post', 'files' => true]) !!}

        <!--Name-->
        <div class="mb-3">
            {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}

            {!! Form::text('email', null, ['class' => 'form-control']) !!}
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


        {!! Form::submit('Login', ['class' => 'btn btn-secondary']) !!}
        {!! Form::close() !!}
    </div>
@endsection

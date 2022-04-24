@extends('layouts.credentials')

@section('content')
    <div class="login-logo">
        <a href="../../index2.html"><b>Sign In</b></a>
    </div>
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>

            </div>
            @error('email')
                <span role="alert">
                    <strong>
                        <p class="text text-danger">{{ $message }}</p>
                    </strong>
                </span>
            @enderror
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password"
                    value="{{ old('password') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>

            </div>
            @error('password')
                <span role="alert">
                    <strong>
                        <p class="text text-danger">{{ $message }}</p>
                    </strong>
                </span>
            @enderror
            <div class="row">
                <div class="col-8">

                </div>

            </div>
            <div class="social-auth-links text-center mb-3">


                <button type="submit" class="btn btn-block btn-success">Sign In</button>

            </div>
        </form>
        <!-- /.social-auth-links -->
        {{-- <p class="mb-0">
            <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
        </p> --}}
    </div>
@endsection

@extends('layouts.credentials')

@section('content')
    <div class="login-logo">
        <a href="../../index2.html"><b>Sign Up</b></a>
    </div>
    <!-- /.login-logo -->

    <div class="card-body login-card-body">


        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!--Name-->
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>

            </div>
            @error('name')
                <span role="alert">
                    <strong>
                        <p class="text text-danger">{{ $message }}</p>
                    </strong>
                </span>
            @enderror

            <!--Username-->
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username"
                    value="{{ old('username') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>

            </div>
            @error('username')
                <span role="alert">
                    <strong>
                        <p class="text text-danger">{{ $message }}</p>
                    </strong>
                </span>
            @enderror

            <!--Email-->
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

            <!--Phone-->
            <div class="input-group mb-3">
                <input type="number" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                    </div>
                </div>

            </div>
            @error('phone')
                <span role="alert">
                    <strong>
                        <p class="text text-danger">{{ $message }}</p>
                    </strong>
                </span>
            @enderror


            <!--Password-->
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


            <!--Confirm Password-->
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password"
                    value="{{ old('cpassword') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            @error('cpassword')
                <span role="alert">
                    <strong>
                        <p class="text text-danger">{{ $message }}</p>
                    </strong>
                </span>
            @enderror

            <!--Confirm Password-->

            <label for="files">Profile Picture</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" name="profile_name">
                <div class="input-group-append">
                    <div class="input-group-text">
                        {{-- <span class="fas fa-picture"></span> --}}
                        <span class="fas fa-camera"></span>
                    </div>
                </div>
            </div>
            @error('profile_name')
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


                <button type="submit" class="btn btn-block btn-primary">Signup</button>

            </div>
        </form>


        <!-- /.social-auth-links -->
        <p class="mb-0">
            <a href="{{ route('login') }}" class="text-center">Already have an account? Click here</a>
        </p>
    </div>
    <!-- /.login-card-body -->
@endsection

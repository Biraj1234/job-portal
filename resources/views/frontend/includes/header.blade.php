<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EKJobs-Search Jobs!</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicon -->
    <link href="{{ asset('frontend/img/favicon.ico') }}" rel="icon">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha256-IdfIcUlaMBNtk4Hjt0Y6WMMZyMU0P9PN/pH+DFzKxbI=" crossorigin="anonymous" />


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />




    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/profile.css') }}">


    <style>
        .signin-register {
            /* border: 1px solid red; */
            display: flex;
        }

        .signin-register button {
            margin-right: 1px;
            width: 7rem;
        }

        .form-container {
            margin: 3rem auto;
            /* border: 1px solid gray; */
            box-shadow: 0 0 4px #9b9b9b;
            width: 30rem;
            border-radius: 5px;
            padding: 1rem;
            background: white;
            margin-bottom: 20rem;

        }

        span {
            /* border: 1px solid red; */
            cursor: pointer;
        }

        .dropdown-toggle img {
            /* border: 1px solid gray; */
            box-shadow: 0 0 3px gray;
            width: 50px;
            height: 50px;
            border-radius: 100px;
            /* padding: 5px; */

        }

        .dropdown {
            /* margin-right: 3rem; */

        }

        .form-container-job {
            /* border: 1px solid red; */
            /* padding: 2rem 2rem 2rem 2rem; */
        }

    </style>
    @yield('style')


</head>

<body>
    <div class="container-xxl p-0">



        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="{{ route('/') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">EkJobs</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">


                    @if (request()->segment(1))
                        <a href="{{ route('/') }}" class="nav-item nav-link">Home</a>
                    @else
                        <a href="{{ route('/') }}" class="nav-item nav-link active">Home</a>
                    @endif
                    <a href="{{ route('jobs') }}"
                        class="nav-item nav-link  {{ request()->segment(1) === 'jobs' ? 'active' : '' }}">Jobs</a>
                    <a href="{{ route('about') }}"
                        class="nav-item nav-link {{ request()->segment(1) === 'about' ? 'active' : '' }}">About</a>
                    <a href="{{ route('contact') }}"
                        class="nav-item nav-link {{ request()->segment(1) === 'contact' ? 'active' : '' }}">Contact</a>

                </div>
                <div class="rounded-0 py-4 px-lg-5 d-none d-lg-block">

                    @if (isset(Auth::guard('jobseekers')->user()->id))
                        <div class="dropdown">
                            <div class="dropdown-toggle" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <span>
                                    {{ Auth::guard('jobseekers')->user()->name }}
                                </span>

                                <img src="{{ asset('uploads/jobseekers/' . Auth::guard('jobseekers')->user()->profile_picture) }}"
                                    alt="">
                            </div>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item" href="{{ route('jobseeker.dashboard.index') }}"><i
                                            class="fas fa-user"></i>&nbsp My Profile</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('jobseeker.signout') }}"><i
                                            class="fas fa-sign-out-alt"></i>&nbsp Logout</a>
                                </li>
                            </ul>
                        </div>
                    @elseif(isset(Auth::guard('employers')->user()->id))
                        <div class="dropdown">
                            <div class="dropdown-toggle" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <span>
                                    {{-- {{ Auth::guard('employers')->user()->name }} --}}

                                </span>


                                <img src="{{ asset('uploads/logos/' . Auth::guard('employers')->user()->logo) }}"
                                    alt="">
                            </div>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item" href="{{ route('employer.dashboard.index') }}"><i
                                            class="fas fa-user"></i>&nbsp Our Profile</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('employer.signout') }}"><i
                                            class="fas fa-sign-out-alt"></i>&nbsp Logout</a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="signin-register">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Signin
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                    <li><a class="dropdown-item" href="{{ route('jobseeker.signin') }}"><i
                                                class="fas fa-user-alt"></i>&nbsp Job
                                            Seeker</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('employer.signin') }}"><i
                                                class="fas fa-building"></i>&nbsp Employer</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Register
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ route('frontend.jobseeker.create') }}"><i
                                                class="fas fa-user-alt"></i>&nbsp Job
                                            Seeker</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.employer.create') }}"><i
                                                class="fas fa-building"></i>&nbsp Employer</a>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    @endif

                </div>

            </div>
        </nav>
        <!-- Navbar End -->

@extends('frontend.layouts.master')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('frontend/img/carousel-1.jpg') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4">Find The Perfect Job That
                                    You Deserved</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum
                                    dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd
                                    rebum sea elitr.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('frontend/img/carousel-2.jpg') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job
                                    That Fit You</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum
                                    dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd
                                    rebum sea elitr.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="row g-2">

                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-12">
                                <input type="text" name="keyword" class="form-control border-0"
                                    placeholder="Search by Job Title" />
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <!-- Search End -->


    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
            <div class="row g-4">
                @foreach ($categories as $category)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="{{ route('category', $category->slug) }}">
                            <i class="{{ $category->icon }} text-primary mb-4" style="font-size: 3rem;"></i>


                            <h6 class="mb-3">{{ $category->title }}</h6>
                            <p class="mb-0">{{ $category->jobs->count() }} Jobs</p>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Category End -->



    {{-- @if ()
        JOBS AVAILABLE
    @else
        NOT FOUND
    @endif --}}



    @if(isset(Auth::guard('jobseekers')->user()->id))
    @if (!$preferences->isEmpty())
        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Jobs matching your profile</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">

                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">

                            {{-- {{ $preferences }} --}}
                            @foreach ($preferences as $job)
                                <div class="job-item p-4 mb-4">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded"
                                                src="{{ asset('uploads/logos/' . $job->employer->logo) }}" alt=""
                                                style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-3">{{ $job->title }}</h5>
                                                <span class="text-truncate me-3"><i
                                                        class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location->name }}
                                                </span>
                                                <span class="text-truncate me-3"><i
                                                        class="far fa-clock text-primary me-2"></i>{{ $job->jobType->title }}</span>
                                                <span class="text-truncate me-0"><i
                                                        class="far fa-building text-primary me-2"></i>{{ $job->employer->name }}</span>
                                            </div>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">
                                                <a class="btn btn-light btn-square me-3" href=""></a>
                                                <a class="btn btn-primary"
                                                    href="{{ route('frontend.job.show', $job->id) }}">View</a>
                                            </div>
                                            <small class="text-truncate"><i
                                                    class="far fa-calendar-alt text-primary me-2"></i>Deadline:
                                                {{ $job->deadline }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <a class="btn btn-primary py-3 px-5" href="{{ route('jobs') }}">Browse More Jobs</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif
    @endif
    <!-- Jobs End -->

    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                            href="#tab-1">
                            <h6 class="mt-n1 mb-0">Featured</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                            <h6 class="mt-n1 mb-0">Part Time</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                            <h6 class="mt-n1 mb-0">Full Time</h6>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">


                        @foreach ($jobs as $job)
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded"
                                            src="{{ asset('uploads/logos/' . $job->employer->logo) }}" alt=""
                                            style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">{{ $job->title }}</h5>
                                            <span class="text-truncate me-3"><i
                                                    class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location->name }}
                                            </span>
                                            <span class="text-truncate me-3"><i
                                                    class="far fa-clock text-primary me-2"></i>{{ $job->jobType->title }}</span>
                                            <span class="text-truncate me-0"><i
                                                    class="far fa-building text-primary me-2"></i>{{ $job->employer->name }}</span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-light btn-square me-3" href=""></a>
                                            <a class="btn btn-primary"
                                                href="{{ route('frontend.job.show', $job->id) }}">View</a>
                                        </div>
                                        <small class="text-truncate"><i
                                                class="far fa-calendar-alt text-primary me-2"></i>Deadline:
                                            {{ $job->deadline }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <a class="btn btn-primary py-3 px-5" href="{{ route('jobs') }}">Browse More Jobs</a>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">

                        @foreach ($parts as $part)
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded"
                                            src="{{ asset('uploads/logos/' . $part->employer->logo) }}" alt=""
                                            style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">{{ $part->title }}</h5>
                                            <span class="text-truncate me-3"><i
                                                    class="fa fa-map-marker-alt text-primary me-2"></i>{{ $part->location->name }}
                                            </span>
                                            <span class="text-truncate me-3"><i
                                                    class="far fa-clock text-primary me-2"></i>{{ $part->jobType->title }}</span>
                                            <span class="text-truncate me-0"><i
                                                    class="far fa-building text-primary me-2"></i>{{ $part->employer->name }}</span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-light btn-square me-3" href=""></a>
                                            <a class="btn btn-primary"
                                                href="{{ route('frontend.job.show', $part->id) }}">View</a>
                                        </div>
                                        <small class="text-truncate"><i
                                                class="far fa-calendar-alt text-primary me-2"></i>Deadline:
                                            {{ $part->deadline }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <a class="btn btn-primary py-3 px-5" href="{{ route('jobs') }}">Browse More Jobs</a>
                    </div>
                    <div id="tab-3" class="tab-pane fade show p-0">
                        @foreach ($fulls as $full)
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded"
                                            src="{{ asset('uploads/logos/' . $full->employer->logo) }}" alt=""
                                            style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">{{ $full->title }}</h5>
                                            <span class="text-truncate me-3"><i
                                                    class="fa fa-map-marker-alt text-primary me-2"></i>{{ $full->location->name }}
                                            </span>
                                            <span class="text-truncate me-3"><i
                                                    class="far fa-clock text-primary me-2"></i>{{ $full->jobType->title }}</span>
                                            <span class="text-truncate me-0"><i
                                                    class="far fa-building text-primary me-2"></i>{{ $full->employer->name }}</span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-light btn-square me-3" href=""></a>
                                            <a class="btn btn-primary"
                                                href="{{ route('frontend.job.show', $full->id) }}">View</a>
                                        </div>
                                        <small class="text-truncate"><i
                                                class="far fa-calendar-alt text-primary me-2"></i>Deadline:
                                            {{ $full->deadline }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <a class="btn btn-primary py-3 px-5" href="{{ route('jobs') }}">Browse More Jobs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->
@endsection

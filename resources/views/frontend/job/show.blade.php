@extends('frontend.layouts.master')

@section('content')
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->




        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
                {{-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                    </ol>
                </nav> --}}
            </div>
        </div>
        <!-- Header End -->


        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid border rounded"
                                src="{{ asset('uploads/logos/' . $job->employer->logo) }}" alt=""
                                style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3">{{ $job->title }}</h3>
                                <span class="text-truncate me-3"><i
                                        class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location->name }}</span>
                                <span class="text-truncate me-3"><i
                                        class="far fa-clock text-primary me-2"></i>{{ $job->jobType->title }}</span>

                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Job description</h4>
                            {!! $job->description !!}

                            <h4 class="mb-3">Skills Required</h4>

                            {{-- {{ $job->jobSkill }} --}}

                            @foreach ($job->skills as $data)
                                <span class="badge bg-success" style="margin-bottom: 2rem">{{ $data->name }}</span>
                            @endforeach



                            <h4 class="mb-3">Requirements</h4>
                            {!! $job->requirements !!}

                            <h4 class="mb-3">Benifits</h4>
                            {!! $job->benifits !!}

                        </div>



                        @if (isset(Auth::guard('jobseekers')->user()->id))
                            <div class="">
                                <h4 class="mb-4">Apply For The Job</h4>
                                <form method="POST" action="{{ route('jobseeker.apply') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">

                                        <div class="profile-container">
                                            <div class="left">
                                                <div class="details-left">
                                                    <div class="profile-label">Name</div>
                                                    <div class="profile-label">Email</div>
                                                    <div class="profile-label">Phone</div>
                                                    <div class="profile-label">DOB</div>

                                                </div>
                                                <div class="details-right">

                                                    <div class="result">: {{ $jobseeker->name }}</div>
                                                    <div class="result">: {{ $jobseeker->email }}</div>
                                                    <div class="result">: {{ $jobseeker->phone }}</div>
                                                    <div class="result">: {{ $jobseeker->dob }}</div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <input type="file" name="resume_name" class="form-control bg-white">
                                            @error('resume_name')
                                                <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                            <input type="hidden" name="job_id" value="{{ $job->id }}"
                                                class="form-control bg-white">
                                            <input type="hidden" name="jobseeker_id" value="{{ $jobseeker->id }}"
                                                class="form-control bg-white">
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @else
                            <form method="POST" action="{{ route('jobseeker.apply') }}" enctype="multipart/form-data">
                                @csrf
                                <button class="btn btn-primary w-100">Apply</button>
                            </form>
                        @endif



                    </div>

                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summery</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{ $job->created_at }}
                            </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: {{ $job->title }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{ $job->jobType->title }}
                            </p>

                            <p><i class="fa fa-angle-right text-primary me-2"></i>Location:
                                {{ $job->employer->location }}
                            </p>
                            <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Deadline:
                                {{ $job->deadline }}({{ $daysRemain }} days left)</p>

                        </div>
                        <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Company Detail</h4>
                            <p class="m-0">{{ $job->employer->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail End -->




        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
@endsection

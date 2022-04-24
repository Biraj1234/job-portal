@extends('frontend.layouts.master')

@section('content')
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



    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Search result for "{{ $keyword }}"</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">

                <div class="tab-content">

                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        @forelse ($jobs as $job)
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

                        @empty
                            <div class="job-item p-4 mb-4">
                                <div class="text text-danger">No Job found</div>
                            </div>
                        @endforelse
                        <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->
@endsection

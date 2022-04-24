@extends('frontend.employer.dashboard.layout.mainform')

@section('contents')
    <div class="card-container">
        <div class="rooms cards">
            <div class="card-title">No. of Jobs</div>
            <span class="number">{{ $jobs }}</span>
        </div>
        <div class="views cards">
            <div class="card-title">No. of Views</div>
            {{-- <span class="number">{{$view}}</span> --}}
        </div>
        <div class="comments cards">
            <div class="card-title">Application Received</div>
            {{-- <span class="number">{{$data['rented_room']}}</span> --}}
        </div>
    @endsection

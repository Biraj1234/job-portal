@extends('frontend.employer.dashboard.layout.mainform')

@section('contents')
    <div class="form-container-job">

        {!! Form::open(['route' => $base_route . 'store', 'method' => 'post', 'files' => true]) !!}
        @include('frontend.job.include.mainform')
        {!! Form::close() !!}
    </div>
@endsection

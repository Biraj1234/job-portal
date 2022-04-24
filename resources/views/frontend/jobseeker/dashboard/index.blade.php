@extends($folder.'dashboard.layout.mainform')

@section('contents')
    <div class="card-container">
        <div class="rooms cards">
            <div class="card-title">Jobs Applied</div>
            <span class="number">{{ $jobs }}</span>
        </div>
        <div class="views cards">
            <div class="card-title">Profile Visit</div>
            <span class="number">{{ $profile_visit }}</span>
        </div>
        <div class="comments cards">
            <div class="card-title">C.V Download</div>
            <span class="number">{{ $downloads }}</span>
        </div>

    </div>
@endsection

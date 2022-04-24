@extends('frontend.jobseeker.dashboard.layout.mainform')

@section('contents')
    <div class="form-container-job">


        {!! Form::open(['route' => $base_route . 'store', 'method' => 'post', 'files' => true]) !!}
        @include('frontend.education.include.mainform')

        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection


@section('js')
    <script type="text/javascript">
        function ShowHideDiv(chkPassport) {
            var completed = document.getElementById("completed");
            completed.style.display = chkPassport.checked ? "none" : "block";
        }
    </script>
@endsection

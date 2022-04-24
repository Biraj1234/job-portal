@extends('frontend.employer.dashboard.layout.mainform')


@section('contents')
    @include('backend.includes.flashmessage')

    <h1>Basic Information <a href="{{ route('frontend.employer.edit', $employer->id) }}" class="btn btn-success">Edit</a>
    </h1>
    <table class="table">
        <tr>
            <th scope="col">Name</th>
            <td scope="col">: {{ $employer->name }}</td>
        </tr>
        <tr>
            <th scope="col">Email</th>
            <td scope="col">: {{ $employer->email }}</td>
        </tr>
        <tr>
            <th scope="col">Phone No.</th>
            <td scope="col">: {{ $employer->phone }}</td>
        </tr>
        <tr>
            <th scope="col">Location</th>
            <td scope="col">: {{ $employer->address }}</td>
        </tr>
        <tr>
            <th scope="col">Joined at</th>
            <td scope="col">: {{ $employer->created_at }}</td>
        </tr>
        <tr>
            <th scope="col">Description</th>
            <td scope="col">: {{ $employer->description }}</td>
        </tr>



    </table>


    {{-- <div class="profile-container">
        <div class="left">
            <div class="details-left">
                <div class="profile-label">Name</div>
                <div class="profile-label">Email</div>
                <div class="profile-label">Phone</div>

                <div class="profile-label">Location</div>
                <div class="profile-label">Joined </div>
                <div class="profile-label">Description</div>
            </div>
            <div class="details-right">
                @foreach ($employers as $employee)
                    <div class="result">: {{ $employee->name }}</div>
                    <div class="result">: {{ $employee->email }}</div>
                    <div class="result">: {{ $employee->phone }}</div>

                    <div class="result">: {{ $employee->address }}</div>
                    <div class="result">: {{ $employee->created_at }}</div>
                    <div class="result">: {{ $employee->description }}</div>
                @endforeach
            </div>
        </div>
        <img src="{{ asset('uploads/logos/' . $employee->logo) }}" height="230px" alt="">

    </div> --}}
@endsection

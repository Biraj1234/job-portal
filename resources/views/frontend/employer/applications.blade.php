@extends('frontend.employer.dashboard.layout.mainform')

@section('contents')
    @include('frontend.includes.flashmessage')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Applicant's Name</th>
                <th scope="col">Job Title</th>

                <th scope="col">Applied At</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($jobs as $key => $job)
                @foreach ($job->jobSeeker as $data)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $data->jobSeekers->name }}</td>
                        <td>{{ $data->jobs->title }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td><a href="{{ route('employer.applications.detail', $data->jobSeekers->id) }}"
                                class="btn btn-success">Details</a></td>
                    </tr>
                @endforeach
            @endforeach


        </tbody>
    </table>
@endsection

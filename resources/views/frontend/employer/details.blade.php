@extends('frontend.employer.dashboard.layout.mainform')

@section('contents')
    @include('frontend.includes.flashmessage')


    <h1>Basic Information
    </h1>
    <table class="table">
        <tr>
            <th scope="col">Name</th>
            <td scope="col">: {{ $jobseeker->name }}</td>
        </tr>
        <tr>
            <th scope="col">Date of Birth</th>
            <td scope="col">: {{ $jobseeker->dob }}</td>
        </tr>
        <tr>
            <th scope="col">Phone No.</th>
            <td scope="col">: {{ $jobseeker->phone }}</td>
        </tr>
        <tr>
            <th scope="col">Email</th>
            <td scope="col">: {{ $jobseeker->email }}</td>
        </tr>
        <tr>
            <th scope="col">Bio</th>
            <td scope="col">: {{ $jobseeker->bio }}</td>
        </tr>
        <tr>
            <th scope="col">Skills</th>
            <td scope="col">
                {{-- {{ $skills->name }} --}}
                @foreach ($skills as $skill)
                    <span class="badge bg-secondary">{{ $skill->name }}</span>
                @endforeach
            </td>
        </tr>

        <tr>
            <th scope="col">C.V</th>
            <td scope="col"> <a href="{{ route('downloads', $jobseeker->id) }}"><i class="icon-download-alt"> </i>
                    Download
                    Resume </a>
            </td>
        </tr>


    </table>


    <h1>Educational Qualifications</h1>
    <table class="table">
        {{-- {{ $educations }} --}}
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Degree</th>
                <th scope="col">Board</th>
                <th scope="col">Program</th>
                <th scope="col">Institution Name</th>
                <th scope="col">Started At</th>
                <th scope="col">Completed At</th>
                <th scope="col">Division</th>
            </tr>
        </thead>
        <tbody>

            @forelse($educations as $key => $edu)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $edu->degree }}</td>
                    <td>{{ $edu->board }}</td>
                    <td>{{ $edu->program }}</td>
                    <td>{{ $edu->institution_name }}</td>
                    <td>{{ $edu->started_at }}</td>
                    <td>
                        @if ($edu->completed_at)
                            {{ $edu->completed_at }}
                        @else
                            <span class="badge bg-primary">Running</span>
                        @endif
                    </td>
                    <td>
                        @if ($edu->division)
                            {{ $edu->division }}
                        @else
                            <span class="badge bg-primary">Running</span>
                        @endif
                    </td>



                </tr>

            @empty
                <tr>
                    <td colspan="9" class="empty">No data available</td>
                </tr>
            @endforelse


        </tbody>
    </table>
@endsection

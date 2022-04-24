@extends($folder.'dashboard.layout.mainform')


@section('contents')
    {{-- <div class="popup-message"> --}}


    @include('frontend.includes.flashmessage')

    <h1>Basic Information <a href="{{ route('frontend.jobseeker.edit', $jobseeker->id) }}" class="btn btn-success">Edit</a>
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
                :
                @foreach ($skills as $skill)
                    <span class="badge bg-secondary">{{ $skill->name }}</span>
                @endforeach
            </td>
        </tr>
        <tr>
            <th scope="col">Prefered Category</th>
            <td scope="col">: {{ $jobseeker->category->title }}</td>
        </tr>


    </table>


    <h1>Educational Qualifications</h1>
    <table class="table">
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
                <th scope="col">Action</th>
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
                    <td>
                        <a href="{{ route('frontend.education.edit', $edu->id) }}" class="btn btn-primary"><i
                                class="fas fa-pencil-alt"></i></a>
                        {!! Form::open(['route' => ['frontend.education.destroy', $edu->id], 'method' => 'post', 'class' => 'd-inline']) !!}

                        {!! Form::hidden('_method', 'DELETE') !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to delete this item?');"]) !!}

                        {!! Form::close() !!}
                    </td>


                </tr>

            @empty
                <tr>
                    <td colspan="9" class="empty">Not Added Yet</td>
                </tr>
            @endforelse
            <tr>
                <td colspan="8" style="text-align: center">
                    <a href="{{ route('frontend.education.create') }}" class="btn btn-success">Add</a>
                </td>
            </tr>

        </tbody>
    </table>
@endsection

@extends('frontend.employer.dashboard.layout.mainform')

@section('contents')
    @include('frontend.includes.flashmessage')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Title</th>
                <th scope="col">Deadline</th>
                <th scope="col">Category</th>
                <th scope="col">Level</th>
                <th scope="col">No. of Vacancy</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($jobs as $key => $job)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->deadline }}</td>
                    <td>{{ $job->category->title }}</td>
                    <td>{{ $job->level->title }}</td>
                    <td>{{ $job->no_of_vaccancy }}</td>
                    <td>
                        @if ($job->status == 1)
                            <p class="text text-success">Active</p>
                        @else
                            <p class="text text-danger">Inactive</p>
                        @endif
                    </td>

                    <td>
                        <a class="btn btn-success" target="_blank" href="{{ route('frontend.job.show', $job->id) }}"><i
                                class="far fa-eye"></i></a>
                        <a class="btn btn-primary" href="{{ route('frontend.job.edit', $job->id) }}"><i
                                class="fas fa-pencil-alt"></i></a>


                        {!! Form::open(['route' => ['frontend.job.destroy', $job->id], 'method' => 'post', 'class' => 'd-inline']) !!}

                        {!! Form::hidden('_method', 'DELETE') !!}

                        <button class="btn btn-danger" type="submit"
                            onclick="return confirm('Are you sure you want to delete this item?');"> <i
                                class="fas fa-trash-alt"></i></button>
                        {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to delete this item?');"]) !!} --}}

                        {!! Form::close() !!}


                    </td>



                </tr>

            @empty
                <td colspan="8" style="text-align: center;color:red">No jobs added yet</td>
            @endforelse

        </tbody>
    </table>
@endsection

@extends($folder.'dashboard.layout.mainform')

@section('contents')
    @include('frontend.includes.flashmessage')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Title</th>
                <th scope="col">Company</th>
                <th scope="col">Level</th>
                <th scope="col">Action</th>


            </tr>
        </thead>
        <tbody>

            {{-- {{ $jobs }} --}}
            @forelse ($jobs as $key => $job)
                <tr>
                    <td>
                        {{ $key + 1 }}
                    </td>
                    <td>
                        {{ $job->title }}
                    </td>
                    <td>
                        {{ $job->employer->name }}
                    </td>
                    <td>
                        {{ $job->level->title }}
                    </td>
                    <td>
                        {!! Form::open(['route' => [$base_route . 'destroy', $job->id], 'method' => 'post', 'class' => 'd-inline']) !!}

                        {!! Form::hidden('_method', 'DELETE') !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to delete this item?');"]) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="4" style="text-align: center ;color:red">You haven't applied for any jobs yet.</td>
                </tr>
            @endforelse



        </tbody>
    </table>
@endsection

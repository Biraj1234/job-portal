@extends('backend.layouts.master')
@section('title', $title)
@section('content')
    <section class="content">


        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $title }} {{ $panel }}


                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    @include('backend.includes.flashmessage')

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>No. of Jobs Applied</th>
                                <th>Actions</th>

                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($jobseekers as $index => $data)
                                <tr>

                                    {{-- {{ $data }}at}} --}}
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>1</td>


                                    <td>
                                        <a class="btn btn-success"
                                            href="{{ route($base_route . 'show', $data->id) }}">Details</a>



                                        {!! Form::open(['route' => [$base_route . 'destroy', $data->id], 'method' => 'post', 'class' => 'd-inline']) !!}

                                        {!! Form::hidden('_method', 'DELETE') !!}

                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to delete this item?');"]) !!}

                                        {!! Form::close() !!}




                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" style="color: red; text-align:center">No {{ $panel }} found..
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>


            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection

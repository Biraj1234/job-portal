@extends('backend.layouts.master')
@section('title', $title)
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $title }} {{ $panel }}
                    <a class="btn btn-primary" href="{{ route($base_route . 'create') }}">
                        <i class="fas fa-plus"></i></button>
                        Add
                    </a>

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
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data['rows'] as $index => $data)
                                <tr>

                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        <span class="badge badge-primary">{{ $data->role->title }}</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-success"
                                            href="{{ route($base_route . 'show', $data->id) }}">View</a>


                                        {!! Form::open(['route' => [$base_route . 'destroy', $data->id], 'method' => 'post', 'class' => 'd-inline']) !!}

                                        {!! Form::hidden('_method', 'DELETE') !!}

                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                        {!! Form::close() !!}
                                    </td>

                                </tr>
                            @endforeach
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

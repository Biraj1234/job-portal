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
                    <a class="btn btn-success" href="{{ route($base_route . 'index') }}">
                        <i class="fas fa-list"></i>
                        List
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
                                <th>Delelte At</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($data['rows'] as $index => $data)
                                <tr>

                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->deleted_at }}</td>

                                    <td>



                                        {!! Form::open(['route' => [$base_route . 'restore', $data->id], 'method' => 'POST', 'class' => 'd-line']) !!}
                                        {!! Form::submit('Restore', ['class' => 'btn btn-success']) !!}

                                        {!! Form::close() !!}


                                        {!! Form::open(['route' => [$base_route . 'force_delete', $data->id], 'method' => 'DELETE']) !!}
                                        {!! Form::submit('Fore remove', ['class' => 'btn btn-danger']) !!}

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

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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>I.D</th>
                                <td>{{ $data['row']->id }}</td>
                            </tr>

                            <tr>
                                <th>Title</th>
                                <td>{{ $data['row']->title }}</td>
                            </tr>


                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($data['row']->status == 1)
                                        <p class="text text-success">Active</p>
                                    @else
                                        <p class="text text-danger">Inactive</p>
                                    @endif
                                </td>
                            </tr>


                        </thead>



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

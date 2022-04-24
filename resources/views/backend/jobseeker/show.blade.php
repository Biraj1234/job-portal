@extends('backend.layouts.master')
@section('title', $title)
@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $title }} {{ $panel }}

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
                                <th>Name</th>
                                <td>{{ $row->name }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{{ $row->email }}</td>
                            </tr>

                            <tr>
                                <th>Username</th>
                                <td>{{ $row->username }}</td>
                            </tr>

                            <tr>
                                <th>Phone</th>
                                <td>{{ $row->phone }}</td>
                            </tr>
                            <tr>
                                <th>Bio</th>
                                <td>{{ $row->bio }}</td>
                            </tr>


                            <tr>
                                <th>Profile Picture</th>
                                <td>
                                    <img src="{{ asset('uploads/jobseekers/' . $row->profile_picture) }}" alt=""
                                        height="100px">

                                </td>
                            </tr>

                            <tr>
                                <th>No.of Jobs</th>
                                <td>{{ $row->jobs_count }}

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

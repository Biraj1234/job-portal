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
                                <th>Phone</th>
                                <td>{{ $row->phone }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $row->address }}</td>
                            </tr>


                            <tr>
                                <th>Description</th>
                                <td>{{ $row->description }}

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

                <h3>Jobs Posted By {{ $row->name }}</h3>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Position</th>
                            <th scope="col">Posted At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $key => $job)
                            <tr>
                                <th>{{ $key + 1 }}</th>

                                <td>{{ $job->title }}</td>
                                <td>{{ $job->level->title }}</td>
                                <td>{{ $job->created_at }}</td>

                                <td>
                                    <a class="btn btn-success" target="_blank"
                                        href="{{ route('frontend.job.show', $job->id) }}">View</a>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>


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

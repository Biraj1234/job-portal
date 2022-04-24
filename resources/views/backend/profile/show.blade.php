@extends('backend.layouts.master')
@section('title', $title)
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $title }} {{ $panel }}
                    <a class="btn btn-primary" href="{{ route($base_route . 'edit', $data['row']->id) }}">
                        <i class="fas fa-list"></i>
                        Edit
                    </a>

                    <a class="btn btn-secondary" href="{{ route($base_route . 'edit', $data['row']->id) }}">
                        <i class="fas fa-lock"></i>
                        Change Password
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
                                <td>{{ $data['row']->name }}</td>
                            </tr>

                            <tr>
                                <th>Username</th>
                                <td>{{ $data['row']->username }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $data['row']->phone }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $data['row']->email }}</td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td>
                                    <span class="badge badge-primary"> {{ $data['row']->role->title }}</span>

                                </td>
                            </tr>
                            <tr>
                                <th>Profile Picture</th>
                                <td>
                                    <img src="{{ asset('uploads/users/' . $data['row']->profile_picture) }}" alt=""
                                        width="100px" height="100px">
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

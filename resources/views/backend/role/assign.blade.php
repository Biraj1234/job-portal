@extends('backend.layouts.master')
@section('title', $title)
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $title }} {{ $panel }}
                    <a class="btn btn-primary" href="{{ route($base_route . 'index') }}">
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
                                <td>{{ $row->id }}</td>
                            </tr>

                            <tr>
                                <th>Title</th>
                                <td>{{ $row->title }}</td>
                            </tr>


                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($row->status == 1)
                                        <p class="text text-success">Active</p>
                                    @else
                                        <p class="text text-danger">Inactive</p>
                                    @endif
                                </td>
                            </tr>


                        </thead>



                    </table>
                    <h3>Permissions</h3>

                    <form action="{{ route('permission') }}">
                        @csrf
                        <input type="hidden" name="role_id" value="{{ $row->id }}">
                        <table class="table table-bordered">
                            {{-- {{ $module }} --}}
                            <thead>
                                <tr>
                                    <th>Module</th>
                                    <th>Permissions</th>
                                </tr>
                                @foreach ($modules as $module)
                                    <tr>
                                        <td>
                                            <p>{{ $module->title }}</p>

                                        </td>
                                        <td>
                                            <ul style="list-style: none">


                                                @foreach ($module->permissions as $permission)
                                                    @if (in_array($permission->id, $assigned_permissions))
                                                        <li>
                                                            <input type="checkbox" name="permission_id[]"
                                                                value="{{ $permission->id }}" checked="checked">
                                                            {{ $permission->title }}
                                                        </li>
                                                    @else
                                                        <li>
                                                            <input type="checkbox" name="permission_id[]"
                                                                value="{{ $permission->id }}">
                                                            {{ $permission->title }}
                                                        </li>
                                                    @endif
                                                @endforeach


                                            </ul>
                                        </td>

                                    </tr>
                                @endforeach
                            </thead>
                        </table>
                        <button class="btn btn-success">Assign Now</button>
                    </form>
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

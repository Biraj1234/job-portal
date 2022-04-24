@extends('backend.layouts.master')
@section('title',$title)
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$title}} {{$panel}}
                    <a class="btn btn-success" href="{{route($base_route.'index')}}">
                        <i class="fas fa-list"></i>
                        List
                    </a>
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                {!!  Form::open(['route' => $base_route.'store','method'=>'post','files'=>'true']) !!}

                @include($base_route.'include.mainform')


                {!!  Form::submit('Submit',['class'=>'btn btn-success']) !!}
                {!!  Form::reset('Clear',['class'=>'btn btn-primary']) !!}

                {!! Form::close() !!}

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


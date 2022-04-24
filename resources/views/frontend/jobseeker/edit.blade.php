@extends('frontend.jobseeker.dashboard.layout.mainform')

@section('contents')
    <div class="form-container-job">

        {!! Form::model($row, ['route' => [$base_route . 'update', $row->id], 'files' => 'true']) !!}
        <!--$row purano value tanira xa route le udpate ma id pathairaxa-->

        {!! Form::hidden('_method', 'PUT') !!}

        <h1>Basic Info</h1>
        <!--Name-->
        <div class="mb-3">
            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}

            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            @error('name')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <!--Username-->
        <div class="mb-3">
            {!! Form::label('username', 'Username', ['class' => 'control-label']) !!}

            {!! Form::text('username', null, ['class' => 'form-control']) !!}
            @error('username')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <!--DOB-->
        <div class="mb-3">
            {!! Form::label('dob', 'DOB', ['class' => 'control-label']) !!}

            {!! Form::date('dob', null, ['class' => 'form-control']) !!}
            @error('dob')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>




        <!--Bio-->
        <div class="mb-3">
            {!! Form::label('bio', 'Bio', ['class' => 'control-label']) !!}

            {!! Form::textarea('bio', null, ['class' => 'form-control', 'rows' => 5, 'cols' => 40]) !!}
            @error('bio')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Phone-->
        <div class="mb-3">
            {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}

            {!! Form::number('phone', null, ['class' => 'form-control', 'rows' => 5, 'cols' => 40]) !!}
            @error('phone')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Profile Picture-->
        <div class="mb-3">
            {!! Form::label('bio', 'Profile Picture', ['class' => 'control-label']) !!}
            {!! Form::file('profile_name', null, ['class' => 'form-control', 'rows' => 5, 'cols' => 40]) !!}
            <br>
            <img src="{{ asset('uploads/jobseekers/' . $row->profile_picture) }}" alt="" height="100px">

            @error('bio')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        {{-- <!--Skills-->
        <div class="mb-3">
            {!! Form::label('skill_id', 'Skills', ['class' => 'control-label']) !!}

            <select id="nameId" name="job_skill_id[]" class="form-control" multiple="multiple">

                @foreach ($skill as $d)
                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                @endforeach

            </select>


            @error('employee_search')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div> --}}




        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection

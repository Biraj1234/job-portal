@extends('frontend.employer.dashboard.layout.mainform')

@section('contents')
    <div class="form-container-job">

        {!! Form::model($row, ['route' => [$base_route . 'update', $row->id]]) !!}
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

        <!--Email-->
        <div class="mb-3">
            {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}

            {!! Form::text('email', null, ['class' => 'form-control']) !!}
            @error('email')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <!--Phone No.-->
        <div class="mb-3">
            {!! Form::label('phone', 'Phone No.', ['class' => 'control-label']) !!}

            {!! Form::number('phone', null, ['class' => 'form-control']) !!}
            @error('phone')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>


        <!--Address-->
        <div class="mb-3">
            {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}

            {!! Form::text('address', null, ['class' => 'form-control']) !!}
            @error('address')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Description-->
        <div class="mb-3">
            {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}

            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5, 'cols' => 40]) !!}
            @error('description')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Profile Picture-->
        <div class="mb-3">
            {!! Form::label('bio', 'Profile Picture', ['class' => 'control-label']) !!}
            {!! Form::file('profile_name', null, ['class' => 'form-control', 'rows' => 5, 'cols' => 40]) !!}
            <br>
            <img src="{{ asset('uploads/logos/' . $row->logo) }}" alt="" height="100px">

            @error('bio')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>




        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection

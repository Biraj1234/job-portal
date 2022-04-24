@extends('frontend.jobseeker.dashboard.layout.mainform')

@section('contents')
    <div class="form-container-job">
        <a href="{{ url()->previous() }}">back</a>

        {!! Form::model($data['row'], ['route' => [$base_route . 'update', $data['row']->id]]) !!}

        {!! Form::hidden('_method', 'PUT') !!}
        <!--Degree-->
        <div class="mb-3">
            {!! Form::label('degree', 'Degree', ['class' => 'control-label']) !!}

            <select name="degree" id="" class="form-control">
                <option value="">Select a degree</option>
                <option value="SLC" {{ $data['row']->degree === 'SLC' ? 'selected' : '' }}>SLC</option>
                <option value="Bachelor" {{ $data['row']->degree == 'Bachelor' ? 'selected' : '' }}>Bachelor</option>
                <option value="Master" {{ $data['row']->degree == 'Master' ? 'selected' : '' }}>Master</option>
                <option value="PHD" {{ $data['row']->degree == 'PHD' ? 'selected' : '' }}>PHD</option>
                <option value="Other" {{ $data['row']->degree == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('degree')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>



        <!--Program-->
        <div class="mb-3">
            {!! Form::label('program', 'Program', ['class' => 'control-label']) !!}

            {!! Form::text('program', null, ['class' => 'form-control', 'placeholder' => 'BIM, MBA']) !!}
            @error('program')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Board-->
        <div class="mb-3">
            {!! Form::label('board', 'Board', ['class' => 'control-label']) !!}

            {!! Form::text('board', null, ['class' => 'form-control', 'placeholder' => 'Tribhuva University, Kathmandu University']) !!}
            @error('board')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Institution Name-->
        <div class="mb-3">
            {!! Form::label('institution_name', 'Institution Name', ['class' => 'control-label']) !!}

            {!! Form::text('institution_name', null, ['class' => 'form-control']) !!}
            @error('institution_name')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Started At-->
        <div class="mb-3">
            {!! Form::label('started_at', 'Started At', ['class' => 'control-label']) !!}

            {!! Form::date('started_at', null, ['class' => 'form-control']) !!}
            @error('started_at')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Ended At-->
        <div class="mb-3">
            {!! Form::label('completed_at', 'Ended At', ['class' => 'control-label']) !!}

            {!! Form::date('completed_at', null, ['class' => 'form-control']) !!}
            @error('completed_at')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Division-->
        <div class="mb-3">
            {!! Form::label('division', 'Division', ['class' => 'control-label']) !!}
            <select name="division" id="" class="form-control">
                <option value="">Select a division</option>
                <option value="First Division" {{ $data['row']->division === 'First Division' ? 'selected' : '' }}>First
                    Division</option>
                <option value="Second Division" {{ $data['row']->division === 'Second Division' ? 'selected' : '' }}>
                    Second
                    Division</option>
                <option value="Third Division" {{ $data['row']->division === 'Third Division' ? 'selected' : '' }}>Third
                    Division</option>
            </select>
            @error('ended_at')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>


        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}


        {!! Form::close() !!}
    </div>
@endsection

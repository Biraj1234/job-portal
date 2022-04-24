@extends('frontend.employer.dashboard.layout.mainform')

@section('contents')
    <div class="form-container-job">

        {!! Form::model($row, ['route' => [$base_route . 'update', $row->id]]) !!}
        <!--$row purano value tanira xa route le udpate ma id pathairaxa-->

        {!! Form::hidden('_method', 'PUT') !!}

        <!--Title-->
        <div class="mb-3">
            {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}

            {!! Form::text('title', null, ['class' => 'form-control']) !!}
            @error('title')
                <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <!--Job Type-->
        <div class="mb-3">
            {!! Form::label('job_type_id', 'Job Type', ['class' => 'control-label']) !!}

            {!! Form::select('job_type_id', $types, null, ['class' => 'form-control', 'placeholder' => 'Select job type']) !!}
            @error('job_type_id')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Category-->
        <div class="mb-3">
            {!! Form::label('category_id', 'Category', ['class' => 'control-label']) !!}

            {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Select a category']) !!}
            @error('category_id')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Level-->
        <div class="mb-3">
            {!! Form::label('job_level_id', 'Level', ['class' => 'control-label']) !!}

            {!! Form::select('job_level_id', $levels, null, ['class' => 'form-control', 'placeholder' => 'Select job level']) !!}
            @error('job_level_id')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>


        <!--Location-->
        <div class="mb-3">
            {!! Form::label('location_id', 'Location', ['class' => 'control-label']) !!}

            {!! Form::select('location_id', $locations, null, ['class' => 'form-control', 'placeholder' => 'Select job location']) !!}
            @error('location_id')
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



        <!--Description-->
        <div class="mb-3">
            {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}

            {!! Form::textarea('description', null, ['class' => 'ckeditor form-control']) !!}
            @error('description')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Requirements-->
        <div class="mb-3">
            {!! Form::label('requirements', 'Requirements', ['class' => 'control-label']) !!}


            {!! Form::textarea('requirements', null, ['class' => 'ckeditor form-control']) !!}
            @error('requirements')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <!--Benifits-->
        <div class="mb-3">
            {!! Form::label('benifits', 'Benifits', ['class' => 'control-label']) !!}

            {!! Form::textarea('benifits', null, ['class' => 'ckeditor form-control']) !!}
            @error('benifits')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>



        <!--No. of Vacancy-->
        <div class="mb-3">
            {!! Form::label('no_of_vaccancy', 'No. of Vacancy', ['class' => 'control-label']) !!}

            {!! Form::number('no_of_vaccancy', null, ['class' => 'form-control']) !!}
            @error('no_of_vaccancy')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>



        <!--Deadline-->
        <div class="mb-3">
            {!! Form::label('deadline', 'Deadline', ['class' => 'control-label']) !!}

            {!! Form::date('deadline', null, ['class' => 'form-control']) !!}
            @error('deadline')
                <p class="text text-danger">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-3">
            {!! Form::label('statustitle', 'Status', ['class' => 'control-label']) !!}
            {!! Form::radio('status', 1) !!}Active
            {!! Form::radio('status', 0, true) !!}Inactive

        </div>

        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection

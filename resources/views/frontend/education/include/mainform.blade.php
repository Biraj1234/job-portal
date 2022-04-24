<!--Degree-->
<div class="mb-3">
    {!! Form::label('degree', 'Degree', ['class' => 'control-label']) !!}

    <select name="degree" id="" class="form-control">
        <option value="">Select a degree</option>
        <option value=" SLC">SLC</option>
        <option value="Bachelor">Bachelor</option>
        <option value="Master">Master</option>
        <option value="PHD">PHD</option>
        <option value="Other">Other</option>
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



<!--Currently-->
<div class="mb-3">
    <input class="form-check-input" type="checkbox" value="" id="currently" onclick="ShowHideDiv(this)">
    <label class="form-check-label" for="flexCheckIndeterminate">
        Currently Studying here?
    </label>

</div>

<!--Ended At-->


<div id="completed">
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
            <option value="">Select division</option>
            <option value="First Division">Distinction</option>
            <option value="First Division">First Division</option>
            <option value="Second Division">Second Division</option>
            <option value="Third Division">Third Division</option>
        </select>
        @error('ended_at')
            <p class="text text-danger">{{ $message }}</p>
        @enderror

    </div>
</div>

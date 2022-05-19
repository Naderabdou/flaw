
<div class="form-group">
    {!! Form::label('bug_name', ': Bug_Name ',['class'=>'control-label col-lg-6']) !!}

    <div class="col-lg-10">
        {!! Form::text('bug_name',null,['class'=>'form-control']) !!}
    </div>
    @error('bug_name')
    <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
    @enderror
</div>







<div class="form-group">
    {!! Form::label(': Bug_tool', ': Bug_tool ',['class'=>'control-label col-lg-6']) !!}

    <div class="col-lg-10">
        {!! Form::text('Bug_tool',null,['class'=>'form-control']) !!}
    </div>
    @error('Bug_tool')
    <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    {!! Form::label(': causes_name', ': causes_name ',['class'=>'control-label col-lg-6']) !!}

    <div class="col-lg-10">
        {!! Form::text('causes_name',null,['class'=>'form-control']) !!}
    </div>
    @error('causes_name')
    <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
    @enderror
</div>


<div class="form-group">
    {!! Form::label(': bug_desc', ': bug_desc ',['class'=>'control-label col-lg-6']) !!}

    <div class="col-lg-10">
        {!! Form::text('bug_desc',null,['class'=>'form-control']) !!}
    </div>
    @error('bug_desc')
    <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('causes_glitch', ': causes_glitch ',['class'=>'control-label col-lg-6']) !!}

    <div class="col-lg-10">
        {!! Form::select('causes_glitch_id',$Causes_glitch,null, ['class'=>'form-control input-xlg']); !!}
    </div>
    @error('causes_glitch')
    <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('City', ': City ',['class'=>'control-label col-lg-6']) !!}

    <div class="col-lg-10">
        {!! Form::select('city_id',$city, null, ['class'=>'form-control input-xlg']); !!}
    </div>
    @error('city_id')
    <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
    @enderror
</div>


<div class="form-group">
    {!! Form::label('fault_side', ': fault_side ',['class'=>'control-label col-lg-6']) !!}

    <div class="col-lg-10">
        {!! Form::select('fault_side_id',$Fault_side, null, ['class'=>'form-control input-xlg']); !!}
    </div>
    @error('causes_glitch')
    <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
    @enderror
</div>


<div class="form-group">
    {!! Form::label('image', ': IMAGE ',['class'=>'control-label col-lg-6']) !!}

    <div class="col-lg-10">
        <input type="file" name="file[]" placeholder="Choose files" multiple >
    </div>
    @error('file')
    <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    <div class="col-lg-10">
        {!! Form::hidden ('user_id',auth()->user()->id,['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-12"></label>

    <div class="col-lg-10">
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-left13 position-right"></i></button>
        </div>

    </div>
</div>












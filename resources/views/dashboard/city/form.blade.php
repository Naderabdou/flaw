<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New City</h4>
        </div>
        <div class="modal-body">
            {!! Form::label('Name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'write your City Name']) !!}
            @error('code')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>
        <div class="modal-body">
            {!! Form::label('Code','Code') !!}
            {!! Form::text('code',null,['class'=>'form-control','placeholder'=>'write your City Name']) !!}
            @error('code')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>

        <div class="modal-footer">
            {!! Form::submit('Save'); !!}

            {!! Form::submit('close',[ 'data-dismiss'=>'modal']); !!}

        </div>

    </div>

</div>

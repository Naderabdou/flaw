
<div class="container" style="margin-top: 20px">
    <div class="modal-content col-12">
        <div class="modal-header">
            <h4 class="modal-title">New Splash</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="modal-body">
                {!! Form::label('bug_name', ': Bug_Name ',['class'=>'control-label col-lg-6']) !!}
                {!! Form::text('bug_name',null,['class'=>'form-control']) !!}
                @error('bug_name')
                <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                @enderror

            </div>


        </div>
        <div class="col-md-6 ">
            <div class="modal-body">
                {!! Form::label(': Bug_tool', ': Bug_tool ',['class'=>'control-label col-lg-6']) !!}
                {!! Form::text('Bug_tool',null,['class'=>'form-control']) !!}
                @error('Bug_tool')
                <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                @enderror

            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 ">
            <div class="modal-body">
                {!! Form::label(': causes_name', ': causes_name ',['class'=>'control-label col-lg-6']) !!}
                {!! Form::text('causes_name',null,['class'=>'form-control']) !!}
                @error('causes_name')
                <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                @enderror

            </div>
        </div>
        <div class="col-md-6 ">
            <div class="modal-body">
                {!! Form::label(': bug_desc', ': bug_desc ',['class'=>'control-label col-lg-6']) !!}
                {!! Form::text('bug_desc',null,['class'=>'form-control']) !!}
                @error('bug_desc')
                <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                @enderror

            </div>
        </div>
    </div>
            <div class="row">
                <div class="col-md-6 ">
                    <div class="modal-body">
                        {!! Form::label('City', ': City ',['class'=>'control-label col-lg-6']) !!}
                        {!! Form::select('city_id',$city, null, ['class'=>'form-control input-xlg']); !!}
                        @error('city_id')
                        <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                        @enderror

                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="modal-body">
                        {!! Form::label('causes_glitch', ': causes_glitch ',['class'=>'control-label col-lg-6']) !!}
                        {!! Form::select('causes_glitch_id',$Causes_glitch,null, ['class'=>'form-control input-xlg']); !!}
                        @error('causes_glitch')
                        <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                        @enderror

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 ">
                    <div class="modal-body">
                        {!! Form::label('fault_side', ': fault_side ',['class'=>'control-label col-lg-6']) !!}
                        {!! Form::select('fault_side_id',$Fault_side, null, ['class'=>'form-control input-xlg']); !!}
                        @error('causes_glitch')
                        <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                        @enderror

                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="modal-body">
                        {!! Form::label('image', ': IMAGE ',['class'=>'control-label col-lg-6']) !!}
                        <div class="col-lg-10">
                            <input type="file" name="file[]" placeholder="Choose files" multiple >
                        </div>
                        @error('file')
                        <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                        @enderror
                        @foreach($userdata->attachment as $attach )
                            <div class="col-md-6">

                                <!-- Blog layout #1 with image -->
                                <div class="panel panel-flat">
                                    <div class="panel-body">
                                        <div class="thumb content-group">
                                            <iframe class="img-responsive" src="https://drive.google.com/file/d/{{$attach->file}}/preview" allow="autoplay"></iframe>

                                        </div>

                                    </div>

                                    <div class="panel-footer panel-footer-transparent">
                                        <div class="heading-elements">
                                            <ul class="list-inline list-inline-separate heading-text text-muted">
                                                <li><a href="#" class="text-muted">Delete</a></li>
                                                <li><a href="#" class="text-muted"> <input type="checkbox" name="update[]" value="{{$attach->id}}" ></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /blog layout #1 with image -->

                            </div>


                        @endforeach

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 ">
                    <div class="modal-body">
                        {!! Form::hidden ('user_id',auth()->user()->id,['class'=>'form-control']) !!}

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12 ">
                    <div class="modal-footer">
                        {!! Form::submit('save'); !!}

                        {!! Form::submit('close',[ 'data-dismiss'=>'modal']); !!}

                    </div>
                </div>
            </div>




        </div>
    </div>

</div>







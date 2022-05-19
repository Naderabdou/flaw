<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Blog</h4>
        </div>
        <div class="modal-body">
            {!! Form::label('Blog Name','Blog Name') !!}
            {!! Form::text('name_blog',null,['class'=>'form-control','placeholder'=>'write your blog name']) !!}
            @error('name_blog')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror
        </div>
        <div class="modal-body">
            {!! Form::label('Blog Description ','Description') !!}
            {!! Form::text('desc_blog',null,['class'=>'form-control','placeholder'=>'write your Description']) !!}
            @error('desc_blog')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>
        <div class="modal-body">
            {!! Form::label('image','image') !!}
            <input type="file" name="file" placeholder="Choose files"  >
            @error('file')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>
        <div class="modal-body">
            <input type="hidden" name="name" value="{{ Auth::user()->name }}"  >


        </div>
        <div class="page-container modal-body">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main sidebar -->
                <!-- /main sidebar -->

                <div class="content-wrapper">
                    <!-- Content area -->
                    <div class="content">

                        <!-- CKEditor default -->
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Full featured CKEditor</h5>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body">
                                <p class="content-group">CKEditor is a ready-for-use HTML text editor designed to simplify web content creation. It's a WYSIWYG editor that brings common word processor features directly to your web pages. It benefits from an active community that is constantly evolving the application with free add-ons and a transparent development process.</p>

                                    <div class="content-group">
                                        {!! Form::textarea('editor_full',null,['id'=>'editor-full', 'row'=>'10' , 'cols'=>'3']) !!}

                                    </div>

                            </div>
                        </div>
                        <!-- /CKEditor default -->

                    </div>
                    <!-- /content area -->

                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>

        <div class="modal-footer">
            {!! Form::submit('Save'); !!}

            {!! Form::submit('close',[ 'data-dismiss'=>'modal']); !!}

        </div>

    </div>

</div>


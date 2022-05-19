@extends('dashboard.layout.Master')
@section('js')
    <!-- Core JS files -->

    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="/admin/global_assets/js/plugins/editors/ckeditor/ckeditor.js"></script>
    <script src="/admin/global_assets/js/plugins/forms/selects/select2.min.js"></script>

    <script src="/admin/global_assets/js/demo_pages/editor_ckeditor_rtl.js"></script>

    <script>
        function replay(e){
            let replay =document.getElementById(e)
            if (replay.style.display==='none'){
                replay.style.display='block'
            }

        }
    </script>

@endsection

@section('content')
    <body class="has-detached-right">

    <!-- Main navbar -->
    <!-- /main navbar -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <!-- /main sidebar -->


            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header --><!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Detached content -->
                    <div class="container-detached">
                        <div class="content-detached">

                            <!-- Post -->
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="content-group-lg">
                                        <div class="content-group text-center">
                                            <a href="#" class="display-inline-block">
                                            </a>
                                        </div>

                                        <h3 class="text-semibold mb-5">
                                            <a href="#" class="text-default">{{$read->name_blog}}</a>
                                        </h3>

                                        <ul class="list-inline list-inline-separate text-muted content-group">
                                            <li>By <a href="#" class="text-muted">{{$read->name}}</a></li>
                                            <li>{{$read->created_at->diffForhumans()}}</li>
                                        </ul>
                                    </div>

                                    <div class="content-group-lg">
                                        <h5 class="text-semibold">{{$read->desc_blog}}</h5>

                                        <p>{!!$read->editor_full!!}</p>

                                    </div>

                                </div>
                            </div>
                            <!-- /post -->


                            <!-- About author -->
                            <!-- /about author -->


                            <!-- Comments -->
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title text-semiold">Discussion</h6>
                                    <div class="heading-elements">
                                        <ul class="list-inline list-inline-separate heading-text text-muted">
                                            <li>{{$read->comments->count()}} Comments</li>
                                            <li>75 pending review</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <ul class="media-list stack-media-on-mobile">
                                        @foreach($read->comments as $comment)


                                        <li class="media">
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <a href="#" class="text-semibold">{{ $comment->name }}</a>
                                                    <span class="media-annotation dotted">{{$comment->created_at->diffForhumans()}}</span>
                                                </div>

                                                <p>{{ $comment->body }}</p>

                                                <ul class="list-inline list-inline-separate text-size-small">
                                                    <li> <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                                    <li><a onclick="replay('edit-form-{{$comment->id}}')" >edit</a>&nbsp;</li>
                                                    <li>
                                                        <a href="{{route('commentsBlog.destroy',$comment->id)}}" style="cursor: pointer;"  class="delete-comment" token="{{ csrf_token() }}" comment-did="{{ $comment->id }}" >Delete</a>
                                                    </li>


                                                    <div class="replay-form" id="edit-form-{{$comment->id}}" style="display: none">

                                                        <form method="post" action="{{route('commentsBlog.update',$comment->id)}}">
                                                            @csrf
                                                            @method('put')
                                                            <div class="form-group">
                                                                <textarea class="form-control" name="body" placeholder="Enter your reply"></textarea>
                                                                <input class="btn btn-primary" type="submit" value="Edit">

                                                            </div>
                                                        </form>

                                                    </div>


                                                </ul>
                                            </div>



                                            @endforeach


                                        </li>
                                    </ul>
                                </div>

                                <hr class="no-margin">

                                <div class="panel-body">
                                    <h6 class="no-margin-top content-group">Add comment</h6>
                                    <div class="content-group">
                                        <div class="panel-body">
                                            @if (session('status'))
                                                <div class="alert alert-success">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                            <form id="comment-form" method="post" action="{{ route('commentsBlog.store') }}" >
                                                {{ csrf_field() }}
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >

                                                <input type="hidden" name="blog_id" value="{{ $read->id }}" >

                                                <div class="row" style="padding: 10px;">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="body" placeholder="Write something from your heart..!"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row" style="padding: 0 10px 0 10px;">
                                                    <div class="text-right" >
                                                        <button type="submit" class="btn bg-blue"><i class="icon-plus22"></i> Add comment</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>

                                    </div>

                                    <div class=>
                                    </div>
                                </div>
                            </div>
                            <!-- /comments -->

                        </div>
                    </div>
                    <!-- /detached content -->


                    <!-- Detached sidebar -->
                    <div class="sidebar-detached">
                        <div class="sidebar sidebar-default sidebar-separate">
                            <div class="sidebar-content">

                                <!-- Sidebar search -->
                                <!-- /sidebar search -->


                                <!-- Categories -->
                                <div class="sidebar-category">
                                    <div class="category-content no-padding">
                                        <img src="/storage/{{$read->file}}" alt="" class="img-responsive" style="width: 500px; height: 500px" >
                                    </div>
                                </div>
                                <!-- /categories -->












                            </div>
                        </div>
                    </div>
                    <!-- /detached sidebar -->


                    <!-- Footer -->
                    <div class="footer text-muted">
                        &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
                    </div>
                    <!-- /footer -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

    </body>

@endsection

@extends('dashboard.layout.Master')

@section('title')
    ALL categories
@endsection
@section('text')
    Courses
@endsection
@section('name')
    Courses
@endsection
@section('js')
    <script src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>
    <script>
        function replay(e){
            let replay =document.getElementById(e)
            if (replay.style.display==='none'){
                replay.style.display='block'
            }

        }
        function display() {

            document.getElementById('rate_div').style.display='none'











        }
        $("#input-id").rating()
    </script>

    <style>





        label {

            cursor: pointer;
            display: inline-flex;
            transition: color 0.5s;
        }

        svg {
            -webkit-text-fill-color: transparent;
            filter:drop-shadow(5px 1px 3px rgba(198, 206, 237, 1));
        }

        input {
            height: 100%;
            width: 100%;
        }

        input {
            display: none;
        }

        label:hover,
        label:hover ~ ,
        input:checked ~   {
        }

        label:hover,
        label:hover ~ label,
        input:checked ~ label  {
            color: yellow;
        }

    </style>


@endsection
@section('content')

    <!-- Basic datatable -->

    <body class="sidebar-xs has-detached-right">


    <!-- /main navbar -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <!-- /main sidebar -->


            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Detached content -->
                    <div class="container-detached">
                        <div class="content-detached">

                            <!-- Course overview -->
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h6 class="panel-title text-semibold">Data Governance course</h6>
                                    @if($data->status=="Closed")

                                        <div class="heading-elements">
                                            <ul class="list-inline list-inline-separate heading-text">
                                                <li></li>
                                                <li>
                                                    <div dir="ltr">

                                                        <label style="padding-left: 10px" class="control-label no-margin text-semibold">
                                                            Rating:{{ $data->sumRating }}
                                                        </label>&nbsp;
                                                        <div class="pull-right">

                                                            @for($i=0; $i<5; $i++)
                                                                @if($i<$data->sumRating)
                                                                    <i class="fas fa-star d-inline-block" style="color:yellow;"></i>
                                                                @else
                                                                    <i class="fas fa-star d-inline-block"></i>
                                                            @endif
                                                        @endfor


                                                        <!-- star 4 -->


                                                        </div>


                                                    </div>

                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $data->averageRating }}" data-size="xs" disabled="">

                                <ul class="nav nav-lg nav-tabs nav-tabs-bottom nav-tabs-toolbar no-margin">
                                    <li class="active"><a href="#course-overview" data-toggle="tab"><i class="icon-menu7 position-left"></i> Overview</a></li>

                                </ul>
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"> Courses</h5>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="collapse"></a></li>
                                                <li><a data-action="reload"></a></li>
                                                <li><a data-action="close"></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        The <code>Courses</code> is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table. DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function. Searching, ordering, paging etc goodness will be immediately added to the table, as shown in this example. <strong>Datatables support all available table styling.</strong>
                                    </div>

                                    <table class="table datatable-basic">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>City</th>
                                            <th>bug_name</th>
                                            <th>fault side</th>
                                            <th>causes glitch</th>
                                            <th>Bug tool</th>
                                            <th>causes name</th>
                                            <th>bug_desc</th>



                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>

                                            <td>{{$data->id}}</td>
                                            <td>{{$data->city->name}}</td>
                                            <td>{{$data->bug_name}}</td>
                                            <td>{{$data->fault_side->name}}</td>
                                            <td>{{$data->causes_glitch->causes}}</td>
                                            <td>{{$data->Bug_tool}}</td>
                                            <td>{{$data->causes_name}}</td>

                                            <td>{{$data->bug_desc}}</td>










                                        </tr>


                                        </tbody>
                                    </table>

                                </div>


                            </div>
                            <!-- /course overview -->


                            <!-- About author -->

                            <!-- /about author -->


                            <!-- Comments -->
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title text-semiold">Discussion</h6>
                                    <div class="heading-elements">
                                        <ul class="list-inline list-inline-separate heading-text text-muted">
                                            <li>{{$data->comment->count()}} comments</li>
                                            <li>{{$data->views}} pending review</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <ul class="media-list content-group-lg stack-media-on-mobile">
                                        <li class="media">


                                        </li>
                                        @foreach($data->comment as $comment)

                                            <li class="media">

                                                <div class="media-body">
                                                    <div class="media-heading">
                                                        <a href="#" class="text-semibold">{{ $comment->name }}</a>
                                                        <span class="media-annotation dotted">{{$comment->created_at->diffForhumans()}}</span>
                                                    </div>

                                                    <p>{{ $comment->body }}</p>

                                                    <ul class="list-inline list-inline-separate text-size-small">
                                                        <li> <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                                        <li><a onclick="replay('replay-form-{{$comment->id}}')" style="cursor: pointer;"  class="reply">Reply</a>&nbsp;</li>
                                                        <li><a onclick="replay('edit-form-{{$comment->id}}')" >edit</a>&nbsp;</li>
                                                        <li><a href="{{route('comments.destroy',$comment->id)}}" style="cursor: pointer;"  class="delete-comment" token="{{ csrf_token() }}" comment-did="{{ $comment->id }}" >Delete</a>
                                                        </li>


                                                        <div class="reply-form" id="replay-form-{{$comment->id}}" style="display:none;">
                                                            <form method="POST" action="{{route('replay.store')}}">
                                                                @csrf
                                                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                                <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" name="reply" placeholder="Enter your reply"> </textarea>
                                                                    <input class="btn btn-primary" type="submit" value="Replay">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="replay-form" id="edit-form-{{$comment->id}}" style="display: none">

                                                            <form method="post" action="{{route('comments.update',$comment->id)}}">
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



                                            @foreach($comment->replies as $rep)

                                                <li class="media">

                                                    @if($comment->id === $rep->comment_id)
                                                        <div class="well">
                                                            <i><b> {{ $rep->name }} </b></i>&nbsp;&nbsp;
                                                            <span> {{ $rep->reply }} </span>
                                                            <div style="margin-left:10px;">
                                                                <a onclick="replay('reply-to-reply-form-{{$rep->id}}')" >edit</a>&nbsp;
                                                                <a href="{{route('replay.delete',$rep->id)}}"  class="delete-reply">Delete</a>
                                                            </div>
                                                            <div class="reply-to-reply-form" id="reply-to-reply-form-{{$rep->id}}" style="display: none">

                                                                <form method="post" action="{{route('replay.show',$rep->id)}}">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" name="reply" placeholder="Enter your reply"></textarea>
                                                                    </div>
                                                                    <div class="form-group"> <input class="btn btn-primary" type="submit" id="submit" value="Edit your comment"> </div>
                                                                </form>

                                                            </div>

                                                        </div>
                                                    @endif

                                                </li>
                                                @endforeach

                                                </li>
                                            @endforeach



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
                                            <form id="comment-form" method="post" action="{{ route('comments.store') }}" >
                                                {{ csrf_field() }}
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >

                                                <input type="hidden" name="imbalance_id" value="{{ $data->id }}" >

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

                                <!-- Course details -->
                                <div class="sidebar-category">
                                    <div class="category-title">
                                        <span>Course details</span>
                                        <ul class="icons-list">
                                            <li><a href="#" data-action="collapse"></a></li>
                                        </ul>
                                    </div>

                                    <div class="category-content">
                                        <a href="{{route('All',auth()->user()->id)}}" class="btn bg-teal-400 btn-block content-group">My Imbalances</a>
                                        <a href="{{route('imbalances.index')}}" class="btn bg-teal-400 btn-block content-group">Back</a>








                                        <div class="form-group" style="">
                                            <label class="control-label no-margin text-semibold">Time:</label>
                                            <div class="pull-right">{{$data->created_at->diffForhumans()}}</div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label no-margin text-semibold">status:</label>
                                            <div class="pull-right">{{$data->status}}</div>
                                        </div>

                                        @if($data->status=="Closed")
                                            @if($data->sumRating==0)

                                                <div class="form-group" id="rate_div" >
                                                    <form action="{{route('rate.store')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$data->id}}">
                                                        <label class="control-label no-margin text-semibold">
                                                            <span >Rate</span>
                                                        </label>
                                                        <div class="pull-right">

                                                            <input type="radio" id="5-star-rating" name="rating" value="5" onclick="replay('show_comment')">
                                                            <label for="5-star-rating" class="star-rating">
                                                                <i class="fas fa-star d-inline-block"></i>
                                                            </label>


                                                            <!-- star 4 -->
                                                            <input type="radio" id="4-star-rating" name="rating" value="4" onclick="replay('show_comment')">
                                                            <label for="4-star-rating" class="star-rating star">
                                                                <i class="fas fa-star d-inline-block"></i>
                                                            </label>

                                                            <!-- star 3 -->
                                                            <input type="radio" id="3-star-rating" name="rating" value="3" onclick="replay('show_comment')">
                                                            <label for="3-star-rating" class="star-rating star">
                                                                <i class="fas fa-star d-inline-block"></i>
                                                            </label>

                                                            <!-- star 2 -->
                                                            <input type="radio" id="2-star-rating" name="rating" value="2" onclick="replay('show_comment')">
                                                            <label for="2-star-rating" class="star-rating star">
                                                                <i class="fas fa-star d-inline-block"></i>
                                                            </label>

                                                            <!-- star 1 -->
                                                            <input type="radio" id="1-star-rating" name="rating" value="1" onclick="replay('show_comment')">
                                                            <label for="1-star-rating" class="star-rating star">
                                                                <i class="fas fa-star d-inline-block"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-group" style="display: none" id="show_comment">
                                                            <textarea class="form-control" name="comment" placeholder="Enter your reply"></textarea>
                                                            <div class="form-group"> <input class="btn btn-primary" type="submit" onclick="display()" value="Send"> </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            @endif
                                        @endif





                                    </div>
                                </div>

                                <!-- /course details -->


                                <!-- Categories -->

                                <!-- /categories -->


                                <!-- Attendees -->
                                <div class="sidebar-category">
                                    <div class="category-title">
                                        <span>Latest attendees</span>
                                    </div>


                                    <div class="category-content no-padding">
                                        @foreach($data->attachment as $attachs)
                                            <iframe src="https://drive.google.com/file/d/{{$attachs->file}}/preview" width="220" height="500" allow="autoplay"></iframe>
                                        @endforeach
                                    </div>



                                </div>
                                <!-- /attendees -->


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

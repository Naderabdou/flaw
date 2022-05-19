@extends('dashboard.layout.Master')
@section('js')


    <!-- Theme JS files -->
    <script src="/admin/global_assets/js/demo_pages/chat_layouts.js"></script>

    <!-- /theme JS files -->
@endsection
@section('content')
    <body class="sidebar-xs">

    <!-- Main navbar -->
    <!-- /main navbar -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">




            <!-- Secondary sidebar -->
            <div class="sidebar sidebar-secondary sidebar-default">
                <div class="sidebar-content">








                    <!-- Online users -->
                    <div class="sidebar-category">
                        <div class="category-title">
                            <span>Online users</span>
                            <ul class="icons-list">
                                <li><a href="#" data-action="collapse"></a></li>
                            </ul>
                        </div>

                        <div class="category-content no-padding">
                            <ul class="media-list media-list-linked" id="online-users">


                            </ul>
                            <ul id="no-online-users">
                                <h4 style="text-align: center; color: red; padding-left: 20px" >No online users</h4>

                            </ul>
                        </div>
                    </div>
                    <!-- /online users -->


                </div>
            </div>
            <!-- /secondary sidebar -->


            <!-- Main content -->
            <div class="content-wrapper">




                <!-- Content area -->
                <div class="content">

                    <!-- Inside tabs -->




                    <!-- Color options -->
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            <ul class="media-list chat-list content-group" id="send-chat">
                           @foreach($messages as $message)
                                    <li class=" {{auth()->user()->id == $message->user_id ? 'media': 'media reversed'}} " >
                                        <div class="media-body container">
                                            <div class="media-content {{auth()->user()->id == $message->user_id ? 'bg-slate': ' bg-info'}}">
                                                {{$message->body}}</div>
                                            <span class="media-annotation display-block mt-10">{{$message->created_at->diffForhumans()}}<a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                                        </div>

                                    </li>
                                @endforeach

                            </ul>


                            <textarea name="" data-url="{{route('send')}}" class="form-control content-group" rows="3" cols="1" placeholder="Enter your message..."  id="chat-text"> </textarea>

                            <div class="row">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-left13 position-right"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /color options -->


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

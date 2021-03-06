
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="user_id" content="{{ auth()->user()->id }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="time" content="{{now()}}">


    <title>Limitless - @yield('title')</title>

    <!-- Global stylesheets -->
    <link href="/Admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/Admin/assets/css/core.min.css" rel="stylesheet" type="text/css">
    <link href="/Admin/assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="/Admin/assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/Admin/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">


    <!-- /global stylesheets -->
@yield('css')
    <!-- Core JS files -->
    <script src="/Admin/global_assets/js/plugins/loaders/pace.min.js"></script>
    <script src="/Admin/global_assets/js/core/libraries/jquery.min.js"></script>
    <script src="/Admin/global_assets/js/core/libraries/bootstrap.min.js"></script>
    <script src="/Admin/global_assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->
    <!-- Theme JS files -->
    <script src="/Admin/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script src="/Admin/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script src="/Admin/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script src="/Admin/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script src="/Admin/global_assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="/Admin/global_assets/js/plugins/pickers/daterangepicker.js"></script>

    <script src="/Admin/global_assets/js/demo_pages/dashboard.js"></script>
    <script src="/Admin/assets/js/app.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>





@yield('js')


    <!-- /theme JS files -->



</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="/Admin/global_assets/images/logo_light.png" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-git-compare"></i>
                    <span class="visible-xs-inline-block position-right">Git updates</span>
                    <span class="badge bg-warning-400">9</span>
                </a>

                <div class="dropdown-menu dropdown-content">
                    <div class="dropdown-content-heading">
                        Git updates
                        <ul class="icons-list">
                            <li><a href="#"><i class="icon-sync"></i></a></li>
                        </ul>
                    </div>

                    <ul class="media-list dropdown-content-body width-350">
                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
                            </div>

                            <div class="media-body">
                                Drop the IE <a href="#">specific hacks</a> for temporal inputs
                                <div class="media-annotation">4 minutes ago</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-commit"></i></a>
                            </div>

                            <div class="media-body">
                                Add full font overrides for popovers and tooltips
                                <div class="media-annotation">36 minutes ago</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-branch"></i></a>
                            </div>

                            <div class="media-body">
                                <a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch
                                <div class="media-annotation">2 hours ago</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-merge"></i></a>
                            </div>

                            <div class="media-body">
                                <a href="#">Eugene Kopyov</a> merged <span class="text-semibold">Master</span> and <span class="text-semibold">Dev</span> branches
                                <div class="media-annotation">Dec 18, 18:36</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
                            </div>

                            <div class="media-body">
                                Have Carousel ignore keyboard events
                                <div class="media-annotation">Dec 12, 05:46</div>
                            </div>
                        </li>
                    </ul>

                    <div class="dropdown-content-footer">
                        <a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li>
        </ul>

        <p class="navbar-text"><span class="label bg-success">Online</span></p>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown language-switch">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="/Admin/global_assets/images/flags/gb.png" class="position-left" alt="">
                    English
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li><a class="deutsch"><img src="/Admin/global_assets/images/flags/de.png" alt=""> Deutsch</a></li>
                    <li><a class="ukrainian"><img src="/Admin/global_assets/images/flags/ua.png" alt=""> ????????????????????</a></li>
                    <li><a class="english"><img src="/Admin/global_assets/images/flags/gb.png" alt=""> English</a></li>
                    <li><a class="espana"><img src="/Admin/global_assets/images/flags/es.png" alt=""> Espa??a</a></li>
                    <li><a class="russian"><img src="/Admin/global_assets/images/flags/ru.png" alt=""> ??????????????</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-bubbles4"></i>
                    <span class="visible-xs-inline-block position-right">Messages</span>
                    <span class="badge bg-warning-400">
                    <span id="notifications_count">

                        {{ auth()->user()->unreadNotifications->count() }}

                   </span>
                    </span>

                </a>

                <div class="dropdown-menu dropdown-content width-350">
                    <div class="dropdown-content-heading">
                        Messages
                        <ul class="icons-list">
                            <li><a href=""><i class="icon-compose"> Mark all Read</i></a></li>
                        </ul>
                    </div>
                    <span id="unreadNotifications">
                        <ul class="media-list dropdown-content-body" id="list-notify">
                    @foreach(auth()->user()->unreadNotifications as $notification)
                                  @isset($notification->data['admin'])

                                <li class="media">


                            <div class="media-body">
                                <a href="{{route('data',$notification->data['id'])}}" class="media-heading">
                                    <span class="text-semibold"> Admin: {{ $notification->data['admin'] }}</span><br>
                                    <span class="text-semibold"> Name Imbalance : {{ $notification->data['name_imbalance'] }}</span>
                                    <span class="media-annotation pull-right"> Time: {{ $notification->created_at->diffForhumans() }}</span>
                                </a>

                                <span class="text-muted">Status: {{ $notification->data['status'] }}</span>
                            </div>

                        </li>
                                @elseif($notification->data['user'])

                                      <li class="media">


                            <div class="media-body">
                                <a href="{{route('All',$notification->data['user_id'])}}" class="media-heading">
                                    <span class="text-semibold"> user: {{ $notification->data['user'] }}</span><br>
                                    <span class="text-semibold"> Name Imbalance : {{ $notification->data['name_bug'] }}</span>
                                    <span class="media-annotation pull-right"> Time: {{ $notification->created_at->diffForhumans() }}</span>
                                </a>

                                <span class="text-muted">Status: {{ $notification->data['statues'] }}</span>
                            </div>

                        </li>

                                @endisset



                        @endforeach
                        </ul>

                    </span>
                    <div class="dropdown-content-footer">
                        <a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li>





            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="/Admin/global_assets/images/placeholders/placeholder.jpg" alt="">
                    <span>Victoria</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href=""><i class="icon-user-plus"></i> My profile</a></li>
                    <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                    <li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>

                        <li>

                            <a href="{{route('logout')}}"><i class="icon-switch2"></i> Logout</a>

                        </li>


                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main">
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-user">
                    <div class="category-content">
                        <div class="media">
                            <a href="#" class="media-left"><img src="/Admin/global_assets/images/placeholders/placeholder.jpg" class="img-circle img-sm" alt=""></a>
                            <div class="media-body">
                                <span class="media-heading text-semibold">Victoria Baker</span>
                                <div class="text-size-mini text-muted">
                                    <i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
                                </div>
                            </div>

                            <div class="media-right media-middle">
                                <ul class="icons-list">
                                    <li>
                                        <a href="#"><i class="icon-cog3"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">

                            <!-- Main -->
                            <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                            <li class=""><a href="{{route('admin')}}"><i class="icon-home4"></i> <span>Home</span></a></li>
                            @if(auth()->user()->role=='admin')

                            <li class=""><a href="{{route('splash.index')}}"><i class="icon-ipad "></i> <span>Splash</span></a></li>
                            <li class=""><a href="{{route('city.index')}}"><i class="icon-city "></i> <span>City</span></a></li>

                            <li class=""><a href="{{route('Fault_side.index')}}"><i class="icon-furniture "></i> <span>Fault_side</span></a></li>
                            <li class=""><a href="{{route('Causes_glitch.index')}}"><i class="icon-person "></i> <span>Causes_glitch</span></a></li>
                            @endif

                            <li>
                                <a href=""><i class="icon-warning"></i> <span>imbalances</span></a>
                                <ul>
                                    <li><a href="{{route('All',auth()->user()->id)}}">Show All My imbalances</a></li>
                                    <li><a href="{{route('imbalances.index')}}">Show All imbalances</a></li>



                                    <li><a href="{{route('imbalances.create')}}">Add New imbalances</a></li>
                                </ul>
                            </li>

                            <li class=""><a href="{{route('blog.index')}}"><i class="icon-blog "></i> <span>blog</span></a></li>
                            <li class=""><a href="{{route('message.index')}}"><i class="icon-chart "></i> <span>Message</span></a></li>






                            <!-- /page kits -->

                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header page-header-default">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">@yield('text')</span> - Dashboard</h4>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
                        </div>
                    </div>
                </div>

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="index.html"><i class="icon-home2 position-left"></i> @yield('name')</a></li>
                        <li class="active">Dashboard</li>
                    </ul>

                    <ul class="breadcrumb-elements">
                        <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-gear position-left"></i>
                                Settings
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                                <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                                <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

            @yield('content')


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
</html>



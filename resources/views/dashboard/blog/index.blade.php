@extends('dashboard.layout.Master')
@section('js')
    <!-- Core JS files -->

    <!-- Theme JS files -->
    <script src="/admin/global_assets/js/plugins/editors/ckeditor/ckeditor.js"></script>
    <script src="/admin/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="/admin/global_assets/js/demo_pages/editor_ckeditor_rtl.js"></script>
@endsection

@section('content')
    @if(auth()->user()->role=='admin')
    <div style="margin: 10px; ">
        <button style="border-radius: 50px" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">create new Blog  <i class="icon-plus2"></i></button>

    </div>



    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        {!! Form::open(['route' => 'blog.store' , 'method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}

        @csrf

        @include('dashboard.blog.form')

        {!! Form::close() !!}

    </div>
    @endif
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

                    <!-- Post grid -->

                    <div class="row">
                        <div class="col-md-12">
                            @foreach($blog as $blogs)
                            <div class="panel panel-flat">
                                <div class="panel-body">
                                    <div class="thumb content-group">
                                        <img src="/storage/{{$blogs->file}}" alt="" class="img-responsive" style="width: 100px; height: 100px" s>
                                    </div>

                                    <h5 class="text-semibold mb-5">
                                        <a href="#" class="text-default">{{$blogs->name_blog}}</a>
                                    </h5>

                                    <ul class="list-inline list-inline-separate text-muted content-group">
                                        <li>By <a href="#" class="text-muted">{{$blogs->name}}</a></li>
                                        <li>{{$blogs->created_at->diffForhumans()}}</li>
                                    </ul>

                                  {{$blogs->desc_blog}}

                                </div>

                                <div class="panel-footer panel-footer-condensed">
                                    <div class="heading-elements not-collapsible">
                                        <ul class="list-inline list-inline-separate heading-text text-muted">
                                            <li><a href="#" class="text-muted"><i class="icon-heart6 text-size-base text-pink position-left"></i> </a></li>
                                        </ul>
                                        @if(auth()->user()->role=='admin')
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>

                                                    <ul class="dropdown-menu dropdown-menu-left pull-right">
                                                        <li><a href="{{route('blog.edit',$blogs->id)}}" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"class="btn btn-danger"style="width:100px ;">Edit <i class="icon-database-edit2"></i></button>  </a></li>

                                                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button type="button"class="btn btn-primary"style="width:100px ;" data-toggle="modal" data-target="#edit{{$blogs->id}}"> Edit <i class="icon-database-edit2"></i></button></li>
                                                        <li><a href="{{route('blog.destroy',$blogs->id)}}" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"class="btn btn-danger"style="width:100px ;">Delete <i class="icon-box-remove"></i></button>  </a></li>


                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                        <div id="edit{{$blogs->id}}" class="modal fade" role="dialog">
                                            {!! Form::model($blogs, ['route' => ['blog.update', $blogs->id],'class'=>'form-horizontal','method'=>'PATCH','enctype'=>'multipart/form-data','file'=>true]) !!}

                                            @csrf

                                            @include('dashboard.blog.form')

                                            {!! Form::close() !!}

                                        </div>
                                        @endif


                                        <a href="{{route('read_more',$blogs->id)}}" class="heading-text pull-right">Read more <i class="icon-arrow-left13 position-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>





                    </div>
                    <!-- /content area -->

                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->
    </div>

@endsection

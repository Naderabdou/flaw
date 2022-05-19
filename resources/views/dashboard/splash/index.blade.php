@extends('dashboard.layout.Master')
@section('title')
    Splash
@endsection
@section('js')
    <!-- Theme JS files -->
    <script src="/admin/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="/admin/global_assets/js/plugins/forms/selects/select2.min.js"></script>

    <script src="/admin/global_assets/js/demo_pages/datatables_basic.js"></script>
    <!-- /theme JS files -->
@endsection

@section('content')
    <!-- Trigger the modal with a button -->

            <div style="margin: 10px; ">
                 <button style="border-radius: 50px" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">create new splash  <i class="icon-plus2"></i></button>

            </div>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        {!! Form::open(['route' => 'splash.store' , 'method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}

        @csrf

           @include('dashboard.splash.form')

        {!! Form::close() !!}

    </div>


    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"> Splash</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>



        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>Id</th>
                <th>Icon</th>
                <th>Description</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i=0
            @endphp
@foreach($splashs as $splash)
                <tr>


                    <td>{{++$i}}</td>
                    <td><img src="storage/{{$splash->icon}}" style="height: 100px; width: 100px;"></td>
                    <td>{{$splash->desc}}</td>
                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">

                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button type="button"class="btn btn-danger"style="width:100px ;" data-toggle="modal" data-target="#edit{{$splash->id}}"> Edit <i class="icon-database-edit2"></i></button></li>
                                    <li><a href="{{route('splash.destroy',$splash->id )}}" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"class="btn btn-danger"style="width:100px ;">Delete</button>  </a></li>

                                </ul>
                            </li>
                        </ul>
                    </td>

                </tr>
                <div id="edit{{$splash->id}}" class="modal fade" role="dialog">
                    {!! Form::model($splash, ['route' => ['splash.update', $splash->id],'class'=>'form-horizontal','method'=>'PATCH','enctype'=>'multipart/form-data','file'=>true]) !!}

                    @csrf

                    @include('dashboard.splash.form')

                    {!! Form::close() !!}

                </div>
@endforeach


            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->
@endsection

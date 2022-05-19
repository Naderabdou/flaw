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
                 <button style="border-radius: 50px" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"> Create new City  <i class="icon-plus2"></i></button>

            </div>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        {!! Form::open(['route' => 'city.store' , 'method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}

        @csrf

           @include('dashboard.city.form')

        {!! Form::close() !!}

    </div>


    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"> City</h5>
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
                <th>name</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i=0
            @endphp
@foreach($City as $Citys)
                <tr>


                    <td>{{++$i}}</td>
                    <td>{{$Citys->name}}</td>
                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">

                                    <li><a href="{{route('city.destroy',$Citys->id )}}" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"class="btn btn-danger"style="width:100px ;">Delete</button>  </a></li>

                                </ul>
                            </li>
                        </ul>
                    </td>

                </tr>

@endforeach


            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->
@endsection

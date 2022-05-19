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

@section('content')

    <!-- Basic datatable -->

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"> imbalances</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            The <code>imbalances</code> is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table. DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function. Searching, ordering, paging etc goodness will be immediately added to the table, as shown in this example. <strong>Datatables support all available table styling.</strong>
        </div>

        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>ID</th>
                <th>imbalance name</th>
                <th>imbalances time</th>
                <th>City</th>
                <th>Fault side</th>
                <th>causes Glitch</th>
                <th>Status</th>
                @if(auth()->user()->role=='admin')
                <th>change Status</th>
                @endif
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody style="text-align: center">
@foreach($data as $userdata)

                <tr>

                    <th>{{$userdata->id}}</th>
                    <th>{{$userdata->bug_name}}</th>
                    <th>{{$userdata->created_at->diffForhumans()}}</th>
                    <th>{{$userdata->city->name}}</th>
                    <th>{{$userdata->fault_side->name}}</th>
                    <th>{{$userdata->causes_glitch->causes}}</th>
                    <th>
                        @if($userdata->status=='good')
                     <button type="button" class="btn btn-primary">{{$userdata->status}}</button>
                        @endif
                        @if($userdata->status=='Under_review')
                                <button type="button" class="btn btn-warning">{{$userdata->status}}</button>
                            @endif
                            @if($userdata->status=='Previewed')
                                <button type="button" class="btn btn-danger">{{$userdata->status}}</button>
                            @endif
                            @if($userdata->status=='Closed')
                                <button type="button" class="btn btn-success">{{$userdata->status}}</button>
                            @endif
                   </th>
                    @if(auth()->user()->role=='admin')
                        <td>
                            <form action="{{route('status',$userdata->id)}}" method="POST" id="From-Status-{{$userdata-> id}}" >
                                @csrf
                                <input type="hidden" name="id" value="{{$userdata-> id}}" />
                                <select class="form-select" aria-label="Default select example" onchange="this.form.submit()" name="status">
                                    <option value="good"{{$userdata->status == 'good' ? 'disabled selected' : ''}} >Good</option>
                                    <option value="Under_review" {{$userdata->status == 'Under_review' ? 'disabled selected' : ''}} >Under Review</option>
                                    <option value="Previewed" {{$userdata->status == 'Previewed' ? 'disabled selected' : ''}} >Previewed</option>
                                    <option value="Closed" {{$userdata->status == 'Closed' ? 'disabled selected' : ''}}>Closed</option>
                                </select>

                                <br>

                            </form>

                        </td>
                    @endif



                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{route('data',$userdata->id)}}" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"class="btn btn-warning"style="width:100px ;">more details</button>  </a></li>
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button type="button"class="btn btn-danger"style="width:100px ;" data-toggle="modal" data-target="#edit{{$userdata->id}}"> Edit <i class="icon-database-edit2"></i></button></li>
                                    <li><a href="{{route('imbalances.destroy',$userdata->id)}}" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"class="btn btn-danger"style="width:100px ;">Delete</button>  </a></li>


                                </ul>
                            </li>
                        </ul>
                    </td>

                </tr>
                 <div id="edit{{$userdata->id}}" class="modal fade" role="dialog">
                    {!! Form::model($userdata, ['route' => ['imbalances.update', $userdata->id],'class'=>'form-horizontal','method'=>'PATCH','enctype'=>'multipart/form-data','file'=>true]) !!}

                    @csrf

                    @include('dashboard.imbalances.form')



                     {!! Form::close() !!}

                </div>



@endforeach
            </tbody>
        </table>

    </div>
    <!-- /basic datatable -->



    <!-- Modal -->



@endsection

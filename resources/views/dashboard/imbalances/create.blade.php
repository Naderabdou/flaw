@extends('dashboard.layout.Master')

@section('title')
    create courses
@endsection
@section('js')
    <script src="/admin/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script src="/admin/global_assets/js/demo_pages/form_inputs.js"></script>
@endsection


@section('content')


    <div class="panel panel-flat">
        <div class="panel-heading">
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">


            {!! Form::open(['route' =>'imbalances.store', 'method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <fieldset class="content-group">
                <legend class="text-bold">create new course</legend>
                @csrf
                @include('dashboard.imbalances.formcreate')


            </fieldset>


            {!! Form::close() !!}
        </div>
    </div>

@endsection

@extends('dashboard.main')

@section('main-content')
        <!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('/home')}}">Home</a></li>
        <li class=""><a href="{{url('users')}}">Usuarios</a></li>
        <li class="active">Editar Usuarios</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Edición <small> de Usuarios</small></h1>
    <!-- end page-header -->

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title">Mantenedor Usarios</h4>
        </div>
        @include('alerts.success')
        @include('alerts.errors')
        <div class="panel-body">

            <form action="{{$formAction}}" enctype="multipart/form-data" method="post">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>
                            Nombre de Usuario
                        </label>
                        <input class="form-control" name="name" type="text" value="@if($user->name){{ltrim($user->name)}} @endif">
                        </input>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>
                            Email
                        </label>
                        <input class="form-control" name="email" type="email" value="@if($user->email){{ltrim($user->email)}} @endif">
                        </input>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Roles</label>
                        <select class="form-control" name="role[]" multiple="multiple" multiple data-placeholder="Roles ...">
                            @if(isset($roles))
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @foreach($rolUser as $row) @if($row->role_id == $role->id )selected="selected" @endif @endforeach>{{ $role->display_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="col-sm-12 ">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <input name="_action" type="hidden" value="editar">
                    <button class="btn btn-default waves-effect waves-light" id="enviar" type="submit">
                        Enviar
                    </button>
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

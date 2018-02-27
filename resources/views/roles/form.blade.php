@extends('dashboard.main')

@section('main-content')

        <!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('/home')}}">Home</a></li>
        <li><a href="{{url('/roles')}}">Roles</a></li>
        <li class="active">Editar Roles</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Mantenedor <small>Roles</small></h1>
    <!-- end page-header -->

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title">Mantenedor Roles/ @if($role->name)Editar Rol @else Crear Nuevo Rol @endif</h4>
        </div>
        @include('alerts.success')
        @include('alerts.errors')
        <div class="panel-body">
            <div class="row">
                <form action="{{$formAction}}" enctype="multipart/form-data" method="post">
                    <input class="form-control" name="name" type="hidden" value="{{rtrim($role->name)}}" >
                    @if(!$role->name)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>
                                    Nombre
                                </label>
                                <input class="form-control" name="name" type="text" value="@if($role->name){{rtrim($role->name)}} @endif" @if($role->name) disabled @endif required>
                                </input>
                            </div>
                        </div>
                    @endif

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                Nombre a Mostrar
                            </label>
                            <input class="form-control" name="display_name" type="text" value="@if($role->display_name){{ $role->display_name }} @endif" required>
                            </input>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                Descripción
                            </label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10" required>@if($role->description){{ $role->description}}@endif</textarea>
                        </div>
                    </div>
                    <!-- Permisos -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                Permisos
                            </label>
                            <select  class="form-control" id="select-permisos" name="permission[]" multiple="multiple" multiple required>
                                @if(isset($permission))
                                    @foreach($permission as $permiso)
                                        <option value="{{ $permiso->id }}" @if(isset($permissionRole)) @foreach($permissionRole as $row) @if($row->permission_id == $permiso->id )selected="selected" @endif @endforeach @endif required>{{ $permiso->display_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        @if($role->name)
                            <input type="hidden" value="editar" name="_action">
                        @else
                            <input type="hidden" value="crear" name="_action">
                        @endif
                        <button class="btn btn-default waves-effect waves-light" id="enviar" type="submit">
                            Enviar
                        </button>
                    </input>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection








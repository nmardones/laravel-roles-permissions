@extends('dashboard.main')

@section('main-content')

        <!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('/home')}}">Home</a></li>
        <li><a href="{{url('/permissions')}}">Permisos</a></li>
        <li class="active">Edición de Permisos</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Mantenedor <small>Permisos</small></h1>
    <!-- end page-header -->

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title">Mantenedor Permisos / @if($permissions->name) Ediar Permisos @else Crear Nuevo Permiso @endif </h4>
        </div>
        @include('alerts.errors')
        @include('alerts.success')
        <div class="panel-body">
            <div class="row">
                <form action="{{$formAction}}" enctype="multipart/form-data" method="post">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                Nombre
                            </label>
                            <input class="form-control" name="name" type="text" value="@if($permissions->name){{ $permissions->name }} @endif" required>
                            </input>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                Descripción
                            </label>
                            <input class="form-control" name="display_name" type="text" value="@if($permissions->display_name){{ $permissions->display_name }} @endif" required>
                            </input>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                Descripción
                            </label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10">@if($permissions->description){{ $permissions->description}}@endif</textarea>
                        </div>
                    </div>

                    <div class="col-sm-12">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    @if($permissions->name)
                        <input type="hidden" value="editar" name="_action">
                    @else
                        <input type="hidden" value="crear" name="_action">
                    @endif
                    <button class="btn btn-default waves-effect waves-light" id="enviar" type="submit">
                        Enviar
                    </button>
                </div>

                </form>

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

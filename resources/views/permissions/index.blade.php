@extends('dashboard.main')

@section('main-content')

        <!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('/home')}}">Home</a></li>
        <li class="active">Permisos</li>
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
            <h4 class="panel-title">Mantenedor Permisos</h4>
        </div>
        <div class="panel-body">
            <div class="row">

                @include('alerts.success')

                @include('alerts.errors')
                <table class="table table-striped">
                    <div style="text-align: right; margin-right: 110px;">
                        <a href="{{url('admin/permissions/create')}}" class="btn btn-inverse btn" title="Crear Permiso" id="crear-usuario">
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </div>
                    <div class="container">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $row)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $row->display_name }}</td>
                                <td>{{ $row->description }}</td>
                                <td><a class="btn btn-xs btn-inverse" href="{{ url('admin/permissions/'.Hashids::encode($row->id).'/edit') }}" title="Editar Permisos"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                    <a class="btn btn-xs btn-inverse" href="{{ url('admin/permissions/destroy/'.Hashids::encode($row->id).'') }}" onclick='return confirm("Desea eliminar el registro?");' title="Eliminar Permiso"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </div>
                </table>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

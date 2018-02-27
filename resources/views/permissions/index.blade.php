@extends('layouts.master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Permissions
                    </div>
                    <div class="panel-body">

                    @include('layouts.errors')
                    @include('layouts.success')
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

                            <div class="panel-body">
                                <div class="row">
                                    <div style="padding-bottom: 10px;text-align: right">
                                        <a href="{{url('permissions/create')}}" class="btn btn-primary btn-xs" id="crear-usuario"><i class="glyphicon glyphicon-plus"></i></a>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover">

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
                                            <td>
                                                <a class="btn btn-xs btn-primary" href="{{ url('permissions/'.Hashids::encode($row->id).'/edit') }}" title="Editar Permisos"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                                <a class="btn btn-xs btn-danger" href="{{ url('permissions/destroy/'.Hashids::encode($row->id).'') }}" onclick='return confirm("Desea eliminar el registro?");' title="Eliminar Permiso"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

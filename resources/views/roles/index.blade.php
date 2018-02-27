@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Roles
                    </div>
                    <div class="panel-body">

                        @include('layouts.errors')
                        @include('layouts.success')
        <!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('/home')}}">Home</a></li>
        <li class="active">Roles</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Mantenedor <small>Roles</small></h1>
    <!-- end page-header -->

    <div class="panel-body">
        <div class="row">
            <div style="padding-bottom: 10px;text-align: right">
                <a href="{{url('roles/create')}}" class="btn btn-primary btn-xs" id="crear-usuario"><i class="glyphicon glyphicon-plus"></i></a>
            </div>
            <table class="table table-striped table-bordered table-hover">


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
                    @foreach($roles as $rol)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $rol->display_name }}</td>
                        <td>{{ $rol->description }}</td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="{{ url('roles/'.Hashids::encode($rol->id).'/edit') }}" title="Editar Role"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            <a class="btn btn-xs btn-danger" href="{{ url('roles/destroy/'.Hashids::encode($rol->id).'') }}" onclick='return confirm("Desea eliminar el registro?");' title="Eliminar Usuario"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
            </div>
        </div>
    </div>
@endsection




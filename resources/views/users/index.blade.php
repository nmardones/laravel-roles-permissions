@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <!-- begin #content -->
            <div id="content" class="content">
                <!-- begin modal favoritos-->
                <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3>Usuarios Favoritos</h3>
                            </div>
                            <div class="modal-body">
                            <table class="table table-striped table-bordered ">
                                <thead>
                                    <th>#</th>
                                    <th>Nombres</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>
                                            @foreach($users as $user)
                                                {!! $user->name !!}<br>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="modal-footer">
                                <a href="#" data-dismiss="modal" class="btn btn-xs btn-inverse">Salir</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal -->
                <div class="col-md-12">
                <div class="panel panel-default">
                    @include('users.delete')
                    <div class="panel-heading">
                        Usuarios
                    </div>
                    <div class="panel-body">

                    @include('layouts.errors')
                    @include('layouts.success')

                    <!-- begin #content -->
                        <div id="content" class="content">
                            <!-- begin breadcrumb -->
                            <ol class="breadcrumb pull-right">
                                <li><a href="{{url('/home')}}">Home</a></li>
                                <li class="active">Usuarios</li>
                            </ol>
                            <!-- end breadcrumb -->
                            <!-- begin page-header -->
                            <h1 class="page-header">Mantenedor <small>Usuarios</small></h1>
                            <!-- end page-header -->

                            <div style="padding-bottom: 15px;text-align: right">
                                <a href="{{url('users/create')}}" class="btn btn-primary" id="crear-usuario" title="Crear Usuario"><i class="glyphicon glyphicon-plus"></i></a>
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="table">
                                <thead>

                                <th>#</th>
                                <th >Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>

                                <th>Acciones</th>

                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->index  + 1}}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @foreach($user->roles as $row)
                                                @if($row->id == 3)
                                                    <li style="list-style-type:none; "> <label class="label label-default   ">{{ $row->display_name }}</label></li>
                                                @else
                                                    <li style="list-style-type:none; "> <label class="label label-success">{{ $row->display_name }}</label></li>
                                                @endif
                                            @endforeach
                                        </td>
                                        <!-- begin acciones-->
                                        <td>
                                            <!-- favotitos -->
                                            @foreach($user->roles as $row)
                                                @if($row->id == 3)
                                                    <a href="{{url('user/'.$user->id.'')}}" data-toggle="modal" data-target="#mostrarmodal" class="btn btn-xs btn-warning" title="Listado de Usuarios Favoritos">
                                                        Favoritos
                                                    </a>
                                            @endif
                                        @endforeach
                                               <!-- Editar Usuario-->
                                            <a id="editar-roles" class="btn btn-xs btn-primary" href="{{ url('users/'.Hashids::encode($user->id).'/edit') }}" title="Editar Usuario"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                            <!-- Borrar -->
                                            <a id="eliminar-usuario" class="btn btn-xs btn-danger" href="{{ url('users/destroy/'. Hashids::encode($user->id).'') }}" onclick='return confirm("Desea eliminar el registro?");' title="Eliminar Usuario"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

                                        </td>
                                        <!-- end acciones -->
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

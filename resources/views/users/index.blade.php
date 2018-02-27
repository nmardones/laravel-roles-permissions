@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Usuarios</div>

            @include('alerts.success')
            @include('alerts.errors')

            <table class="table table-striped" id="table">

                <div style="text-align: right; margin-right: 50px;padding-bottom: 20px">
                    <a href="{{url('users/create')}}" class="btn btn-inverse" title="Crear Uausrio" id="crear-usuario">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </div>
                <thead>
                    <tr>
                        <th>#</th>
                        <th >Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td scope="row">{{ $loop->index  + 1}}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $row)

                                <li style="list-style-type:none;padding-bottom: 2px; "><label for="" class="label label-primary">{{ ($row->display_name) }}</label></li>

                            @endforeach
                        </td>
                        <td>
                            <!-- Editar Usuario-->
                            <a id="editar-roles" class="btn btn-xs btn-inverse" href="{{ url('users/'.Hashids::encode($user->id).'/edit') }}" title="Editar Usuario"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            <!-- Borrar -->
                            <a id="eliminar-usuario" class="btn btn-xs btn-inverse" href="{{url('users/destroy/'.Hashids::encode($user->id).'') }}" onclick='return confirm("Desea eliminar el registro?");' title="Eliminar Usuario"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end #content -->
@endsection

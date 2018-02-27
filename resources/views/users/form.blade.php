@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Usuarios
                    </div>
                    @include('layouts.errors')
                    @include('layouts.success')
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
                        <h1 class="page-header" style="padding-left: 30px;">Edición <small> de Usuarios</small></h1>
                        <!-- end page-header -->
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
                                        <input class="form-control" name="email" type="text" value="@if($user->email){{ltrim($user->email)}} @endif">
                                        </input>
                                    </div>
                                </div>
                                <!-- Roles -->
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Roles</label>
                                    </div>
                                </div>
                                <!-- Check -->
                                <div class="col-md-5">
                                    <div class="checkbox">
                                        <label>
                                            @if(isset($roles))
                                                @foreach($roles as $role)
                                                    <input name="role[]" type="checkbox" value="{{ $role->id}}"
                                                           @foreach($rolUser as $row)
                                                           @if($row->role_id == $role->id )
                                                           checked
                                                            @endif
                                                            @endforeach
                                                    >
                                                    {!! $role->display_name !!}<br>
                                                @endforeach
                                            @endif
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 ">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <input name="_action" type="hidden" value="editar">
                                    <button class="btn btn-primary" id="enviar" type="submit">
                                        Enviar
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
@endsection

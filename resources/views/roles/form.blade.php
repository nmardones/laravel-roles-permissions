@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Roles
                    </div>

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
    <h1 style="padding-left: 20px;" class="page-header">Mantenedor <small>Roles</small></h1>
    <!-- end page-header -->

    <div class="panel panel-inverse">

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
                                <input class="form-control" name="name" type="text" value="@if($role->name){{rtrim($role->name)}} @endif" @if($role->name) disabled @endif>
                                </input>
                            </div>
                        </div>
                    @endif

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                Nombre a Mostrar
                            </label>
                            <input class="form-control" name="display_name" type="text" value="@if($role->display_name){{ $role->display_name }} @endif">
                            </input>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                Descripción
                            </label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10">@if($role->description){{ $role->description}}@endif</textarea>
                        </div>
                    </div>

                    <div class="col-sm-12">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
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








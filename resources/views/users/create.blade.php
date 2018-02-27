@extends('dashboard.main')

@section('main-content')
        <!-- begin #content -->
<div id="content" class="content" xmlns="http://www.w3.org/1999/html">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('/home')}}">Home</a></li>
        <li class=""><a href="{{url('users')}}">Usuarios</a></li>
        <li class="active">Crear Usuarios</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Mantenedor <small>Usuarios</small></h1>
    <!-- end page-header -->

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title">Crear Usuarios</h4>
        </div>

        @include('alerts.success')
        @include('alerts.errors')

        <div class="panel-body">

            <form action="{{url('admin/users')}}" enctype="multipart/form-data" method="post">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>
                            Nombre de Usuario
                        </label>
                        <input id="name" class="form-control" name="name" type="text" value="" placeholder="Nombre" required>
                        </input>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>
                            Email
                        </label>
                        <input id="email" class="form-control" name="email" type="email" value="" placeholder="Email" required>
                       </input>
                    </div>
                </div>

                <div class="col-md-12">
                        <label class="form-group">
                            Password
                        </label>
                        <input id="password" class="form-control" name="password" type="password" value="" placeholder="password" required>
                        </input>

                </div>

                <div class="col-md-12">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <input name="_action" type="hidden" value="crear">
                    <br>
                       <button class=" btn btn-default" id="enviar" type="submit">
                            Guardar
                        </button>
                    </input>
                </div>


            </form>
            </div>
        </div>
</div>

@endsection
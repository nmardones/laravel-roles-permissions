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
                            <li class="active">Crear Usuarios</li>
                        </ol>
                        <!-- end breadcrumb -->
                        <!-- begin page-header -->
                        <h1 class="page-header" style="padding-left: 30px;">Crear <small> Usuarios</small></h1>
                        <!-- end page-header -->
                        <div class="panel-body">

                <form action="{{url('users')}}" enctype="multipart/form-data" method="post">
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
                            <input id="email" class="form-control" name="email" type="text" value="" placeholder="Email" required>
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
                        <label class="form-group">
                        </label>
                    </div>
                    <!-- Begin roles -->
                    <div class="col-md-1">
                        <label class="form-group">Roles</label>
                    </div>
                    <div class="col-md-5">
                        <div class="checkbox">
                            <label>
                                @if(isset($roles))
                                    @foreach($roles as $role)
                                        <input name="role[]" type="checkbox" value="{{ $role->id}}">
                                        {!!  $role->display_name !!}<br>
                                    @endforeach
                                @endif
                            </label>
                        </div>
                    </div>
                    <!-- end roles -->
                    <div class="col-md-12">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input name="_action" type="hidden" value="crear">
                        <br>
                           <button class="btn btn-primary" id="enviar" type="submit">
                                Guardar
                            </button>
                        </input>
                    </div>


                </form>
            </div>
        </div>
</div>

@endsection
@extends('dashboard.main')

                @section('main-content')

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

                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Mantenedor Usuarios</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                @include('alerts.success')
                                @include('alerts.errors')

                                <div class="">
                                    <tr>

                                        {!! Form::model(Request::all(), ['route'=>'users.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left', 'role'=>'search', 'name'=>'form_buscar']) !!}

                                        {!! Form::text('nombre', null, ['class' => 'form-control input-sm', 'placeholder' => 'Buscar por Nombre', 'autofocus' ]) !!}

                                        <button type="submit" class="btn btn-xs btn-inverse" title="Buscar"><i class="fa fa-search"></i></button>

                                        {!! Form::close() !!}
                                    </tr>
                                </div>
                <table class="table table-striped">

                    <div style="text-align: right; margin-right: 50px;padding-bottom: 20px">
                        <a href="{{url('admin/users/create')}}" class="btn btn-inverse btn" title="Crear Uausrio" id="crear-usuario">
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

                                    <li style="list-style-type:none;padding-bottom: 2px; "><label for="" class="label-inverse label">{{ ($row->display_name) }}</label></li>

                                @endforeach
                            </td>
                            <td>
                                <!-- Editar Usuario-->
                                <a id="editar-roles" class="btn btn-xs btn-inverse" href="{{ url('admin/users/'.Hashids::encode($user->id).'/edit') }}" title="Editar Usuario"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                <!-- Reset-->
                                <a id="reset-password" class="btn btn-xs btn-inverse" href="{{url('resetpassword/'. Hashids::encode($user->id) .'/'. csrf_token() )}}" title="Reset Password"><i class="fa fa-key" aria-hidden="true"></i></a>
                                <!-- Borrar -->
                                <a id="eliminar-usuario" class="btn btn-xs btn-inverse" href="{{url('admin/users/destroy/'.Hashids::encode($user->id).'') }}" onclick='return confirm("Desea eliminar el registro?");' title="Eliminar Usuario"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <?php echo $users->appends($_GET)->render(); ?>
            </div>
        </div>
    </div>
</div>
<!-- end #content -->

@endsection

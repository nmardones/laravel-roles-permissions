@extends('layouts.app')

@section('content')

<!-- begin #content -->
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Usuarios</div>

            @include('alerts.success')
            @include('alerts.errors')

            <table class="table table-striped" id="table">
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
                        <input class="form-control" name="email" type="email" value="@if($user->email){{ltrim($user->email)}} @endif">
                        </input>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Roles</label>
                        <select class="form-control" name="role[]" multiple="multiple" multiple data-placeholder="Roles ...">
                            @if(isset($roles))
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @foreach($rolUser as $row) @if($row->role_id == $role->id )selected="selected" @endif @endforeach>{{ $role->display_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="col-sm-12 ">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <input name="_action" type="hidden" value="editar">
                    <button class="btn btn-primary" id="enviar" type="submit">
                        Enviar
                    </button>
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

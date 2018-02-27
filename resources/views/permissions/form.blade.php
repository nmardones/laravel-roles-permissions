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

                        <div class="panel-body">
            <div class="row">
                <form action="{{$formAction}}" enctype="multipart/form-data" method="post">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                Nombre
                            </label>
                            <input class="form-control" name="name" type="text" value="@if($permissions->name){{ $permissions->name }} @endif" required>
                            </input>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                Descripción
                            </label>
                            <input class="form-control" name="display_name" type="text" value="@if($permissions->display_name){{ $permissions->display_name }} @endif" required>
                            </input>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                Descripción
                            </label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10">@if($permissions->description){{ $permissions->description}}@endif</textarea>
                        </div>
                    </div>

                    <div class="col-sm-12">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    @if($permissions->name)
                        <input type="hidden" value="editar" name="_action">
                    @else
                        <input type="hidden" value="crear" name="_action">
                    @endif
                    <button class="btn btn-default waves-effect waves-light" id="enviar" type="submit">
                        Enviar
                    </button>
                </div>

                </form>

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

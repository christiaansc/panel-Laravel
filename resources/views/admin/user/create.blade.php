@extends('adminlte::page')

@section('title', '')

@section('content_header')
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Crear usuario</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/user">Usuarios</a></li>
                    <li class="breadcrumb-item active">Crear usuarios</li>
                </ol>
            </div>
        </div>
    </section>
@stop
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xl-2 order-xl-1"></div>
            <div class="col-xl-7 order-xl-1">
                <div class="card border-25 pl-2 pr-2 pt-2">

                    <div class="card-header" style="margin: 10px">
                        <h3 class="card-title-center text-center">
                            Formulario de registro de usuario
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="POST" id="formulario">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nombre:<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name"  value='{{old('name')}}'>
                                    @error('name')
                                        <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Correo electrónico: <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email"{{old('email')}} >
                                    @error('email')
                                        <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password">Contraseña:<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        autocomplete="on">
                                    @error('password')
                                        <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password_confirmed">Repita Contraseña:<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password_confirmed" name="password_confirmed"
                                        autocomplete="on">
                                    @error('password_confirmed')
                                        <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                {{-- <div class="form-group  col-md-6">
                                    <label class="form-control-label" for="role">Asignacion de Rol: <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="role" id="role">
                                        <option disabled selected>Seleccione un Rol</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <hr>
                                    <div class="text-center" id="div_submit">
                                        <button type="submit" id="btn_submit" class="btn btn-success"><i
                                                class="fa fa-save"></i> Guardar </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop



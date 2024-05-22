@extends('adminlte::page')

@section('title', 'Dashboard - category')

@section('content_header')
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Creacion de Categorías</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/category">Categoria</a></li>
                    <li class="breadcrumb-item active">crear</li>
                </ol>
            </div>
        </div>
    </section>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xl-3 order-xl-1"></div>
            <div class="col-xl-6 order-xl-1">
                <div class="card border-25 pl-2 pr-2 pt-2">
                    <div class="card-header" style="margin: 10px">
                        <h3 class="card-title-center text-center">
                            Formulario de Registro
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST" id="formulario">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">Nombre <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese nombre de Categoría...">
                                        @error('name')
                                            <small class="text-red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="status">Estado <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1"
                                                <?= isset($errores) && $errores['status'] == 1 ? 'selected' : '' ?>>Activo
                                            </option>
                                            <option value="0"
                                                <?= isset($errores) && $errores['status'] == 0 ? 'selected' : '' ?>>Inactivo
                                            </option>
                                        </select>
                                        <small id="invalid_status" class="text-danger"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="description">Descripción</label>
                                <textarea rows="3" name="description" id="description" class="form-control"
                                    placeholder="Ingrese Descripción de categoría..."></textarea>
                                <small id="invalid_description" class="text-danger"></small>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <hr>
                                    <div class="text-center" id="div_submit">
                                        <a href="{{ route('category.index') }}"
                                            class="btn btn-secondary"><i class="fa fa-reply"></i> Volver</a>
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

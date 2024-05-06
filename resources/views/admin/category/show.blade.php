@extends('adminlte::page')

@section('title', '')

@section('content_header')
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/category">Categorias</a></li>
                    <li class="breadcrumb-item active">Productos</li>
                </ol>
            </div>
        </div>
    </section>
@stop



@section('content')
    <section>
        <div class="card">
            <div class="card-header d-flex align-items-center item-center">
                <h3 class="card-title-center bg-light pt-2 pb-2 d-flex ">
                    <b>
                        <i class="fas fa-list mr-2"></i>
                        Listado de Productos por categoría
                    </b>
                </h3>
            </div>
            <div class="card-body">
                @if (!$products->isEmpty())
                    <table id="dataTable" class="table datatable responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }} </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description ? $product->description : 'Sin Información' }}</td>
                                    <td>
                                        @if ($product->status === 1)
                                            <span class="badge bg-success">Activo</span>
                                        @else
                                            <span class="badge bg-danger">Desactivado</span>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                        </tfoot>
                    </table>
                @else
                    <h1 class="text-center">no hay regisrtos</h1>
                @endif
            </div>
        </div>

    </section>
@stop

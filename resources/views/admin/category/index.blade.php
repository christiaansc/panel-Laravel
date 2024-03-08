@extends('adminlte::page')

@section('title', 'Dashboard - category')

@section('content_header')
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Administracion de Categorías</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item active">categorías</li>
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
                        Listado de Categorias
                    </b>
                </h3>
                <div class="ml-auto">
                    <a class="btn btn-success btn-lg" href="{{ route('category.create') }}">Nueva Categoría</a>
                </div>
            </div>
            <div class="card-body">
                <table id="categoryTable" class="table datatable responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }} </td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description ? $category->description : 'Sin Información' }}</td>
                                <td>
                                    @if ($category->status === 1)
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Desactivado</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-principal" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <form action="{{ route('category.destroy', $category) }}" method="POST"
                                            id="deletecategory">
                                            @csrf
                                            @method('DELETE')
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item"
                                                    href="{{ route('category.edit', $category) }}">Editar</a>
                                                <button class="dropdown-item" type="submit">Eliminar</button>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </tfoot>
                </table>
            </div>
        </div>

    </section>
@stop


@section('js')
    <script>
        new DataTable('#categoryTable');
    </script>
    <script>

        toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!')

    </script>
@stop

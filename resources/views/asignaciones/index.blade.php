@extends('layouts.app')
@section('content')

    <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Asignaciones</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Asignacion</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @include('includes.alertas')
                        <div class="table-responsive mt-3">
                            @if (auth()->user()->role == 'admin')
                            <div class="text-end mb-3">
                                <a href="{{ url('/asignaciones/registrar') }}" class="btn btn-dark text-end">Nueva Asignacion</a>
                            </div>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Estudiante</th>
                                        <th>Nombre del curso</th>
                                        <th>Fecha de inicio</th>
                                        <th>Fecha de Finalizacion</th>
                                        <th>Importe</th>
                                        @if (auth()->user()->role == 'admin')
                                        <th>Estado</th>
                                        @endif

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asigs as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $item->usuario->name }}</td>
                                            <td>{{ $item->cursos->nombre }}</td>
                                            <td>{{ $item->fecha_inicio }}</td>
                                            <td>{{ $item->fecha_fin }}</td>
                                            <td>{{ $item->costo }}</td>
                                            <td>
                                                @if ($item->estado == true)
                                                    <span class="badge bg-success">Activo</span>
                                                @else
                                                    <span class="badge bg-danger">Inactivo</span>
                                                @endif
                                            </td>
                                            @if (auth()->user()->role == 'admin')
                                            <td>
                                                <a href="{{ url('/asignaciones/actualizar/' . $item->id) }}"
                                                    class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                @if ($item->estado == true)
                                                    <a href="{{ url('/asignaciones/estado/' . $item->id) }}"
                                                        class="btn btn-warning"><i class="fas fa-ban"></i></a>
                                                @else
                                                    <a href="{{ url('/asignaciones/estado/' . $item->id) }}"
                                                        class="btn btn-success"><i class="fas fa-check"></i></a>
                                                    <a href="{{ url('/asignaciones/eliminar/' . $item->id) }}"
                                                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                @endif
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $asigs->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

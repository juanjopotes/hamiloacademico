@extends('layouts.app')
@section('content')

    <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">tareas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Tareas</li>
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
                                <a href="{{ url('/tareas/registrar') }}" class="btn btn-dark text-end">Nueva Tarea</a>
                            </div>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Descripcion</th>
                                        <th>Fecha de Entrega</th>
                                        <th>Nota</th>
                                        @if (auth()->user()->role == 'admin')
                                        <th>Acciones</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tarea as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->descripcion}}</td>
                                            <td>{{ $item->entrega }}</td>
                                            @if ($item->nota == 0)
                                            <td><b>Sin calificar</b></td>
                                            @else
                                            <td>{{ $item->nota }}</td>
                                            @endif
                                            @if (auth()->user()->role == 'admin')
                                            <td>
                                                <a href="{{ url('/tareas/actualizar/' . $item->id) }}"
                                                    class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ url('/tareas/eliminar/' . $item->id) }}"
                                                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $tarea->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

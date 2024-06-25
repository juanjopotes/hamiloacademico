@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Nueva Tarea</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">tarea</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <form action="{{ url('/tareas/registrar') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card m-1">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Asignacion</label>
                                    <select class="form-control" name="asignacion_id" id="asignacion_id">
                                      <option value="">Seleccione...</option>
                                      @foreach ($asig as $asigna )
                                          <option value="{{$asigna->id}}" @if($asigna->id== old('usuarios')) selected @endif>{{$asigna->id}} ) {{$asigna->cursos->nombre}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="entrega">Fecha de Entrega</label></label>
                                            <input type="datetime-local" name="entrega" value="{{ old('entrega') }}" class="form-control">
                                            @error('fecha_fin') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="descripcion">Descripcion</label>
                                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                                            @error('entrega') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <a href="{{ url('/tareas') }}" class="btn btn-primary ">Volver al listado</a>
                                        <button type="submit" class="btn btn-success">Registrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

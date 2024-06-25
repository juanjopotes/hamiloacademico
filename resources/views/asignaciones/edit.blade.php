@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Editar Asignacion</h1>
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

        <div class="content">
            <form action="{{ url('/asignaciones/actualizar/'.$asigs->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card m-1">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Estudiante</label>
                                    <select class="form-control" name="usuarios_id" id="usuarios_id">
                                      <option value="">Seleccione...</option>
                                      @foreach ($usuario as $user )
                                          <option value="{{$user->id}}" @if($user->id== $asigs->usuarios_id) selected @endif>{{$user->name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Cursos</label>
                                    <select class="form-control text-between" name="cursos_id" id="cursos" >
                                        <option value="">Seleccione...</option>
                                        @foreach ($cursos as $cur)
                                            <option value="{{$cur->id}}" @if($cur->id == $asigs->cursos_id) selected @endif>
                                                {{$cur->nombre}} - Costo del curso: {{$cur->costo}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="fecha_inicio">Fecha de Inicio</label></label>
                                            <input type="datetime-local" name="fecha_inicio" value="{{ $asigs->fecha_inicio }}" class="form-control">
                                            @error('fecha_fin') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="fecha_fin">Fecha de Finalizacion</label></label>
                                            <input type="datetime-local" name="fecha_fin" value="{{ $asigs->fecha_fin }}" class="form-control">
                                            @error('fecha_fin') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <a href="{{ url('/asignaciones') }}" class="btn btn-primary ">Volver al listado</a>
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

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
            <form action="{{ url('/usuario/actualizar/'.$usuario->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card m-1">
                            <div class="card-body">
                                @include('includes.alertas')
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="entrega">Nombre</label></label>
                                            <input type="text" name="name" value="{{ $usuario->name }}" class="form-control">
                                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="entrega">Correo</label></label>
                                            <input type="email" name="email" value="{{ $usuario->email }}" class="form-control">
                                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                    @if(auth()->user()->role == 'admin')
                                    <div class="form-group">
                                        <label for="">Cargo</label>
                                        <select class="form-control" name="role" id="role">
                                            <option value="admin" @if($usuario->role == 'admin') selected @endif>Profesor</option>
                                            <option value="user"@if ($usuario->role == 'user') selected @endif>Estudiante</option>


                                        </select>
                                    </div>
                                    @endif
                                    @if (auth()->user()->role == 'user')
                                    <div class="text-center">
                                        <a href="{{ url('/MiUsuario') }}" class="btn btn-primary ">Volver al listado</a>
                                        <button type="submit" class="btn btn-success">Registrar</button>
                                    </div>
                                    @else
                                    <div class="text-center">
                                        <a href="{{ url('/usuario') }}" class="btn btn-primary ">Volver al listado</a>
                                        <button type="submit" class="btn btn-success">Registrar</button>
                                    </div>
                                    @endif

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

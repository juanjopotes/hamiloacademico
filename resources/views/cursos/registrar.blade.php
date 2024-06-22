@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Cursos</h1>
            </div>
        </div>
    </div>
</div>


<div class="content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">


                        <form action="{{ url('/cursos/registrar') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control">
                                    @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    <input type="file" name="imagen" value="{{ old('imagen') }}" class="form-control">
                                    @error('imagen') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="">Descripcion</label>
                                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                                  @error('imagen') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="costo">Costo</label>
                                    <input type="number" name="costo" value="{{ old('costo') }}" class="form-control">
                                    @error('costo') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="text-center">
                                    <a href="{{ url('/cursos') }}" class="btn btn-dark ">Volver al listado</a>
                                    <button type="submit" class="btn btn-secondary">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection

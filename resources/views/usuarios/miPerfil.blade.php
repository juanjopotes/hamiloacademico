@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Mi Perfil</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Mi perfil</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                <h1 class="text-center"><b>{{$usuario->name}}  (Estudiante)</b><a href="{{ url('/usuario/actualizar/'. auth()->user()->id) }}" class="btn btn-primary ms-5"><i class="fas fa-pen" aria-hidden="true"></i></a></h1>
                </div>

                <hr>

                <h3 class="mt-5">Correo Electronico: {{$usuario->email}}</h3>
            </div>
        </div>
    </div>
@endsection

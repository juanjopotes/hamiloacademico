<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\AsignacionesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//para cursos
Route::get('/cursos', [CursoController::class, 'index']);
Route::get('/cursos/registrar', [CursoController::class, 'create']);
Route::post('/cursos/registrar', [CursoController::class, 'store']);
Route::get('/cursos/actualizar/{id}', [CursoController::class, 'edit']);
Route::put('/cursos/actualizar/{id}', [CursoController::class, 'update']);
Route::get('/cursos/estado/{id}', [CursoController::class, 'estado']);
Route::get('/usuario', [UserController::class, 'index']);
Route::get('/usuario/actualizar/{id}', [UserController::class, 'edit']);
Route::put('/usuario/actualizar/{id}', [UserController::class, 'update']);
Route::get('/MiUsuario', [UserController::class, 'index']);
Route::get('/MiUsuario/actualizar/{id}', [UserController::class, 'edit']);
Route::put('/MiUsuario/actualizar/{id}', [UserController::class, 'update']);
Route::get('/asignaciones', [AsignacionesController::class, 'index']);
Route::get('/asignaciones/registrar', [AsignacionesController::class, 'create']);
Route::post('/asignaciones/registrar', [AsignacionesController::class, 'store']);
Route::get('/asignaciones/actualizar/{id}', [AsignacionesController::class, 'edit']);
Route::put('/asignaciones/actualizar/{id}', [AsignacionesController::class, 'update']);
Route::get('/asignaciones/estado/{id}', [AsignacionesController::class, 'estado']);

Route::get('/tareas', [TareasController::class, 'index']);
Route::get('/tareas/registrar', [TareasController::class, 'create']);
Route::post('/tareas/registrar', [TareasController::class, 'store']);
Route::get('/tareas/actualizar/{id}', [TareasController::class, 'edit']);
Route::put('/tareas/actualizar/{id}', [TareasController::class, 'update']);


<?php

namespace App\Http\Controllers;

use App\Models\tareas;
use App\Models\Asignaciones;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if(auth()->user()->role == 'admin'){
            $tarea = tareas::with('asignaciones')->orderBy('id','DESC')->paginate(10);
        // } else {
        //     $tarea = tareas::with('asignaciones')->where('usuarios_id', auth()->user()->id)->orderBy('id','DESC')->paginate(10);
        // }

        return view('tareas.index', compact('tarea'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asig = Asignaciones::with('cursos')->where('estado', true)->get();
        return view('tareas.registrar', compact('asig'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'asignacion_id' => 'required',
            'entrega' => 'required',
            'descripcion' => 'nullable',
            'nota' => 'nullable',
            ]);
            if(auth()->user()->role == 'admin'){
            $tareas = new Tareas();
            $tareas->asignacion_id = $request->asignacion_id;
            $tareas->entrega = $request->entrega;
            $tareas->descripcion = $request->descripcion;
            $tareas->nota = $request->nota;
            }
            else
            {
                return redirect('/tareas')->with('error', 'No tienes permisos para realizar esta accion');
            }

            if($tareas->save()){
                return redirect('/tareas')->with('success', 'registro creado exitosamente');
            } else {
                return back()->with('error', ' el registro no fue creado');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(tareas $tareas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tarea = Tareas::find($id);
        $asig = Asignaciones::where('estado', true)->get();
        return view('tareas.edit', compact('tarea', 'asig'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'asignacion_id' => 'required',
            'entrega' => 'required',
            'descripcion' => 'nullable',
            'nota' => 'nullable',
            ]);
            if(auth()->user()->role == 'admin'){
            $tareas = Tareas::find($id);
            $tareas->asignacion_id = $request->asignacion_id;
            $tareas->entrega = $request->entrega;
            $tareas->descripcion = $request->descripcion;
            $tareas->nota = $request->nota;
            }
            else
            {
                return redirect('/tareas')->with('error', 'No tienes permisos para realizar esta accion');
            }

            if($tareas->save()){
                return redirect('/tareas')->with('success', 'registro creado exitosamente');
            } else {
                return back()->with('error', ' el registro no fue creado');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tareas $tareas)
    {
        $tarea = Tareas::find($id);
        if(auth()->user()->role == 'admin'){
            if($tarea->delete()){
                return back()->with('success', 'Link eliminado exitosamente');
            }   else {
                return back()->with('error', 'El Link no pudo ser eliminado!');
            }
        }else
        return back()->with('error', 'No tiene permisos para realizar esta accion');

    }
}

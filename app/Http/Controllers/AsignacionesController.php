<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Curso;
use App\Models\Asignaciones;
use Illuminate\Http\Request;

class AsignacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->role == 'admin')
        {
            $asigs = Asignaciones::with('cursos', 'usuario')->orderBy('id','DESC')->paginate(10);
        }
        else{
            $asigs = Asignaciones::with('cursos', 'usuario')->where('usuarios_id', auth()->user()->id)->orderBy('id','DESC')->paginate(10);
        }
        return view('asignaciones.index', compact('asigs'));

    }

    public function create()
    {
        $cursos = Curso::where('estado', true)->get();
        $usuario = User::where('role', 'user')->get();
        return view('asignaciones.registrar', compact('cursos', 'usuario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'usuarios_id' => 'required',
        'cursos_id' => 'required',
        'fecha_inicio' => 'required',
        'fecha_fin' => 'required',
        ]);
        if(auth()->user()->role == 'admin'){
        $asig = new Asignaciones();
        $asig->usuarios_id = $request->usuarios_id;
        $asig->cursos_id = $request->cursos_id;
        $asig->fecha_inicio = $request->fecha_inicio;
        $asig->fecha_fin = $request->fecha_fin;
        $asig->costo = Curso::where('id', $request->cursos_id)->first()->costo;
        }
        else
        {
            return redirect('/asignaciones')->with('error', 'No tienes permisos para realizar esta accion');
        }

        if($asig->save()){
            return redirect('/asignaciones')->with('success', 'registro creado exitosamente');
        } else {
            return back()->with('error', ' el registro no fue creado');
        }
    }


    public function show(asignaciones $asignaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $asigs = Asignaciones::find($id);
        $cursos = Curso::where('estado', true)->get();
        $usuario = User::where('role', 'user')->get();
        return view('asignaciones.edit', compact('asigs', 'cursos', 'usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'usuarios_id' => 'required',
            'cursos_id' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            ]);

            if(auth()->user()->role == 'admin'){
            $asig = Asignaciones::find($id);
            $asig->usuarios_id = $request->usuarios_id;
            $asig->cursos_id = $request->cursos_id;
            $asig->fecha_inicio = $request->fecha_inicio;
            $asig->fecha_fin = $request->fecha_fin;
            $asig->costo = Curso::where('id', $request->cursos_id)->first()->costo;
            }
            else
            {
                return redirect('/asignaciones')->with('error', 'No tienes permisos para realizar esta accion');
            }

            if($asig->save()){
                return redirect('/asignaciones')->with('success', 'registro creado exitosamente');
            } else {
                return back()->with('error', ' el registro no fue creado');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(asignaciones $asignaciones)
    {
        //
    }
}

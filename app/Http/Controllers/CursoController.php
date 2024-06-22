<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::orderBy('id', 'DESC')->paginate(10);
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cursos.registrar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'imagen'=>'required|image|mimes:png,jpg,jpeg',
            'descripcion'=>'required|string|max:200',
            'costo'=>'required|numeric',
        ]);
        $imagen = $request->file('imagen');
        $nombreImagen = uniqid('cursos_') . '.png';
        if(!is_dir(public_path('/imagenes/cursos/'))){
            // mkdir(public_path('/imagenes/cursos/') , 0777);
            File::makeDirectory(public_path().'/imagenes/cursos/',0777,true);
        }
        $subido = $imagen->move(public_path().'/imagenes/cursos/', $nombreImagen);
        $curso=new Curso();
        $curso->nombre=$request->nombre;
        $curso->imagen=$nombreImagen;
        $curso->descripcion=$request->descripcion;
        $curso->costo=$request->costo;
        $curso->estado=true;
        if($curso->save()){
            return redirect('/cursos')->with('success', 'Categoría creada exitosamente');
        }else{
            return back()->with('error', 'La categoría no fue creada');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $curso = Curso::find($id);
        return view('cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'=>'required',
            'imagen'=>'required|image|mimes:png,jpg,jpeg',
            'descripcion'=>'required|string|max:200',
            'costo'=>'required|numeric',
        ]);

        $curso = Curso::find($id);
        $imagen = $request->file('imagen');
        $nombreImagen = uniqid('cursos_') . '.png';
        if(!is_dir(public_path('/imagenes/cursos/'))){
            // mkdir(public_path('/imagenes/cursos/') , 0777);
            File::makeDirectory(public_path().'/imagenes/cursos/',0777,true);
        }
        $subido = $imagen->move(public_path().'/imagenes/cursos/', $nombreImagen);
        $curso=new Curso();
        $curso->nombre=$request->nombre;
        $curso->imagen=$nombreImagen;
        $curso->descripcion=$request->descripcion;
        $curso->costo=$request->costo;
        $curso->estado= true;
        if($curso->save()){
            return redirect('/cursos')->with('success', 'Categoría creada exitosamente');
        }else{
            return back()->with('error', 'La categoría no fue creada');
        }
    }

    public function estado($id)
    {
        $curso = Curso::find($id);
        $curso->estado = !$curso->estado;
        if ($curso->save()) {
            return redirect('/cursos')->with('success', 'Estado actualizado correctamente!');
        } else {
            return back()->with('error', 'El estado no fué actualizado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        //
    }
}

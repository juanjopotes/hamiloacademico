<?php

namespace App\Http\Controllers;

use App\Models\Asignaciones;
use Illuminate\Http\Request;

class AsignacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignaciones = Asignaciones::orderBy('id','DESC')->paginate(10);
        dd($asignaciones);
        $asignaciones = Asignacions::where('usuario_id', auth()->user()->id)->get();
        return view('asignaciones.index', compact('asignaciones'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    public function show(asignaciones $asignaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(asignaciones $asignaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, asignaciones $asignaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(asignaciones $asignaciones)
    {
        //
    }
}

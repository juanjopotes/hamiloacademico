<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            $usuario = User::orderBy('id', 'DESC')->paginate(10);
            return view('usuarios.index', compact('usuario'));
        }else{
            $usuario =User::where('id', auth()->user()->id)->first();
            return view('usuarios.miPerfil', compact('usuario'));
        }


    }

    /**
     * Show the form for creating a new resource.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
        ]);
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            if(auth()->user()->role == 'admin'){
                $user->role = $request->role;
            }else{
                $user->role = 'user';
            }

            if($user->save()){
                return redirect('/usuario')->with('success', 'Usuario actualizado exitosamente');
            }
            else{
                return back()->with('error', ' el registro no fue creado');
            }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

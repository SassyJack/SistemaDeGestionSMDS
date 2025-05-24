<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Role;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::with('rol')->get();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('personas.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'id_rol' => 'required|exists:roles,id_rol'
        ]);

        Persona::create($request->all());
        return redirect()->route('personas.index')->with('success', 'Persona creada exitosamente');
    }

    public function edit(Persona $persona)
    {
        $roles = Role::all();
        return view('personas.edit', compact('persona', 'roles'));
    }

    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'id_rol' => 'required|exists:roles,id_rol'
        ]);

        $persona->update($request->all());
        return redirect()->route('personas.index')->with('success', 'Persona actualizada exitosamente');
    }
}
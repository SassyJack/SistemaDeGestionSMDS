<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    public function index()
    {
        $especialidades = Especialidad::all();
        return view('especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        return view('especialidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:200',
            'descripcion' => 'nullable|string'
        ]);

        Especialidad::create($request->all());
        return redirect()->route('especialidades.index')->with('success', 'Especialidad creada exitosamente');
    }

    public function edit(Especialidad $especialidad)
    {
        return view('especialidades.edit', compact('especialidad'));
    }

    public function update(Request $request, Especialidad $especialidad)
    {
        $request->validate([
            'nombre' => 'required|max:200',
            'descripcion' => 'nullable|string'
        ]);

        $especialidad->update($request->all());
        return redirect()->route('especialidades.index')->with('success', 'Especialidad actualizada exitosamente');
    }
}
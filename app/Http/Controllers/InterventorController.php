<?php

namespace App\Http\Controllers;

use App\Models\Interventor;
use App\Models\Especialidad;
use App\Models\Persona;
use Illuminate\Http\Request;

class InterventorController extends Controller
{
    public function index()
    {
        $interventores = Interventor::with(['especialidad', 'persona'])->get();
        return view('interventores.index', compact('interventores'));
    }

    public function create()
    {
        $especialidades = Especialidad::all();
        $personas = Persona::whereHas('rol', function($query) {
            $query->where('nombre', 'Interventor');
        })->get();
        return view('interventores.create', compact('especialidades', 'personas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_especialidad' => 'required|exists:especialidades,id_especialidad',
            'id_persona' => 'required|exists:personas,id_persona',
            'nit' => 'required|integer|min:0|max:9223372036854775807'
        ]);

        Interventor::create($request->all());
        return redirect()->route('interventores.index')
            ->with('success', 'Interventor creado exitosamente');
    }

    public function edit(Interventor $interventor)
    {
        $especialidades = Especialidad::all();
        $personas = Persona::whereHas('rol', function($query) {
            $query->where('nombre', 'Interventor');
        })->get();
        return view('interventores.edit', compact('interventor', 'especialidades', 'personas'));
    }

    public function update(Request $request, Interventor $interventor)
    {
        $request->validate([
            'id_especialidad' => 'required|exists:especialidades,id_especialidad',
            'id_persona' => 'required|exists:personas,id_persona',
            'nit' => 'required|integer|min:0|max:9223372036854775807'
        ]);

        $interventor->update($request->all());
        return redirect()->route('interventores.index')
            ->with('success', 'Interventor actualizado exitosamente');
    }
}
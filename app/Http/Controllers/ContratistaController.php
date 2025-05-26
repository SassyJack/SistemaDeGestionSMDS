<?php

namespace App\Http\Controllers;

use App\Models\Contratista;
use App\Models\Persona;
use Illuminate\Http\Request;

class ContratistaController extends Controller
{
    public function index()
    {
        $contratistas = Contratista::with('persona')->get();
        return view('contratistas.index', compact('contratistas'));
    }

    public function create()
    {
        $personas = Persona::whereHas('rol', function($query) {
            $query->where('nombre', 'Contratista');
        })->get();
        return view('contratistas.create', compact('personas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_persona' => 'required|exists:personas,id_persona',
            'razon_social' => 'required|string|max:255'
        ]);

        Contratista::create($request->all());
        return redirect()->route('contratistas.index')
            ->with('success', 'Contratista creado exitosamente');
    }

    public function edit(Contratista $contratista)
    {
        $personas = Persona::whereHas('rol', function($query) {
            $query->where('nombre', 'Contratista');
        })->get();
        return view('contratistas.edit', compact('contratista', 'personas'));
    }

    public function update(Request $request, Contratista $contratista)
    {
        $request->validate([
            'id_persona' => 'required|exists:personas,id_persona',
            'razon_social' => 'required|string|max:255'
        ]);

        $contratista->update($request->all());
        return redirect()->route('contratistas.index')
            ->with('success', 'Contratista actualizado exitosamente');
    }
}
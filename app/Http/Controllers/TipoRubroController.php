<?php

namespace App\Http\Controllers;

use App\Models\TipoRubro;
use Illuminate\Http\Request;

class TipoRubroController extends Controller
{
    public function index()
    {
        $tipoRubros = TipoRubro::all();
        return view('tipo_rubros.index', compact('tipoRubros'));
    }

    public function create()
    {
        return view('tipo_rubros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'descripcion' => 'nullable|string'
        ]);

        TipoRubro::create($request->all());
        return redirect()->route('tipo_rubros.index')->with('success', 'Tipo de Rubro creado exitosamente');
    }

    public function edit(TipoRubro $tipoRubro)
    {
        return view('tipo_rubros.edit', compact('tipoRubro'));
    }

    public function update(Request $request, TipoRubro $tipoRubro)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'descripcion' => 'nullable|string'
        ]);

        $tipoRubro->update($request->all());
        return redirect()->route('tipo_rubros.index')->with('success', 'Tipo de Rubro actualizado exitosamente');
    }
}
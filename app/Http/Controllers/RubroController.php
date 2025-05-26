<?php

namespace App\Http\Controllers;

use App\Models\Rubro;
use Illuminate\Http\Request;

class RubroController extends Controller
{
    public function index()
    {
        $rubros = Rubro::all();
        return view('rubros.index', compact('rubros'));
    }

    public function create()
    {
        return view('rubros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo_rubro' => 'required|integer|unique:rubros',
            'nombre' => 'required|string|max:200',
            'descripcion' => 'nullable|string'
        ]);

        Rubro::create($request->all());
        return redirect()->route('rubros.index')->with('success', 'Rubro creado exitosamente');
    }

    public function edit(Rubro $rubro)
    {
        return view('rubros.edit', compact('rubro'));
    }

    public function update(Request $request, Rubro $rubro)
    {
        $request->validate([
            'nombre' => 'required|string|max:200',
            'descripcion' => 'nullable|string'
        ]);

        $rubro->update($request->all());
        return redirect()->route('rubros.index')->with('success', 'Rubro actualizado exitosamente');
    }
}
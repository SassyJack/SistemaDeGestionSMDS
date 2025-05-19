<?php

namespace App\Http\Controllers;

use App\Models\Rubro;
use App\Models\TipoRubro;
use Illuminate\Http\Request;

class RubroController extends Controller
{
    public function index()
    {
        $rubros = Rubro::with('tipoRubro')->get();
        return view('rubros.index', compact('rubros'));
    }

    public function create()
    {
        $tipoRubros = TipoRubro::all();
        return view('rubros.create', compact('tipoRubros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo_rubro' => 'required|integer|unique:rubros',
            'id_tipo_rubro' => 'required|exists:tipo_rubros,id',
            'descripcion' => 'nullable|string'
        ]);

        Rubro::create($request->all());
        return redirect()->route('rubros.index')->with('success', 'Rubro creado exitosamente');
    }

    public function edit(Rubro $rubro)
    {
        $tipoRubros = TipoRubro::all();
        return view('rubros.edit', compact('rubro', 'tipoRubros'));
    }

    public function update(Request $request, Rubro $rubro)
    {
        $request->validate([
            'id_tipo_rubro' => 'required|exists:tipo_rubros,id',
            'descripcion' => 'nullable|string'
        ]);

        $rubro->update($request->all());
        return redirect()->route('rubros.index')->with('success', 'Rubro actualizado exitosamente');
    }
}
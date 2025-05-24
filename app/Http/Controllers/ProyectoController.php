<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Estado;
use App\Models\Naturaleza;
use App\Models\Sector;
use App\Models\LineaBase;
use App\Models\Rubro;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::with(['estado', 'naturaleza', 'sector', 'lineaBase', 'Rubro'])->get();
        return view('proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        $estados = Estado::all();
        $naturalezas = Naturaleza::all();
        $sectores = Sector::all();
        $lineasBase = LineaBase::all();
        $rubros = Rubro::all();
        return view('proyectos.create', compact('estados', 'naturalezas', 'sectores', 'lineasBase', 'rubros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'actividad' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'presupuesto' => 'required|numeric|min:0',
            'codigo_SSEPI' => 'required|integer|min:0|max:9223372036854775807',
            'id_estado' => 'required|exists:estados,id_estado',
            'id_naturaleza' => 'required|exists:naturaleza,id_naturaleza',
            'codigo_rubro' => 'required|integer',
            'id_sector' => 'required|exists:sectores,id_sector',
            'id_linea_base' => 'required|exists:lineas_base,id_linea_base'
        ]);

        Proyecto::create($request->all());
        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado exitosamente');
    }

    public function edit(Proyecto $proyecto)
    {
        $estados = Estado::all();
        $naturalezas = Naturaleza::all();
        $sectores = Sector::all();
        $lineasBase = LineaBase::all();
        $rubros = Rubro::all();
        return view('proyectos.edit', compact('proyecto', 'estados', 'naturalezas', 'sectores', 'lineasBase', 'rubros'));
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'actividad' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'presupuesto' => 'required|numeric|min:0',
            'codigo_SSEPI' => 'required|integer|min:0|max:9223372036854775807',
            'id_estado' => 'required|exists:estados,id_estado',
            'id_naturaleza' => 'required|exists:naturaleza,id_naturaleza',
            'codigo_rubro' => 'required|integer',
            'id_sector' => 'required|exists:sectores,id_sector',
            'id_linea_base' => 'required|exists:lineas_base,id_linea_base'
        ]);

        $proyecto->update($request->all());
        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado exitosamente');
    }
}
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
    public function index(Request $request)
    {
        $query = Proyecto::with(['estado', 'naturaleza', 'sector', 'lineaBase', 'Rubro']);
        
        // Filtro por estado
        if ($request->filled('id_estado')) {
            $query->where('id_estado', $request->id_estado);
        }
        
        // Filtro por fecha de inicio
        if ($request->filled('fecha_inicio_desde')) {
            $query->where('fecha_inicio', '>=', $request->fecha_inicio_desde);
        }
        
        if ($request->filled('fecha_inicio_hasta')) {
            $query->where('fecha_inicio', '<=', $request->fecha_inicio_hasta);
        }
        
        // Filtro por fecha de fin
        if ($request->filled('fecha_fin_desde')) {
            $query->where('fecha_fin', '>=', $request->fecha_fin_desde);
        }
        
        if ($request->filled('fecha_fin_hasta')) {
            $query->where('fecha_fin', '<=', $request->fecha_fin_hasta);
        }
        
        $proyectos = $query->get();
        $estados = Estado::all();
        
        return view('proyectos.index', compact('proyectos', 'estados'));
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
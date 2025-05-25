<?php

namespace App\Http\Controllers;

use App\Models\HistorialCambio;
use App\Models\Proyecto;
use App\Models\Usuario;
use Illuminate\Http\Request;

class HistorialCambioController extends Controller
{
    /**
     * Muestra un listado del historial de cambios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = HistorialCambio::with(['proyecto', 'usuario.persona']);
        
        // Filtros opcionales
        if ($request->filled('id_proyecto')) {
            $query->where('id_proyecto', $request->id_proyecto);
        }
        
        if ($request->filled('id_usuario')) {
            $query->where('id_usuario', $request->id_usuario);
        }
        
        if ($request->filled('fecha_desde')) {
            $query->whereDate('fecha', '>=', $request->fecha_desde);
        }
        
        if ($request->filled('fecha_hasta')) {
            $query->whereDate('fecha', '<=', $request->fecha_hasta);
        }
        
        $historialCambios = $query->orderBy('fecha', 'desc')->get();
        $proyectos = Proyecto::all();
        $usuarios = Usuario::all();
        
        return view('historial_cambios.index', compact('historialCambios', 'proyectos', 'usuarios'));
    }
}
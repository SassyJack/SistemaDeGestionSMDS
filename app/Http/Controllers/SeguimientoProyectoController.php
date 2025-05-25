<?php

namespace App\Http\Controllers;

use App\Models\SeguimientoProyecto;
use App\Models\Proyecto;
use App\Models\Interventor;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeguimientoProyectoController extends Controller
{
    public function index()
    {
        $seguimientos = SeguimientoProyecto::with(['proyecto', 'interventor.persona', 'usuario.persona'])->get();
        return view('seguimiento_proyectos.index', compact('seguimientos'));
    }

    public function create()
    {
        $proyectos = Proyecto::all();
        $interventores = Interventor::with('persona')->get();
        $usuarios = Usuario::with('persona')->get();
        return view('seguimiento_proyectos.create', compact('proyectos', 'interventores', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_proyecto' => 'required|exists:proyectos,id_proyecto',
            'id_interventor' => 'required|exists:interventores,id_interventor',
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'descripcion' => 'required|string|max:500',
            'porcentaje_avance' => 'required|numeric|min:0|max:100',
            'fecha_modificacion' => 'required|date'
        ]);

        SeguimientoProyecto::create($request->all());
        return redirect()->route('seguimiento_proyectos.index')
            ->with('success', 'Seguimiento de proyecto creado exitosamente');
    }

    public function edit(SeguimientoProyecto $seguimientoProyecto)
    {
        $proyectos = Proyecto::all();
        $interventores = Interventor::with('persona')->get();
        $usuarios = Usuario::with('persona')->get();
        return view('seguimiento_proyectos.edit', compact('seguimientoProyecto', 'proyectos', 'interventores', 'usuarios'));
    }

    public function update(Request $request, SeguimientoProyecto $seguimientoProyecto)
    {
        $request->validate([
            'id_proyecto' => 'required|exists:proyectos,id_proyecto',
            'id_interventor' => 'required|exists:interventores,id_interventor',
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'descripcion' => 'required|string|max:500',
            'porcentaje_avance' => 'required|numeric|min:0|max:100',
            'fecha_modificacion' => 'required|date'
        ]);

        $seguimientoProyecto->update($request->all());
        return redirect()->route('seguimiento_proyectos.index')
            ->with('success', 'Seguimiento de proyecto actualizado exitosamente');
    }
}
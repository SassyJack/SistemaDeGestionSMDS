<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        $sectores = Sector::all();
        return view('sectores.index', compact('sectores'));
    }

    public function create()
    {
        return view('sectores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string'
        ]);

        Sector::create($request->all());
        return redirect()->route('sectores.index')->with('success', 'Sector creado exitosamente');
    }

    public function edit(Sector $sector)
    {
        return view('sectores.edit', compact('sector'));
    }

    public function update(Request $request, Sector $sector)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string'
        ]);

        $sector->update($request->all());
        return redirect()->route('sectores.index')->with('success', 'Sector actualizado exitosamente');
    }
}
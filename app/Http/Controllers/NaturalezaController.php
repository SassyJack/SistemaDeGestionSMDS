<?php

namespace App\Http\Controllers;

use App\Models\Naturaleza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NaturalezaController extends Controller
{
    /**
     * Muestra un listado de las naturalezas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $naturalezas = Naturaleza::all();
        return view('naturaleza.index', compact('naturalezas'));
    }

    /**
     * Muestra el formulario para crear una nueva naturaleza.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('naturaleza.create');
    }

    /**
     * Almacena una nueva naturaleza en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('naturaleza.create')
                ->withErrors($validator)
                ->withInput();
        }

        Naturaleza::create($request->all());

        return redirect()->route('naturaleza.index')
            ->with('success', 'Naturaleza creada exitosamente.');
    }

    /**
     * Muestra el formulario para editar la naturaleza especificada.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $naturaleza = Naturaleza::findOrFail($id);
        return view('naturaleza.edit', compact('naturaleza'));
    }

    /**
     * Actualiza la naturaleza especificada en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('naturaleza.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $naturaleza = Naturaleza::findOrFail($id);
        $naturaleza->update($request->all());

        return redirect()->route('naturaleza.index')
            ->with('success', 'Naturaleza actualizada exitosamente.');
    }
}
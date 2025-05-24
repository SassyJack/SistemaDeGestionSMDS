<?php

namespace App\Http\Controllers;

use App\Models\LineaBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LineaBaseController extends Controller
{
    /**
     * Muestra un listado de las líneas base.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lineasBase = LineaBase::all();
        return view('lineas_base.index', compact('lineasBase'));
    }

    /**
     * Muestra el formulario para crear una nueva línea base.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lineas_base.create');
    }

    /**
     * Almacena una nueva línea base en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'Linea_base' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('lineas_base.create')
                ->withErrors($validator)
                ->withInput();
        }

        LineaBase::create($request->all());

        return redirect()->route('lineas_base.index')
            ->with('success', 'Línea base creada exitosamente.');
    }

    /**
     * Muestra el formulario para editar la línea base especificada.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lineaBase = LineaBase::findOrFail($id);
        return view('lineas_base.edit', compact('lineaBase'));
    }

    /**
     * Actualiza la línea base especificada en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'Linea_base' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('lineas_base.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $lineaBase = LineaBase::findOrFail($id);
        $lineaBase->update($request->all());

        return redirect()->route('lineas_base.index')
            ->with('success', 'Línea base actualizada exitosamente.');
    }
}
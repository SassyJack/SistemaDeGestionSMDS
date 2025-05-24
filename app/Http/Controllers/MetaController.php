<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MetaController extends Controller
{
    /**
     * Muestra un listado de las metas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metas = Meta::all();
        return view('metas.index', compact('metas'));
    }

    /**
     * Muestra el formulario para crear una nueva meta.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('metas.create');
    }

    /**
     * Almacena una nueva meta en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'meta_programa' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('metas.create')
                ->withErrors($validator)
                ->withInput();
        }

        Meta::create($request->all());

        return redirect()->route('metas.index')
            ->with('success', 'Meta creada exitosamente.');
    }

    /**
     * Muestra el formulario para editar la meta especificada.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meta = Meta::findOrFail($id);
        return view('metas.edit', compact('meta'));
    }

    /**
     * Actualiza la meta especificada en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'meta_programa' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('metas.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $meta = Meta::findOrFail($id);
        $meta->update($request->all());

        return redirect()->route('metas.index')
            ->with('success', 'Meta actualizada exitosamente.');
    }
}
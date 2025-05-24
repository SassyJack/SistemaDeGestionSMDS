<?php

namespace App\Http\Controllers;

use App\Models\FormaPago;
use Illuminate\Http\Request;

class FormaPagoController extends Controller
{
    public function index()
    {
        $formasPago = FormaPago::all();
        return view('formas_de_pago.index', compact('formasPago'));
    }

    public function create()
    {
        return view('formas_de_pago.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'descripcion' => 'nullable|string'
        ]);

        FormaPago::create($request->all());
        return redirect()->route('formas_de_pago.index')->with('success', 'Forma de Pago creada exitosamente');
    }

    public function edit(FormaPago $formaPago)
    {
        return view('formas_de_pago.edit', compact('formaPago'));
    }

    public function update(Request $request, FormaPago $formaPago)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'descripcion' => 'nullable|string'
        ]);

        $formaPago->update($request->all());
        return redirect()->route('formas_de_pago.index')->with('success', 'Forma de Pago actualizada exitosamente');
    }
}
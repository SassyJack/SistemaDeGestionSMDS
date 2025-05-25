<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Contratista;
use App\Models\Proyecto;
use App\Models\FormaPago;
use App\Models\Estado;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    public function index()
    {
        $contratos = Contrato::with(['contratista', 'proyecto', 'formaPago', 'estado'])->get();
        return view('contratos.index', compact('contratos'));
    }

    public function create()
    {
        $contratistas = Contratista::all();
        $proyectos = Proyecto::all();
        $formasPago = FormaPago::all();
        $estados = Estado::all();
        return view('contratos.create', compact('contratistas', 'proyectos', 'formasPago', 'estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero_contrato' => 'required|string|max:50|unique:contratos',
            'fecha_celebracion' => 'required|date',
            'fecha_expedicion' => 'required|date',
            'id_contratista' => 'required|exists:contratistas,id_contratista',
            'id_proyecto' => 'required|exists:proyectos,id_proyecto',
            'objeto' => 'required|string',
            'valor_contrato' => 'required|numeric|min:0',
            'valor_anticipo' => 'required|numeric|min:0',
            'duracion' => 'required|integer|min:1',
            'id_forma_pago' => 'required|exists:formas_pago,id_forma_pago',
            'id_estado' => 'required|exists:estados,id_estado'
        ]);

        Contrato::create($request->all());
        return redirect()->route('contratos.index')->with('success', 'Contrato creado exitosamente');
    }

    public function edit(Contrato $contrato)
    {
        $contratistas = Contratista::all();
        $proyectos = Proyecto::all();
        $formasPago = FormaPago::all();
        $estados = Estado::all();
        return view('contratos.edit', compact('contrato', 'contratistas', 'proyectos', 'formasPago', 'estados'));
    }

    public function update(Request $request, Contrato $contrato)
    {
        $request->validate([
            'numero_contrato' => 'required|string|max:50|unique:contratos,numero_contrato,' . $contrato->id_contrato . ',id_contrato',
            'fecha_celebracion' => 'required|date',
            'fecha_expedicion' => 'required|date',
            'id_contratista' => 'required|exists:contratistas,id_contratista',
            'id_proyecto' => 'required|exists:proyectos,id_proyecto',
            'objeto' => 'required|string',
            'valor_contrato' => 'required|numeric|min:0',
            'valor_anticipo' => 'required|numeric|min:0',
            'duracion' => 'required|integer|min:1',
            'id_forma_pago' => 'required|exists:formas_pago,id_forma_pago',
            'id_estado' => 'required|exists:estados,id_estado'
        ]);

        $contrato->update($request->all());
        return redirect()->route('contratos.index')->with('success', 'Contrato actualizado exitosamente');
    }
}
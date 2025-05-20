<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Estado;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with(['estado', 'persona'])->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $estados = Estado::all();
        $personas = Persona::all();
        return view('usuarios.create', compact('estados', 'personas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_persona' => 'required|exists:personas,id_persona|unique:usuarios,id_persona',
            'contrasena' => 'required|string|min:6',
            'id_estado' => 'required|exists:estados,id_estado'
        ]);

        $data = $request->all();
        $data['contrasena'] = Hash::make($request->contrasena);
        $data['fecha_creacion'] = now();

        Usuario::create($data);
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente');
    }

    public function edit(Usuario $usuario)
    {
        $estados = Estado::all();
        $personas = Persona::all();
        return view('usuarios.edit', compact('usuario', 'estados', 'personas'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'id_persona' => 'required|exists:personas,id_persona|unique:usuarios,id_persona,'.$usuario->id_usuario.',id_usuario',
            'id_estado' => 'required|exists:estados,id_estado'
        ]);

        $data = $request->all();
        
        // Solo actualizar la contraseña si se proporciona una nueva
        if ($request->filled('contrasena')) {
            $data['contrasena'] = Hash::make($request->contrasena);
        } else {
            unset($data['contrasena']);
        }

        $usuario->update($data);
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }
}
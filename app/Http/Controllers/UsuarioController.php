<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Role;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with(['rol', 'estado'])->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Role::all();
        $estados = Estado::all();
        return view('usuarios.create', compact('roles', 'estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:usuarios',
            'contrasena' => 'required|string|min:6',
            'id_rol' => 'required|exists:roles,id_rol',
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
        $roles = Role::all();
        $estados = Estado::all();
        return view('usuarios.edit', compact('usuario', 'roles', 'estados'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:usuarios,nombre,'.$usuario->id_usuario.',id_usuario',
            'id_rol' => 'required|exists:roles,id_rol',
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
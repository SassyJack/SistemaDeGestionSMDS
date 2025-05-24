<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Persona;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'persona' => 'required',
            'contrasena' => 'required'
        ]);

        // Buscar el id_persona basado en el nombre de la persona
        $persona = Persona::where('nombre', $credentials['persona'])->first();
        
        if (!$persona) {
            return back()->with('error', 'Persona no encontrada.');
        }
        
        // Buscar el usuario asociado a esa persona
        $usuario = Usuario::where('id_persona', $persona->id_persona)->first();
        
        if (!$usuario) {
            return back()->with('error', 'No existe un usuario para esta persona.');
        }
        
        if (Auth::attempt([
            'id_persona' => $persona->id_persona,
            'password' => $credentials['contrasena']
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->with('error', 'Las credenciales proporcionadas no coinciden con nuestros registros.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
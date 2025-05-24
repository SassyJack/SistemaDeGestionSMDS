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
            'username' => 'required',
            'contrasena' => 'required'
        ]);

        $usuario = \App\Models\Usuario::where('username', $credentials['username'])->first();
        if (!$usuario) {
            return back()->with('error', 'Usuario no encontrado.');
        }

        if (\Illuminate\Support\Facades\Hash::check($credentials['contrasena'], $usuario->contrasena)) {
            Auth::login($usuario);
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
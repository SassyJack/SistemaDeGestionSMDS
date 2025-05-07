<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Contratista;
use App\Models\Proyecto;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener estadísticas para el dashboard
        $totalUsuarios = Usuario::count();
        $totalContratistas = Contratista::count();
        $totalProyectos = Proyecto::count();

        return view('dashboard.index', compact('totalUsuarios', 'totalContratistas', 'totalProyectos'));
    }
}
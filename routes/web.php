<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\LineaBaseController;
use App\Http\Controllers\RubroController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\NaturalezaController;
use App\Http\Controllers\FormaPagoController;
use App\Http\Controllers\ContratistaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\InterventorController;
use App\Http\Controllers\HistorialCambioController;
use App\Http\Controllers\SeguimientoProyectoController;

// Rutas públicas
Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', function () {
    return view('app');
});

//Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // SECTORES
    Route::get('/sectores', [SectorController::class, 'index'])->name('sectores.index');
    Route::get('/sectores/create', [SectorController::class, 'create'])->name('sectores.create');
    Route::post('/sectores', [SectorController::class, 'store'])->name('sectores.store');
    Route::get('/sectores/{sector}/edit', [SectorController::class, 'edit'])->name('sectores.edit');
    Route::put('/sectores/{sector}', [SectorController::class, 'update'])->name('sectores.update');  

    // Roles
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    
    // Usuarios
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
    
    // Especialidades
    Route::get('/especialidades', [EspecialidadController::class, 'index'])->name('especialidades.index');
    Route::get('/especialidades/create', [EspecialidadController::class, 'create'])->name('especialidades.create');
    Route::post('/especialidades', [EspecialidadController::class, 'store'])->name('especialidades.store');
    Route::get('/especialidades/{especialidad}/edit', [EspecialidadController::class, 'edit'])->name('especialidades.edit');
    Route::put('/especialidades/{especialidad}', [EspecialidadController::class, 'update'])->name('especialidades.update');
    
    // Personas
    Route::get('/personas', [PersonaController::class, 'index'])->name('personas.index');
    Route::get('/personas/create', [PersonaController::class, 'create'])->name('personas.create');
    Route::post('/personas', [PersonaController::class, 'store'])->name('personas.store');
    Route::get('/personas/{persona}/edit', [PersonaController::class, 'edit'])->name('personas.edit');
    Route::put('/personas/{persona}', [PersonaController::class, 'update'])->name('personas.update');
    
    // Líneas Base
    Route::get('/lineas_base', [LineaBaseController::class, 'index'])->name('lineas_base.index');
    Route::get('/lineas_base/create', [LineaBaseController::class, 'create'])->name('lineas_base.create');
    Route::post('/lineas_base', [LineaBaseController::class, 'store'])->name('lineas_base.store');
    Route::get('/lineas_base/{lineaBase}/edit', [LineaBaseController::class, 'edit'])->name('lineas_base.edit');
    Route::put('/lineas_base/{lineaBase}', [LineaBaseController::class, 'update'])->name('lineas_base.update');
    
    // Rubros
    Route::get('/rubros', [RubroController::class, 'index'])->name('rubros.index');
    Route::get('/rubros/create', [RubroController::class, 'create'])->name('rubros.create');
    Route::post('/rubros', [RubroController::class, 'store'])->name('rubros.store');
    Route::get('/rubros/{rubro}/edit', [RubroController::class, 'edit'])->name('rubros.edit');
    Route::put('/rubros/{rubro}', [RubroController::class, 'update'])->name('rubros.update');
    
    // Metas
    Route::get('/metas', [MetaController::class, 'index'])->name('metas.index');
    Route::get('/metas/create', [MetaController::class, 'create'])->name('metas.create');
    Route::post('/metas', [MetaController::class, 'store'])->name('metas.store');
    Route::get('/metas/{meta}/edit', [MetaController::class, 'edit'])->name('metas.edit');
    Route::put('/metas/{meta}', [MetaController::class, 'update'])->name('metas.update');
    
    // Naturaleza
    Route::get('/naturaleza', [NaturalezaController::class, 'index'])->name('naturaleza.index');
    Route::get('/naturaleza/create', [NaturalezaController::class, 'create'])->name('naturaleza.create');
    Route::post('/naturaleza', [NaturalezaController::class, 'store'])->name('naturaleza.store');
    Route::get('/naturaleza/{naturaleza}/edit', [NaturalezaController::class, 'edit'])->name('naturaleza.edit');
    Route::put('/naturaleza/{naturaleza}', [NaturalezaController::class, 'update'])->name('naturaleza.update');
    
    // Formas de Pago
    Route::get('/formas_pago', [FormaPagoController::class, 'index'])->name('formas_pago.index');
    Route::get('/formas_pago/create', [FormaPagoController::class, 'create'])->name('formas_pago.create');
    Route::post('/formas_pago', [FormaPagoController::class, 'store'])->name('formas_pago.store');
    Route::get('/formas_pago/{formaPago}/edit', [FormaPagoController::class, 'edit'])->name('formas_pago.edit');
    Route::put('/formas_pago/{formaPago}', [FormaPagoController::class, 'update'])->name('formas_pago.update');
    
    // Contratistas
    Route::get('/contratistas', [ContratistaController::class, 'index'])->name('contratistas.index');
    Route::get('/contratistas/create', [ContratistaController::class, 'create'])->name('contratistas.create');
    Route::post('/contratistas', [ContratistaController::class, 'store'])->name('contratistas.store');
    Route::get('/contratistas/{contratista}/edit', [ContratistaController::class, 'edit'])->name('contratistas.edit');
    Route::put('/contratistas/{contratista}', [ContratistaController::class, 'update'])->name('contratistas.update');
    
    // Proyectos
    Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');
    Route::get('/proyectos/create', [ProyectoController::class, 'create'])->name('proyectos.create');
    Route::post('/proyectos', [ProyectoController::class, 'store'])->name('proyectos.store');
    Route::get('/proyectos/{proyecto}/edit', [ProyectoController::class, 'edit'])->name('proyectos.edit');
    Route::put('/proyectos/{proyecto}', [ProyectoController::class, 'update'])->name('proyectos.update');
    
    //Contratos
    Route::get('/contratos', [ContratoController::class, 'index'])->name('contratos.index');
    Route::get('/contratos/create', [ContratoController::class, 'create'])->name('contratos.create');
    Route::post('/contratos', [ContratoController::class, 'store'])->name('contratos.store');
    Route::get('/contratos/{contrato}/edit', [ContratoController::class, 'edit'])->name('contratos.edit');
    Route::put('/contratos/{contrato}', [ContratoController::class, 'update'])->name('contratos.update');
    
    // Interventores
    Route::get('/interventores', [InterventorController::class, 'index'])->name('interventores.index');
    Route::get('/interventores/create', [InterventorController::class, 'create'])->name('interventores.create');
    Route::post('/interventores', [InterventorController::class, 'store'])->name('interventores.store');
    Route::get('/interventores/{interventor}/edit', [InterventorController::class, 'edit'])->name('interventores.edit');
    Route::put('/interventores/{interventor}', [InterventorController::class, 'update'])->name('interventores.update');
    
    // Rutas para Historial de Cambios
    Route::get('/historial_cambios', [App\Http\Controllers\HistorialCambioController::class, 'index'])->name('historial_cambios.index');
    // Rutas para Seguimiento de Proyectos
    Route::get('/seguimiento_proyectos', [SeguimientoProyectoController::class, 'index'])->name('seguimiento_proyectos.index');
    Route::get('/seguimiento_proyectos/create', [SeguimientoProyectoController::class, 'create'])->name('seguimiento_proyectos.create');
    Route::post('/seguimiento_proyectos', [SeguimientoProyectoController::class, 'store'])->name('seguimiento_proyectos.store');
    Route::get('/seguimiento_proyectos/{seguimientoProyecto}/edit', [SeguimientoProyectoController::class, 'edit'])->name('seguimiento_proyectos.edit');
    Route::put('/seguimiento_proyectos/{seguimientoProyecto}', [SeguimientoProyectoController::class, 'update'])->name('seguimiento_proyectos.update');
    
});

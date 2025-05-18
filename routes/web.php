<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\TipoRubroController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', function () {
    return view('app');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//SECTORES
Route::get('/sectores', [SectorController::class, 'index'])->name('sectores.index');
Route::get('/sectores/create', [SectorController::class, 'create'])->name('sectores.create');
Route::post('/sectores', [SectorController::class, 'store'])->name('sectores.store');
Route::get('/sectores/{sector}/edit', [SectorController::class, 'edit'])->name('sectores.edit');
Route::put('/sectores/{sector}', [SectorController::class, 'update'])->name('sectores.update');
//Tipo Rubros
Route::get('/tipo_rubros', [TipoRubroController::class, 'index'])->name('tipo_rubros.index');
Route::get('/tipo_rubros/create', [TipoRubroController::class, 'create'])->name('tipo_rubros.create');
Route::post('/tipo_rubros', [TipoRubroController::class, 'store'])->name('tipo_rubros.store');
Route::get('/tipo_rubros/{tipoRubro}/edit', [TipoRubroController::class, 'edit'])->name('tipo_rubros.edit');
Route::put('/tipo_rubros/{tipoRubro}', [TipoRubroController::class, 'update'])->name('tipo_rubros.update');
//Roles
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');




// Rutas protegidas
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    
});

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    public function run()
    {
        DB::table('estados')->insert([
            [
                'nombre' => 'Activo',
                'descripcion' => 'Usuario activo en el sistema'
            ],
            [
                'nombre' => 'Inactivo',
                'descripcion' => 'Usuario temporalmente desactivado'
            ],
            [
                'nombre' => 'Suspendido',
                'descripcion' => 'Usuario suspendido del sistema'
            ]
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioAdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuarios')->insert([
            'id_persona' => 3,
            'contrasena' => bcrypt('MyPass123'),
            'id_estado' => 1,
            'username' => 'admin'
        ]);
    }
}

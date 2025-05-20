<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class VerificarConexionBD extends Command
{
    protected $signature = 'verificar:conexion-bd';
    protected $description = 'Verifica la conexión con la base de datos';

    public function handle()
    {
        try {
            DB::connection()->getPdo();
            $this->info("✅ Conexión exitosa a la base de datos: " . DB::connection()->getDatabaseName());
        } catch (\Exception $e) {
            $this->error("❌ Error de conexión: " . $e->getMessage());
        }
    }
}

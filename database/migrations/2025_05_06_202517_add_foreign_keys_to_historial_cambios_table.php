<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('historial_cambios', function (Blueprint $table) {
            $table->foreign(['id_proyecto'], 'historial_cambios_ibfk_1')->references(['id_proyecto'])->on('proyectos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_usuario'], 'historial_cambios_ibfk_2')->references(['id_usuario'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('historial_cambios', function (Blueprint $table) {
            $table->dropForeign('historial_cambios_ibfk_1');
            $table->dropForeign('historial_cambios_ibfk_2');
        });
    }
};

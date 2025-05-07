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
        Schema::table('proyectos', function (Blueprint $table) {
            $table->foreign(['id_estado'], 'proyectos_ibfk_1')->references(['id_estado'])->on('estados')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_entidad'], 'proyectos_ibfk_2')->references(['id_entidad'])->on('entidades')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_responsable'], 'proyectos_ibfk_3')->references(['id_usuario'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropForeign('proyectos_ibfk_1');
            $table->dropForeign('proyectos_ibfk_2');
            $table->dropForeign('proyectos_ibfk_3');
        });
    }
};

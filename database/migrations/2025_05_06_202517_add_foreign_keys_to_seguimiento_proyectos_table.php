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
        Schema::table('seguimiento_proyectos', function (Blueprint $table) {
            $table->foreign(['id_proyecto'], 'seguimiento_proyectos_ibfk_1')->references(['id_proyecto'])->on('proyectos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_interventor'], 'seguimiento_proyectos_ibfk_2')->references(['id_interventor'])->on('interventores')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_usuario'], 'seguimiento_proyectos_ibfk_3')->references(['id_usuario'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_nombre_meta'], 'seguimiento_proyectos_ibfk_4')->references(['id_nombre_meta'])->on('nombres_metas')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seguimiento_proyectos', function (Blueprint $table) {
            $table->dropForeign('seguimiento_proyectos_ibfk_1');
            $table->dropForeign('seguimiento_proyectos_ibfk_2');
            $table->dropForeign('seguimiento_proyectos_ibfk_3');
            $table->dropForeign('seguimiento_proyectos_ibfk_4');
        });
    }
};

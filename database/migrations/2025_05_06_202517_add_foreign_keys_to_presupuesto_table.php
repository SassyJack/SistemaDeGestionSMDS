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
        Schema::table('presupuesto', function (Blueprint $table) {
            $table->foreign(['id_proyecto'], 'presupuesto_ibfk_1')->references(['id_proyecto'])->on('proyectos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['codigo_rubro'], 'presupuesto_ibfk_2')->references(['codigo_rubro'])->on('rubros')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('presupuesto', function (Blueprint $table) {
            $table->dropForeign('presupuesto_ibfk_1');
            $table->dropForeign('presupuesto_ibfk_2');
        });
    }
};

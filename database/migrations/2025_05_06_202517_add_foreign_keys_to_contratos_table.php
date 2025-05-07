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
        Schema::table('contratos', function (Blueprint $table) {
            $table->foreign(['id_contratista'], 'contratos_ibfk_1')->references(['id_contratista'])->on('contratistas')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_proyecto'], 'contratos_ibfk_2')->references(['id_proyecto'])->on('proyectos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_forma_pago'], 'contratos_ibfk_3')->references(['id_forma_pago'])->on('formas_pago')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_estado'], 'contratos_ibfk_4')->references(['id_estado'])->on('estados')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->dropForeign('contratos_ibfk_1');
            $table->dropForeign('contratos_ibfk_2');
            $table->dropForeign('contratos_ibfk_3');
            $table->dropForeign('contratos_ibfk_4');
        });
    }
};

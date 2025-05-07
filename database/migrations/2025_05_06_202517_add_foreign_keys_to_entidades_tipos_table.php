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
        Schema::table('entidades_tipos', function (Blueprint $table) {
            $table->foreign(['id_entidad'], 'entidades_tipos_ibfk_1')->references(['id_entidad'])->on('entidades')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_tipo_entidad'], 'entidades_tipos_ibfk_2')->references(['id_tipo_entidad'])->on('tipo_entidades')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entidades_tipos', function (Blueprint $table) {
            $table->dropForeign('entidades_tipos_ibfk_1');
            $table->dropForeign('entidades_tipos_ibfk_2');
        });
    }
};

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
        Schema::create('entidades_tipos', function (Blueprint $table) {
            $table->integer('id_entidad_tipo', true);
            $table->integer('id_entidad')->index('id_entidad');
            $table->integer('id_tipo_entidad')->index('id_tipo_entidad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entidades_tipos');
    }
};

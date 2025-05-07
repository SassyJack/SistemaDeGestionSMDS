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
        Schema::create('seguimiento_proyectos', function (Blueprint $table) {
            $table->integer('id_seguimiento', true);
            $table->integer('id_proyecto')->index('id_proyecto');
            $table->integer('id_interventor')->index('id_interventor');
            $table->integer('id_usuario')->index('id_usuario');
            $table->string('descripcion', 250)->nullable();
            $table->integer('id_nombre_meta')->nullable()->index('id_nombre_meta');
            $table->integer('id_meta_programa')->nullable();
            $table->integer('id_linea_base')->nullable();
            $table->integer('porcentaje_avance')->nullable();
            $table->timestamp('fecha_modificacion')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento_proyectos');
    }
};

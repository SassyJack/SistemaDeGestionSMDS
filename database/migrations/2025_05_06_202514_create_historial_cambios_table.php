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
        Schema::create('historial_cambios', function (Blueprint $table) {
            $table->integer('id_cambio', true);
            $table->integer('id_proyecto')->index('id_proyecto');
            $table->integer('id_usuario')->index('id_usuario');
            $table->timestamp('fecha')->useCurrent();
            $table->text('cambio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_cambios');
    }
};

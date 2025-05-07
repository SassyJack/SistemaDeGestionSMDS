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
        Schema::create('presupuesto', function (Blueprint $table) {
            $table->integer('id_presupuesto', true);
            $table->integer('id_proyecto')->index('id_proyecto');
            $table->string('actividad')->nullable();
            $table->string('producto')->nullable();
            $table->string('numero_disponibilidad', 50)->nullable();
            $table->string('codigo_rubro', 20)->nullable()->index('codigo_rubro');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presupuesto');
    }
};

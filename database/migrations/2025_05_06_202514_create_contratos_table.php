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
        Schema::create('contratos', function (Blueprint $table) {
            $table->integer('id_contrato', true);
            $table->string('numero_contrato', 50)->unique('numero_contrato');
            $table->date('fecha_celebracion')->nullable();
            $table->date('fecha_expedicion')->nullable();
            $table->integer('id_contratista')->index('id_contratista');
            $table->integer('id_proyecto')->index('id_proyecto');
            $table->text('objeto')->nullable();
            $table->decimal('valor_contrato', 15)->nullable();
            $table->decimal('valor_anticipo', 15)->nullable();
            $table->integer('duracion')->nullable();
            $table->integer('id_forma_pago')->nullable()->index('id_forma_pago');
            $table->integer('id_estado')->index('id_estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};

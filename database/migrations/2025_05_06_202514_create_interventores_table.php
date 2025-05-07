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
        Schema::create('interventores', function (Blueprint $table) {
            $table->integer('id_interventor', true);
            $table->integer('id_usuario')->index('id_usuario');
            $table->integer('id_especialidad')->index('id_especialidad');
            $table->string('registro_profesional', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interventores');
    }
};

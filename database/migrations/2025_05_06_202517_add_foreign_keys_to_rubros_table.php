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
        Schema::table('rubros', function (Blueprint $table) {
            $table->foreign(['id_tipo_rubro'], 'rubros_ibfk_1')->references(['id_tipo_rubro'])->on('tipo_rubros')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rubros', function (Blueprint $table) {
            $table->dropForeign('rubros_ibfk_1');
        });
    }
};

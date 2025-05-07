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
        Schema::table('usuarios_roles', function (Blueprint $table) {
            $table->foreign(['id_usuario'], 'usuarios_roles_ibfk_1')->references(['id_usuario'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_rol'], 'usuarios_roles_ibfk_2')->references(['id_rol'])->on('roles')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuarios_roles', function (Blueprint $table) {
            $table->dropForeign('usuarios_roles_ibfk_1');
            $table->dropForeign('usuarios_roles_ibfk_2');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productosnuevos', function (Blueprint $table) {
            $table->foreign(['Usuarios_UsuarioID'], 'fk_ProductosNuevos_Usuarios1')->references(['UsuarioID'])->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productosnuevos', function (Blueprint $table) {
            $table->dropForeign('fk_ProductosNuevos_Usuarios1');
        });
    }
};

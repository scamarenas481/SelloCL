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
        Schema::create('productosnuevos', function (Blueprint $table) {
            $table->integer('ProductoNuevoID', true);
            $table->string('Descripcion')->nullable();
            $table->date('Fecha')->nullable();
            $table->tinyInteger('Revisado')->nullable();
            $table->integer('Usuarios_UsuarioID')->index('fk_ProductosNuevos_Usuarios1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productosnuevos');
    }
};

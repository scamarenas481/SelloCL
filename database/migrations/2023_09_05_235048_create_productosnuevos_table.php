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
            $table->decimal('Cantidad', 10)->nullable();
            $table->boolean('no-se-maneja')->nullable();
            $table->boolean('se-termino')->nullable();
            $table->boolean('pedido-especial')->nullable();
            $table->unsignedBigInteger('users_id')->index('fk_productosnuevos_users1_idx');
            $table->integer('unidades_UnidadID')->index('fk_productosnuevos_unidades1_idx');

            $table->primary(['ProductoNuevoID', 'users_id', 'unidades_UnidadID']);
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

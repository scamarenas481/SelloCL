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
        Schema::create('conteo2', function (Blueprint $table) {
            $table->integer('Conteo2ID', true);
            $table->decimal('ExistenciasContadas', 10)->nullable();
            $table->date('FechaConteo')->nullable();
            $table->string('Productos_CodigoInterno')->index('fk_Conteo2_Productos1_idx');
            $table->integer('Usuarios_UsuarioID')->index('fk_Conteo2_Usuarios1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conteo2');
    }
};

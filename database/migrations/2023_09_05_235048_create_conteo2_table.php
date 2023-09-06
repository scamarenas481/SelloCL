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
            $table->string('productos_CodigoInterno');
            $table->unsignedBigInteger('productos_users_id');
            $table->integer('productos_unidadentrada_UnidadID');
            $table->integer('productos_unidadsalida_UnidadID1');
            $table->integer('productos_marcas_MarcaID');
            $table->integer('productos_lineas_LineaID');

            $table->index(['productos_CodigoInterno', 'productos_users_id', 'productos_unidadentrada_UnidadID', 'productos_unidadsalida_UnidadID1', 'productos_marcas_MarcaID', 'productos_lineas_LineaID'], 'fk_conteo2_productos1_idx');
            $table->primary(['Conteo2ID', 'productos_CodigoInterno', 'productos_users_id', 'productos_unidadentrada_UnidadID', 'productos_unidadsalida_UnidadID1', 'productos_marcas_MarcaID', 'productos_lineas_LineaID']);
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

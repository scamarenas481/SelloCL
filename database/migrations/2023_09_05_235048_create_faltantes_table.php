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
        Schema::create('faltantes', function (Blueprint $table) {
            $table->integer('FaltantesID', true);
            $table->string('CodigoProveedor')->nullable();
            $table->string('Descripcion')->nullable();
            $table->decimal('CantidadSolicitada', 10)->nullable();
            $table->tinyInteger('SeTermino')->nullable();
            $table->tinyInteger('NoSeManeja')->nullable();
            $table->tinyInteger('ConExistencia')->nullable();
            $table->decimal('Existencias', 10)->nullable();
            $table->date('Fecha')->nullable();
            $table->tinyInteger('Revisado')->nullable();
            $table->string('productos_CodigoInterno');
            $table->unsignedBigInteger('productos_users_id');
            $table->integer('productos_unidadentrada_UnidadID');
            $table->integer('productos_unidadsalida_UnidadID1');
            $table->integer('productos_marcas_MarcaID');
            $table->integer('productos_lineas_LineaID');
            $table->integer('observacionesfaltantes_ObservacionID')->index('fk_faltantes_observacionesfaltantes1_idx');

            $table->primary(['FaltantesID', 'productos_CodigoInterno', 'productos_users_id', 'productos_unidadentrada_UnidadID', 'productos_unidadsalida_UnidadID1', 'productos_marcas_MarcaID', 'productos_lineas_LineaID', 'observacionesfaltantes_ObservacionID']);
            $table->index(['productos_CodigoInterno', 'productos_users_id', 'productos_unidadentrada_UnidadID', 'productos_unidadsalida_UnidadID1', 'productos_marcas_MarcaID', 'productos_lineas_LineaID'], 'fk_faltantes_productos1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faltantes');
    }
};

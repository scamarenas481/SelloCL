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
        Schema::create('productos_has_proveedores', function (Blueprint $table) {
            $table->string('productos_CodigoInterno');
            $table->unsignedBigInteger('productos_users_id')->nullable();
            $table->integer('productos_unidadentrada_UnidadID');
            $table->integer('productos_unidadsalida_UnidadID1');
            $table->integer('productos_marcas_MarcaID');
            $table->integer('productos_lineas_LineaID');
            $table->integer('proveedores_ProveedorID')->index('fk_productos_has_proveedores_proveedores1_idx');

            $table->primary(['productos_CodigoInterno', 'productos_unidadentrada_UnidadID', 'productos_unidadsalida_UnidadID1', 'productos_marcas_MarcaID', 'productos_lineas_LineaID', 'proveedores_ProveedorID']);
            $table->index(['productos_CodigoInterno', 'productos_users_id', 'productos_unidadentrada_UnidadID', 'productos_unidadsalida_UnidadID1', 'productos_marcas_MarcaID', 'productos_lineas_LineaID'], 'fk_productos_has_proveedores_productos1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_has_proveedores');
    }
};

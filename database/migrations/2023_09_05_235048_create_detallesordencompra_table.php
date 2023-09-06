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
        Schema::create('detallesordencompra', function (Blueprint $table) {
            $table->integer('DetalleOrdenCompraID', true);
            $table->decimal('CantidadSolicitada', 10)->nullable();
            $table->decimal('CantidadEntregada', 10)->nullable();
            $table->integer('ordenescompra_OrdenCompraID')->index('fk_detallesordencompra_ordenescompra1_idx');
            $table->integer('productossolicitados_ProductoSolicitadoID')->index('fk_detallesordencompra_productossolicitados1_idx');

            $table->primary(['DetalleOrdenCompraID', 'ordenescompra_OrdenCompraID', 'productossolicitados_ProductoSolicitadoID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallesordencompra');
    }
};

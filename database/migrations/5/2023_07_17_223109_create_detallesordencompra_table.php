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
            $table->integer('OrdenesCompra_OrdenCompraID');
            $table->integer('OrdenesCompra_Proveedores_ProveedorID');
            $table->integer('ProductosSolicitados_ProductoSolicitadoID')->index('fk_DetallesOrdenCompra_ProductosSolicitados1_idx');

            $table->index(['OrdenesCompra_OrdenCompraID', 'OrdenesCompra_Proveedores_ProveedorID'], 'fk_DetallesOrdenCompra_OrdenesCompra1_idx');
            $table->primary(['DetalleOrdenCompraID', 'OrdenesCompra_OrdenCompraID', 'OrdenesCompra_Proveedores_ProveedorID', 'ProductosSolicitados_ProductoSolicitadoID']);
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

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
        Schema::create('incidenciasproveedor', function (Blueprint $table) {
            $table->integer('idIncumplimientoProveedores', true);
            $table->integer('FolioOrdenCompra')->nullable();
            $table->date('FechaPromesaEntrega')->nullable();
            $table->date('FechaEntrega')->nullable();
            $table->integer('DiasAtraso')->nullable();
            $table->tinyInteger('PedidoIncompleto')->nullable();
            $table->tinyInteger('MaterialEnMalEstado')->nullable();
            $table->tinyInteger('NoLlegoATiempo')->nullable();
            $table->tinyInteger('MaterialIncorrecto')->nullable();
            $table->tinyInteger('CantidadesIncorrectas')->nullable();
            $table->text('Observaciones')->nullable();
            $table->integer('CantidadNoEntregada')->nullable();
            $table->integer('detallesordencompra_DetalleOrdenCompraID');
            $table->integer('detallesordencompra_ordenescompra_OrdenCompraID');
            $table->integer('detallesordencompra_productossolicitados_ProductoSolicitadoID');

            $table->primary(['idIncumplimientoProveedores', 'detallesordencompra_DetalleOrdenCompraID', 'detallesordencompra_ordenescompra_OrdenCompraID', 'detallesordencompra_productossolicitados_ProductoSolicitadoID']);
            $table->index(['detallesordencompra_DetalleOrdenCompraID', 'detallesordencompra_ordenescompra_OrdenCompraID', 'detallesordencompra_productossolicitados_ProductoSolicitadoID'], 'fk_incidenciasproveedor_detallesordencompra1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidenciasproveedor');
    }
};

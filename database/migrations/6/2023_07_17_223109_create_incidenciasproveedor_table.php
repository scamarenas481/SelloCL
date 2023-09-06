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
            $table->integer('DetallesOrdenCompra_DetalleOrdenCompraID');
            $table->integer('DetallesOrdenCompra_OrdenesCompra_OrdenCompraID');
            $table->integer('DetallesOrdenCompra_OrdenesCompra_Proveedores_ProveedorID');
            $table->integer('DetallesOrdenCompra_ProductosSolicitados_ProductoSolicitadoID');

            $table->index(['DetallesOrdenCompra_DetalleOrdenCompraID', 'DetallesOrdenCompra_OrdenesCompra_OrdenCompraID', 'DetallesOrdenCompra_OrdenesCompra_Proveedores_ProveedorID', 'DetallesOrdenCompra_ProductosSolicitados_ProductoSolicitadoID'], 'fk_IncidenciasProveedor_DetallesOrdenCompra1_idx');
            $table->primary(['idIncumplimientoProveedores', 'DetallesOrdenCompra_DetalleOrdenCompraID', 'DetallesOrdenCompra_OrdenesCompra_OrdenCompraID', 'DetallesOrdenCompra_OrdenesCompra_Proveedores_ProveedorID', 'DetallesOrdenCompra_ProductosSolicitados_ProductoSolicitadoID']);
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

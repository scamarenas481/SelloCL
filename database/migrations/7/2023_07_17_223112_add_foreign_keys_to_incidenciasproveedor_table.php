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
        Schema::table('incidenciasproveedor', function (Blueprint $table) {
            $table->foreign(['DetallesOrdenCompra_DetalleOrdenCompraID', 'DetallesOrdenCompra_OrdenesCompra_OrdenCompraID', 'DetallesOrdenCompra_OrdenesCompra_Proveedores_ProveedorID', 'DetallesOrdenCompra_ProductosSolicitados_ProductoSolicitadoID'], 'fk_IncidenciasProveedor_DetallesOrdenCompra1')->references(['DetalleOrdenCompraID', 'OrdenesCompra_OrdenCompraID', 'OrdenesCompra_Proveedores_ProveedorID', 'ProductosSolicitados_ProductoSolicitadoID'])->on('detallesordencompra')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incidenciasproveedor', function (Blueprint $table) {
            $table->dropForeign('fk_IncidenciasProveedor_DetallesOrdenCompra1');
        });
    }
};

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
            $table->foreign(['detallesordencompra_DetalleOrdenCompraID', 'detallesordencompra_ordenescompra_OrdenCompraID', 'detallesordencompra_productossolicitados_ProductoSolicitadoID'], 'fk_incidenciasproveedor_detallesordencompra1')->references(['DetalleOrdenCompraID', 'ordenescompra_OrdenCompraID', 'productossolicitados_ProductoSolicitadoID'])->on('detallesordencompra')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
            $table->dropForeign('fk_incidenciasproveedor_detallesordencompra1');
        });
    }
};

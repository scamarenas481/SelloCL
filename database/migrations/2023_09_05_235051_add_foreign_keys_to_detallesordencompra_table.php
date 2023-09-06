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
        Schema::table('detallesordencompra', function (Blueprint $table) {
            $table->foreign(['productossolicitados_ProductoSolicitadoID'], 'fk_detallesordencompra_productossolicitados1')->references(['ProductoSolicitadoID'])->on('productossolicitados')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ordenescompra_OrdenCompraID'], 'fk_detallesordencompra_ordenescompra1')->references(['OrdenCompraID'])->on('ordenescompra')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detallesordencompra', function (Blueprint $table) {
            $table->dropForeign('fk_detallesordencompra_productossolicitados1');
            $table->dropForeign('fk_detallesordencompra_ordenescompra1');
        });
    }
};

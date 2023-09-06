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
        Schema::table('incumplimientoproveedores', function (Blueprint $table) {
            $table->foreign(['OrdenesCompra_OrdenCompraID', 'OrdenesCompra_Proveedores_ProveedorID'], 'fk_IncumplimientoProveedores_OrdenesCompra1')->references(['OrdenCompraID', 'Proveedores_ProveedorID'])->on('ordenescompra')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incumplimientoproveedores', function (Blueprint $table) {
            $table->dropForeign('fk_IncumplimientoProveedores_OrdenesCompra1');
        });
    }
};

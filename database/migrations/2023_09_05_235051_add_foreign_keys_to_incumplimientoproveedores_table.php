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
            $table->foreign(['proveedores_ProveedorID'], 'fk_incumplimientoproveedores_proveedores')->references(['ProveedorID'])->on('proveedores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ordenescompra_OrdenCompraID'], 'fk_incumplimientoproveedores_ordenescompra1')->references(['OrdenCompraID'])->on('ordenescompra')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
            $table->dropForeign('fk_incumplimientoproveedores_proveedores');
            $table->dropForeign('fk_incumplimientoproveedores_ordenescompra1');
        });
    }
};

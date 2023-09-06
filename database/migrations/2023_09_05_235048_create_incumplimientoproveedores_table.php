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
        Schema::create('incumplimientoproveedores', function (Blueprint $table) {
            $table->integer('idIncumplimientoProveedores', true);
            $table->binary('FirmaProveedor')->nullable();
            $table->integer('FolioOrdenCompra')->nullable();
            $table->date('FechaPromesaEntrega')->nullable();
            $table->date('FechaEntrega')->nullable();
            $table->integer('DiasAtraso')->nullable();
            $table->tinyInteger('PedidoIncompleto')->nullable();
            $table->tinyInteger('IncumplimientoProveedorescol')->nullable();
            $table->tinyInteger('MaterialEnMalEstado')->nullable();
            $table->tinyInteger('NoLlegoATiempo')->nullable();
            $table->tinyInteger('MaterialIncorrecto')->nullable();
            $table->tinyInteger('CantidadesIncorrectas')->nullable();
            $table->text('Observaciones')->nullable();
            $table->integer('proveedores_ProveedorID')->index('fk_incumplimientoproveedores_proveedores_idx');
            $table->integer('ordenescompra_OrdenCompraID')->index('fk_incumplimientoproveedores_ordenescompra1_idx');

            $table->primary(['idIncumplimientoProveedores', 'proveedores_ProveedorID', 'ordenescompra_OrdenCompraID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incumplimientoproveedores');
    }
};

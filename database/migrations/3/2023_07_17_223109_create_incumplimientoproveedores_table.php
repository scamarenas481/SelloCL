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
            $table->integer('OrdenesCompra_OrdenCompraID');
            $table->integer('OrdenesCompra_Proveedores_ProveedorID');

            $table->index(['OrdenesCompra_OrdenCompraID', 'OrdenesCompra_Proveedores_ProveedorID'], 'fk_IncumplimientoProveedores_OrdenesCompra1_idx');
            $table->primary(['idIncumplimientoProveedores', 'OrdenesCompra_OrdenCompraID', 'OrdenesCompra_Proveedores_ProveedorID']);
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

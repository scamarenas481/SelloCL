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
        Schema::create('ordenescompra', function (Blueprint $table) {
            $table->integer('OrdenCompraID', true);
            $table->date('Fecha')->nullable();
            $table->integer('Proveedores_ProveedorID')->index('fk_OrdenesCompra_Proveedores1_idx');
            $table->integer('Usuarios_UsuarioID')->index('fk_OrdenesCompra_Usuarios1_idx');

            $table->primary(['OrdenCompraID', 'Proveedores_ProveedorID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenescompra');
    }
};

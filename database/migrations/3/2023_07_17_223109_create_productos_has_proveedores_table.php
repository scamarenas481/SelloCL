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
        Schema::create('productos_has_proveedores', function (Blueprint $table) {
            $table->string('Productos_CodigoInterno')->index('fk_Productos_has_Proveedores_Productos1_idx');
            $table->integer('Proveedores_ProveedorID')->index('fk_Productos_has_Proveedores_Proveedores1_idx');

            $table->primary(['Productos_CodigoInterno', 'Proveedores_ProveedorID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_has_proveedores');
    }
};

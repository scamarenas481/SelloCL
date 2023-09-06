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
        Schema::create('productossolicitados', function (Blueprint $table) {
            $table->integer('ProductoSolicitadoID', true);
            $table->decimal('CantidadSolicitada', 10)->nullable();
            $table->tinyInteger('SeTermino')->nullable();
            $table->tinyInteger('NoSeManeja')->nullable();
            $table->date('Fecha')->nullable();
            $table->tinyInteger('Revisado')->nullable();
            $table->string('CodigoProveedor')->nullable();
            $table->integer('Usuarios_UsuarioID')->index('fk_ProductosSolicitados_Usuarios1_idx');
            $table->string('Productos_CodigoInterno')->index('fk_ProductosSolicitados_Productos1_idx');
            $table->integer('Unidades_UnidadID')->index('fk_ProductosSolicitados_Unidades1_idx');
            $table->integer('Proveedores_ProveedorID')->index('fk_ProductosSolicitados_Proveedores1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productossolicitados');
    }
};

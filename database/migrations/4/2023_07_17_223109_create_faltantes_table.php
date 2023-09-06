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
        Schema::create('faltantes', function (Blueprint $table) {
            $table->integer('FaltantesID', true);
            $table->string('CodigoProveedor')->nullable();
            $table->string('Descripcion')->nullable();
            $table->decimal('CantidadSolicitada', 10)->nullable();
            $table->tinyInteger('SeTermino')->nullable();
            $table->tinyInteger('NoSeManeja')->nullable();
            $table->tinyInteger('ConExistencia')->nullable();
            $table->decimal('Existencias', 10)->nullable();
            $table->date('Fecha')->nullable();
            $table->tinyInteger('Revisado')->nullable();
            $table->string('Productos_CodigoInterno')->index('fk_Faltantes_Productos1_idx');
            $table->integer('ObservacionesFaltantes_ObservacionID')->index('fk_Faltantes_ObservacionesFaltantes1_idx');
            $table->integer('Proveedores_ProveedorID')->index('fk_Faltantes_Proveedores1_idx');
            $table->integer('Unidades_UnidadID')->index('fk_Faltantes_Unidades1_idx');
            $table->integer('Usuarios_UsuarioID')->index('fk_Faltantes_Usuarios1_idx');

            $table->primary(['FaltantesID', 'Productos_CodigoInterno', 'ObservacionesFaltantes_ObservacionID', 'Proveedores_ProveedorID', 'Unidades_UnidadID', 'Usuarios_UsuarioID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faltantes');
    }
};

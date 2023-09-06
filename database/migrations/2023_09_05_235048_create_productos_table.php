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
        Schema::create('productos', function (Blueprint $table) {
            $table->comment('										');
            $table->string('CodigoInterno');
            $table->string('Descripcion')->nullable();
            $table->decimal('FactorUnidades', 10)->nullable();
            $table->string('CodigoProveedor')->nullable();
            $table->string('ClaveAlterna')->nullable();
            $table->string('NumeroFabricante')->nullable();
            $table->enum('Status', ['Activo', 'Inactivo'])->nullable();
            $table->decimal('Existencias', 10)->nullable();
            $table->integer('ClaveSAT')->nullable();
            $table->string('ClaveUnidad')->nullable();
            $table->dateTime('FechaRegistro')->nullable();
            $table->boolean('Contado')->nullable();
            $table->unsignedBigInteger('users_id')->index('fk_productos_users1_idx');
            $table->integer('unidadentrada_UnidadID')->index('fk_productos_unidades1_idx');
            $table->integer('unidadsalida_UnidadID1')->index('fk_productos_unidades2_idx');
            $table->integer('marcas_MarcaID')->index('fk_productos_marcas1_idx');
            $table->integer('lineas_LineaID')->index('fk_productos_lineas1_idx');

            $table->primary(['CodigoInterno', 'users_id', 'unidadentrada_UnidadID', 'unidadsalida_UnidadID1', 'marcas_MarcaID', 'lineas_LineaID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};

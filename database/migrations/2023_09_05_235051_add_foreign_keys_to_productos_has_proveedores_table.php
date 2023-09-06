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
        Schema::table('productos_has_proveedores', function (Blueprint $table) {
            $table->foreign(['proveedores_ProveedorID'], 'fk_productos_has_proveedores_proveedores1')->references(['ProveedorID'])->on('proveedores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['productos_CodigoInterno', 'productos_users_id', 'productos_unidadentrada_UnidadID', 'productos_unidadsalida_UnidadID1', 'productos_marcas_MarcaID', 'productos_lineas_LineaID'], 'fk_productos_has_proveedores_productos1')->references(['CodigoInterno', 'users_id', 'unidadentrada_UnidadID', 'unidadsalida_UnidadID1', 'marcas_MarcaID', 'lineas_LineaID'])->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos_has_proveedores', function (Blueprint $table) {
            $table->dropForeign('fk_productos_has_proveedores_proveedores1');
            $table->dropForeign('fk_productos_has_proveedores_productos1');
        });
    }
};

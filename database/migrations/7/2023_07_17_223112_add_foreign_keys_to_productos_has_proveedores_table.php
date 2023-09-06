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
            $table->foreign(['Productos_CodigoInterno'], 'fk_Productos_has_Proveedores_Productos1')->references(['CodigoInterno'])->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Proveedores_ProveedorID'], 'fk_Productos_has_Proveedores_Proveedores1')->references(['ProveedorID'])->on('proveedores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
            $table->dropForeign('fk_Productos_has_Proveedores_Productos1');
            $table->dropForeign('fk_Productos_has_Proveedores_Proveedores1');
        });
    }
};

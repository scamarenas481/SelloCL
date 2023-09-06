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
        Schema::table('productossolicitados', function (Blueprint $table) {
            $table->foreign(['Productos_CodigoInterno'], 'fk_ProductosSolicitados_Productos1')->references(['CodigoInterno'])->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Proveedores_ProveedorID'], 'fk_ProductosSolicitados_Proveedores1')->references(['ProveedorID'])->on('proveedores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Unidades_UnidadID'], 'fk_ProductosSolicitados_Unidades1')->references(['UnidadID'])->on('unidades')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Usuarios_UsuarioID'], 'fk_ProductosSolicitados_Usuarios1')->references(['UsuarioID'])->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productossolicitados', function (Blueprint $table) {
            $table->dropForeign('fk_ProductosSolicitados_Productos1');
            $table->dropForeign('fk_ProductosSolicitados_Proveedores1');
            $table->dropForeign('fk_ProductosSolicitados_Unidades1');
            $table->dropForeign('fk_ProductosSolicitados_Usuarios1');
        });
    }
};

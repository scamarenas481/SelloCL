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
        Schema::table('faltantes', function (Blueprint $table) {
            $table->foreign(['ObservacionesFaltantes_ObservacionID'], 'fk_Faltantes_ObservacionesFaltantes1')->references(['ObservacionID'])->on('observacionesfaltantes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Productos_CodigoInterno'], 'fk_Faltantes_Productos1')->references(['CodigoInterno'])->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Proveedores_ProveedorID'], 'fk_Faltantes_Proveedores1')->references(['ProveedorID'])->on('proveedores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Unidades_UnidadID'], 'fk_Faltantes_Unidades1')->references(['UnidadID'])->on('unidades')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Usuarios_UsuarioID'], 'fk_Faltantes_Usuarios1')->references(['UsuarioID'])->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faltantes', function (Blueprint $table) {
            $table->dropForeign('fk_Faltantes_ObservacionesFaltantes1');
            $table->dropForeign('fk_Faltantes_Productos1');
            $table->dropForeign('fk_Faltantes_Proveedores1');
            $table->dropForeign('fk_Faltantes_Unidades1');
            $table->dropForeign('fk_Faltantes_Usuarios1');
        });
    }
};

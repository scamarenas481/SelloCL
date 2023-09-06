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
        Schema::table('productos', function (Blueprint $table) {
            $table->foreign(['Lineas_LineaID'], 'fk_Productos_Lineas1')->references(['LineaID'])->on('lineas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Marcas_MarcaID'], 'fk_Productos_Marcas1')->references(['MarcaID'])->on('marcas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['UnidadEntrada_UnidadID'], 'fk_Productos_Unidades1')->references(['UnidadID'])->on('unidades')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['UnidadSalida_UnidadID1'], 'fk_Productos_Unidades2')->references(['UnidadID'])->on('unidades')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Usuarios_UsuarioID'], 'fk_Productos_Usuarios1')->references(['UsuarioID'])->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign('fk_Productos_Lineas1');
            $table->dropForeign('fk_Productos_Marcas1');
            $table->dropForeign('fk_Productos_Unidades1');
            $table->dropForeign('fk_Productos_Unidades2');
            $table->dropForeign('fk_Productos_Usuarios1');
        });
    }
};

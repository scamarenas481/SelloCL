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
        Schema::table('conteo2', function (Blueprint $table) {
            $table->foreign(['Productos_CodigoInterno'], 'fk_Conteo2_Productos1')->references(['CodigoInterno'])->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Usuarios_UsuarioID'], 'fk_Conteo2_Usuarios1')->references(['UsuarioID'])->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conteo2', function (Blueprint $table) {
            $table->dropForeign('fk_Conteo2_Productos1');
            $table->dropForeign('fk_Conteo2_Usuarios1');
        });
    }
};

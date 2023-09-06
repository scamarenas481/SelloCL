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
        Schema::table('detallesconteo', function (Blueprint $table) {
            $table->foreign(['conteos_ConteoID'], 'fk_detallesconteo_conteos1')->references(['ConteoID'])->on('conteos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['productos_CodigoInterno', 'productos_users_id', 'productos_unidadentrada_UnidadID', 'productos_unidadsalida_UnidadID1', 'productos_marcas_MarcaID', 'productos_lineas_LineaID'], 'fk_detallesconteo_productos1')->references(['CodigoInterno', 'users_id', 'unidadentrada_UnidadID', 'unidadsalida_UnidadID1', 'marcas_MarcaID', 'lineas_LineaID'])->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detallesconteo', function (Blueprint $table) {
            $table->dropForeign('fk_detallesconteo_conteos1');
            $table->dropForeign('fk_detallesconteo_productos1');
        });
    }
};

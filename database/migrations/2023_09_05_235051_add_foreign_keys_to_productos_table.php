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
            $table->foreign(['lineas_LineaID'], 'fk_productos_lineas1')->references(['LineaID'])->on('lineas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['unidadentrada_UnidadID'], 'fk_productos_unidades1')->references(['UnidadID'])->on('unidades')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['users_id'], 'fk_productos_users1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['marcas_MarcaID'], 'fk_productos_marcas1')->references(['MarcaID'])->on('marcas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['unidadsalida_UnidadID1'], 'fk_productos_unidades2')->references(['UnidadID'])->on('unidades')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
            $table->dropForeign('fk_productos_lineas1');
            $table->dropForeign('fk_productos_unidades1');
            $table->dropForeign('fk_productos_users1');
            $table->dropForeign('fk_productos_marcas1');
            $table->dropForeign('fk_productos_unidades2');
        });
    }
};

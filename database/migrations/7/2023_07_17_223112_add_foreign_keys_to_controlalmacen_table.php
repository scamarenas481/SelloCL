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
        Schema::table('controlalmacen', function (Blueprint $table) {
            $table->foreign(['Productos_CodigoInterno'], 'fk_Ubicaciones_has_Productos_Productos1')->references(['CodigoInterno'])->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Ubicaciones_UbicacionID'], 'fk_Ubicaciones_has_Productos_Ubicaciones1')->references(['UbicacionID'])->on('ubicaciones')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('controlalmacen', function (Blueprint $table) {
            $table->dropForeign('fk_Ubicaciones_has_Productos_Productos1');
            $table->dropForeign('fk_Ubicaciones_has_Productos_Ubicaciones1');
        });
    }
};

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
            $table->foreign(['productos_CodigoInterno'], 'fk_ubicaciones_has_productos_productos1')->references(['CodigoInterno'])->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ubicaciones_UbicacionID'], 'fk_ubicaciones_has_productos_ubicaciones1')->references(['UbicacionID'])->on('ubicaciones')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
            $table->dropForeign('fk_ubicaciones_has_productos_productos1');
            $table->dropForeign('fk_ubicaciones_has_productos_ubicaciones1');
        });
    }
};

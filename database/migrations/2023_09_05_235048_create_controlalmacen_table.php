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
        Schema::create('controlalmacen', function (Blueprint $table) {
            $table->integer('ubicaciones_UbicacionID')->index('fk_ubicaciones_has_productos_ubicaciones1_idx');
            $table->string('productos_CodigoInterno')->index('fk_ubicaciones_has_productos_productos1_idx');

            $table->primary(['ubicaciones_UbicacionID', 'productos_CodigoInterno']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controlalmacen');
    }
};

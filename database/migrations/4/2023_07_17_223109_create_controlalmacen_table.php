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
            $table->integer('Ubicaciones_UbicacionID', true)->index('fk_Ubicaciones_has_Productos_Ubicaciones1_idx');
            $table->string('Productos_CodigoInterno')->index('fk_Ubicaciones_has_Productos_Productos1_idx');

            $table->primary(['Ubicaciones_UbicacionID', 'Productos_CodigoInterno']);
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

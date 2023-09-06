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
        Schema::create('detallesconteo', function (Blueprint $table) {
            $table->integer('DetalleConteoID', true);
            $table->decimal('ExistenciasContadas', 10)->nullable();
            $table->integer('Conteos_ConteoID')->index('fk_DetallesConteo_Conteos1_idx');
            $table->string('Productos_CodigoInterno')->index('fk_DetallesConteo_Productos1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallesconteo');
    }
};

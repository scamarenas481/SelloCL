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
        Schema::create('productossolicitados', function (Blueprint $table) {
            $table->integer('ProductoSolicitadoID', true);
            $table->decimal('CantidadSolicitada', 10)->nullable();
            $table->tinyInteger('SeTermino')->nullable();
            $table->tinyInteger('NoSeManeja')->nullable();
            $table->date('Fecha')->nullable();
            $table->tinyInteger('Revisado')->nullable();
            $table->string('CodigoProveedor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productossolicitados');
    }
};

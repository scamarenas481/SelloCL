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
        Schema::create('marcas', function (Blueprint $table) {
            $table->integer('MarcaID', true);
            $table->string('NombreMarca')->nullable();
            $table->integer('fabricantes_FabricanteID')->index('fk_marcas_fabricantes1_idx');

            $table->primary(['MarcaID', 'fabricantes_FabricanteID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marcas');
    }
};

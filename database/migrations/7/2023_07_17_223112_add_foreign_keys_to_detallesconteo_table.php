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
            $table->foreign(['Conteos_ConteoID'], 'fk_DetallesConteo_Conteos1')->references(['ConteoID'])->on('conteos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Productos_CodigoInterno'], 'fk_DetallesConteo_Productos1')->references(['CodigoInterno'])->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
            $table->dropForeign('fk_DetallesConteo_Conteos1');
            $table->dropForeign('fk_DetallesConteo_Productos1');
        });
    }
};

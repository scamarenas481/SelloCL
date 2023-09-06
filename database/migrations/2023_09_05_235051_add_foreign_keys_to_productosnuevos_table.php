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
        Schema::table('productosnuevos', function (Blueprint $table) {
            $table->foreign(['users_id'], 'fk_productosnuevos_users1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['unidades_UnidadID'], 'fk_productosnuevos_unidades1')->references(['UnidadID'])->on('unidades')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productosnuevos', function (Blueprint $table) {
            $table->dropForeign('fk_productosnuevos_users1');
            $table->dropForeign('fk_productosnuevos_unidades1');
        });
    }
};

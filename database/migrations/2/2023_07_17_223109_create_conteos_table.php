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
        Schema::create('conteos', function (Blueprint $table) {
            $table->integer('ConteoID', true);
            $table->date('FechaConteo')->nullable();
            $table->integer('ProductosContadosNum')->nullable();
            $table->integer('Usuarios_UsuarioID')->index('fk_Conteos_Usuarios1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conteos');
    }
};

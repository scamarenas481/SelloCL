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
            $table->unsignedBigInteger('users_id')->index('fk_conteos_users1_idx');

            $table->primary(['ConteoID', 'users_id']);
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

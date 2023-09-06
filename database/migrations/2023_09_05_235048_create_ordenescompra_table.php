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
        Schema::create('ordenescompra', function (Blueprint $table) {
            $table->integer('OrdenCompraID', true);
            $table->date('Fecha')->nullable();
            $table->unsignedBigInteger('users_id')->index('fk_ordenescompra_users1_idx');

            $table->primary(['OrdenCompraID', 'users_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenescompra');
    }
};

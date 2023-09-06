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
        Schema::table('ordenescompra', function (Blueprint $table) {
            $table->foreign(['Proveedores_ProveedorID'], 'fk_OrdenesCompra_Proveedores1')->references(['ProveedorID'])->on('proveedores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Usuarios_UsuarioID'], 'fk_OrdenesCompra_Usuarios1')->references(['UsuarioID'])->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordenescompra', function (Blueprint $table) {
            $table->dropForeign('fk_OrdenesCompra_Proveedores1');
            $table->dropForeign('fk_OrdenesCompra_Usuarios1');
        });
    }
};

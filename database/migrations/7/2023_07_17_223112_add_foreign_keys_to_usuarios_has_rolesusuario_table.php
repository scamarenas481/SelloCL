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
        Schema::table('usuarios_has_rolesusuario', function (Blueprint $table) {
            $table->foreign(['RolesUsuario_RolID'], 'fk_Usuarios_has_RolesUsuario_RolesUsuario1')->references(['RolID'])->on('rolesusuario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Usuarios_UsuarioID'], 'fk_Usuarios_has_RolesUsuario_Usuarios1')->references(['UsuarioID'])->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios_has_rolesusuario', function (Blueprint $table) {
            $table->dropForeign('fk_Usuarios_has_RolesUsuario_RolesUsuario1');
            $table->dropForeign('fk_Usuarios_has_RolesUsuario_Usuarios1');
        });
    }
};

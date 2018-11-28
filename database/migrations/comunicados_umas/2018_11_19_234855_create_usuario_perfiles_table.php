<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioPerfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('umas')->create('usuario_perfiles', function (Blueprint $table) {
            $table->integer('id_usuarioperfil')->nullable();
            $table->integer('id_usuario')->nullable();
            $table->integer('id_perfil')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('umas')->dropIfExists('usuario_perfiles');
    }
}

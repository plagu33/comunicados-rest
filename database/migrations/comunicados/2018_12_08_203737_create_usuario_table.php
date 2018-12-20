<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id')->comment("ID incrementable de la tabla");
            $table->string('nombre',100)->comment("Nombre del usuario");
            $table->string('apellido',100)->comment("Apellido del usuario");
            $table->string('rut',20)->comment("Rut del usuario");
            $table->integer('id_usuario')->comment("id del usuario, con el cuál se identifica en el sistema de umas");
            $table->integer('id_persona')->comment("id de la persona, para identificar los datos de esta persona en el sistema de umas");
            $table->integer('id_perfil')->comment("identificador del perfil del usuario");
            $table->string('usuario',100)->comment("nombre de usuario del inicio de session");
            $table->string('contrasena',100)->comment("contraseña del usuario");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}

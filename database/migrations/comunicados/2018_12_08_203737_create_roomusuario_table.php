<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomusuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_usuario', function (Blueprint $table) {
            $table->increments('id')->comment("ID incrementable de la tabla");
            $table->integer('room_id')->comment("id de la tabla room");
            $table->integer('usuario_id')->comment("id del usuario que envia el mensaje");
            $table->string('mensaje',150)->comment("mensaje enviado");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_usuario');
    }
}

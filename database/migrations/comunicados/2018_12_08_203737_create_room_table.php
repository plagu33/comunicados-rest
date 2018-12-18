<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function (Blueprint $table) {
            $table->increments('id')->comment("ID incrementable de la tabla");
            $table->integer('id_usuario_inicio')->comment("id del usuario que inicio la conversación");
            $table->integer('id_usuario_destino')->comment("id del usuario al que va dirigida la conversación");
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
        Schema::dropIfExists('room');
    }
}

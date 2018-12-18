<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario', function (Blueprint $table) {
            $table->increments('id')->comment("ID incrementable de la tabla");
            $table->string('dia',50)->comment("día que el ramo se imparte");
            $table->string('codigo_ramo',100)->comment("código del ramo");
            $table->integer('usuario_id')->comment("usuario al que pertenece el ramo");
            $table->string('hora',50)->comment("hora del ramo");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horario');
    }
}

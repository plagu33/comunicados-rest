<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota', function (Blueprint $table) {
            $table->increments('id')->comment("ID incrementable de la tabla");
            $table->string('usuario_id',150)->comment("código de usuario");
            $table->string('nombre_ramo',150)->comment("nombre de ramo");
            $table->string('codigo_ramo',150)->comment("código de ramo");
            $table->string('codigo_carrera',150)->comment("código de carrera");
            $table->string('tipo_nota',50)->comment("tipo de nota, si es ejercicio o solemne1, solemne2, solemne3");
            $table->string('porcentaje',50)->comment("porcentaje que vale la nota");
            $table->double('nota',7,1)->comment("nota");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota');
    }
}

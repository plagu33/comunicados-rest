<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento', function (Blueprint $table) {
            $table->increments('id')->comment("ID incrementable de la tabla");
            $table->string('username')->comment("rut del usuario dueño del documento");
            $table->string('curso_id',191)->comment("id del curso");
            $table->string('nombre_curso',191)->comment("nombre del curso");
            $table->string('nombre_actividad',191)->comment("nombre de la actividad");
            $table->string('nombre_archivo',191)->comment("nombre del archivo");
            $table->string('path',191)->comment("path al archivo");
            $table->string('tipo',191)->comment("formato del archivo");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento');
    }
}

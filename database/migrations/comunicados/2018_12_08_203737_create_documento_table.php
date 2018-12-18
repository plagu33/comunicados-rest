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
            $table->integer('id_usuario')->comment("id del usuario dueño del documento");
            $table->string('codigo_ramo',100)->comment("id ramo al que pertenece el documento");
            $table->string('link',200)->comment("link del documento");
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

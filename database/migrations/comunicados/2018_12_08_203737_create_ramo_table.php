<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ramo', function (Blueprint $table) {
            $table->increments('id')->comment("ID incrementable de la tabla");
            $table->string('codigo_ramo',100)->comment("código del ramo");
            $table->string('nombre',200)->comment("nombre del ramo");
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
        Schema::dropIfExists('ramo');
    }
}

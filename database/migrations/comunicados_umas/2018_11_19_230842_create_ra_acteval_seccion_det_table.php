<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaActevalSeccionDetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('umas')->create('ra_Acteval_Seccion_det', function (Blueprint $table) {
            $table->decimal('Ano',4,0)->nullable();
            $table->decimal('Periodo',3,0)->nullable();
            $table->string('CodSede',30)->nullable();
            $table->string('Codcarr',30)->nullable();
            $table->string('CodRamo',20)->nullable();
            $table->decimal('CodSecc',3,0)->nullable();
            $table->string('actividad',30)->nullable();
            $table->smallInteger('Linea')->nullable();
            $table->integer('Porcentaje')->nullable();
            $table->dateTime('FecIngInicial')->nullable();
            $table->dateTime('FecIngFinal')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('umas')->dropIfExists('ra_Acteval_Seccion_det');
    }
}

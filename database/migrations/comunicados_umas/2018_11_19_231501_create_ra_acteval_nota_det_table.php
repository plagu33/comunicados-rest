<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaActevalNotaDetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('umas')->create('ra_Acteval_Nota_det', function (Blueprint $table) {
            $table->decimal('Ano',4,0)->nullable();
            $table->decimal('Periodo',3,0)->nullable();
            $table->string('CodSede',30)->nullable();
            $table->string('Codcarr',30)->nullable();
            $table->string('CodRamo',20)->nullable();
            $table->integer('CodSecc')->nullable();
            $table->string('CodCLi',30)->nullable();
            $table->string('actividad',30)->nullable();
            $table->smallInteger('Linea')->nullable();
            $table->decimal('Nota',2,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('umas')->dropIfExists('ra_Acteval_Nota_det');
    }
}

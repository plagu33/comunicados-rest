<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaActEvalSeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('umas')->create('ra_ActEval_Seccion', function (Blueprint $table) {
            $table->decimal('Ano',4,0)->nullable();
            $table->decimal('Periodo',3,0)->nullable();
            $table->string('CodSede',30)->nullable();
            $table->string('Codcarr',30)->nullable();
            $table->string('CodRamo',20)->nullable();
            $table->decimal('CodSecc',3,0)->nullable();
            $table->string('Actividad',30)->nullable();
            $table->smallInteger('Cantidad')->nullable();
            $table->string('Elimina_mas_baja',2)->nullable();
            $table->string('Posee_recuperativa',2)->nullable();
            $table->integer('Porcentaje')->nullable();
            $table->dateTime('Fec_Ini_IngNotas')->nullable();
            $table->dateTime('Fec_Fin_IngNotas')->nullable();
            $table->string('Usa_mas_Baja',2)->nullable();
            $table->string('Usa_Recuperativa',2)->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('umas')->dropIfExists('ra_ActEval_Seccion');
    }
}

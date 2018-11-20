<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRARESERVASALATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('umas')->create('RA_RESERVASALA', function (Blueprint $table) {
            $table->string('CODSAL',12)->nullable();
            $table->string('CODPROF',30)->nullable();
            $table->string('CODMOD',3)->nullable();
            $table->string('DIA',9)->nullable();
            $table->string('CODRAMO',20)->nullable();
            $table->decimal('CODSECC',3,0)->nullable();
            $table->decimal('ANO',4,0)->nullable();
            $table->decimal('PERIODO',3,0)->nullable();
            $table->integer('REGIMEN')->nullable();
            $table->dateTime('FECHA')->nullable();
            $table->string('TIPO',30)->nullable();
            $table->string('CODSEDE',30)->nullable();
            $table->string('Glosa',500)->nullable();
            $table->string('CODCARR',30)->nullable();
            $table->string('ESTADO',1)->nullable();
            $table->string('marcado',1)->nullable();
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('umas')->dropIfExists('RA_RESERVASALA');
    }
}

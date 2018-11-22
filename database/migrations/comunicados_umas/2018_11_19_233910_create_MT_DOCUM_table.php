<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMTDOCUMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('umas')->create('MT_DOCUM', function (Blueprint $table) {
            $table->decimal('TIPODOC',4,0)->nullable();
            $table->string('NOMBRE',60)->nullable();
            $table->string('VENDIBLE',1)->nullable();
            $table->string('USUARIO',8)->nullable();
            $table->dateTime('FECMOD')->nullable();
            $table->string('DEFECTO',1)->nullable();
            $table->string('ABREVIATURA',10)->nullable();
            $table->string('CUENTA',20)->nullable();
            $table->integer('ANALISIS')->nullable();
            $table->string('PROTESTO',1)->nullable();
            $table->string('PorCaja',1)->nullable();
            $table->integer('Flujo')->nullable();
            $table->decimal('TIPDOCPROTESTO',10,0)->nullable();
            $table->string('DOCRESPALDO',1)->nullable();
            $table->string('PagoWeb',2)->nullable();
            $table->integer('CODIGO_ERP')->nullable();
            $table->string('protestable',1)->nullable();
            $table->integer('CODIGO_SII')->nullable();
            $table->string('VentaReversa',2)->nullable();
            $table->string('VENTACOMPLEMENTARIA',2)->nullable();
            $table->char('GENERAINT',2)->nullable();
            $table->decimal('MONEDA_AD',1,0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('umas')->dropIfExists('MT_DOCUM');
    }
}

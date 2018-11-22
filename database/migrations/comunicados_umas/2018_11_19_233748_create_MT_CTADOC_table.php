<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMTCTADOCTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('umas')->create('MT_CTADOC', function (Blueprint $table) {
            $table->decimal('CTADOC',4,0)->nullable();
            $table->decimal('CTADOCNUM',15,0)->nullable();
            $table->string('CODAPOD',30)->nullable();
            $table->string('CODCLI',30)->nullable();
            $table->string('CONTRATO',40)->nullable();
            $table->decimal('CONVENIO',10,0)->nullable();
            $table->string('CODCARR',30)->nullable();
            $table->decimal('CUOTA',2,0)->nullable();
            $table->decimal('NUMCUOT',2,0)->nullable();
            $table->decimal('MONTO',12,2)->nullable();
            $table->decimal('SALDO',12,2)->nullable();
            $table->dateTime('FECVEN')->nullable();
            $table->dateTime('FECDEUDA')->nullable();
            $table->decimal('ESTADO',2,0)->nullable();
            $table->smallInteger('UBICACION')->nullable();
            $table->string('RECIBIDO',1)->nullable();
            $table->dateTime('FECREP')->nullable();
            $table->decimal('CODBAN',5,0)->nullable();
            $table->decimal('CODSUC',2,0)->nullable();
            $table->dateTime('FECCANCEL')->nullable();
            $table->decimal('INTDEUDA',10,0)->nullable();
            $table->decimal('INTREPAC',10,0)->nullable();
            $table->decimal('CODNOT',2,0)->nullable();
            $table->decimal('TIPOCARR',3,0)->nullable();
            $table->decimal('ANO',4,0)->nullable();
            $table->decimal('PERIODO',1,0)->nullable();
            $table->decimal('GASTOSOP',10,0)->nullable();
            $table->string('USUARIO',8)->nullable();
            $table->dateTime('FECMOD')->nullable();
            $table->dateTime('FECREG')->nullable();
            $table->dateTime('FECIMP')->nullable();
            $table->decimal('CTATRANS',15,0)->nullable();
            $table->decimal('NUMLETRA',2,0)->nullable();
            $table->dateTime('FECNOT')->nullable();
            $table->integer('CAJA')->nullable();
            $table->dateTime('FECANULACION')->nullable();
            $table->decimal('GASTOSPRO',10,0)->nullable();
            $table->decimal('ITEM',3,0)->nullable();
            $table->dateTime('FECHA')->nullable();
            $table->integer('TURNO')->nullable();
            $table->string('SEDE',30)->nullable();
            $table->float('MONTOPROMOCION',8,2)->nullable();
            $table->float('MONTORECARGO',8,2)->nullable();
            $table->float('MONTODSCTO',8,2)->nullable();
            $table->integer('NUM_OPERACION')->nullable();
            $table->float('POR1',8,2)->nullable();
            $table->float('POR2',8,2)->nullable();
            $table->float('POR3',8,2)->nullable();
            $table->string('REPACTAR',1)->nullable();
            $table->integer('CODCUPONERA')->nullable();
            $table->string('OBSESTADO',50)->nullable();
            $table->float('MONTORENEGOCIACION',8,2)->nullable();
            $table->decimal('FOLIOPRORROG',18,0)->nullable();
            $table->decimal('FOLIODEVOL',18,0)->nullable();
            $table->decimal('FOLIOREPACTACION',18,0)->nullable();
            $table->decimal('COD_MOVDOC',18,0)->nullable();
            $table->decimal('FOLIOPAGO',18,0)->nullable();
            $table->decimal('POR4',8,2)->nullable();
            $table->dateTime('FECHATOPE')->nullable();
            $table->string('FACTURABLE',1)->nullable();
            $table->decimal('CTADOCREF',2,0)->nullable();
            $table->decimal('CTADOCNUMREF',10,0)->nullable();
            $table->decimal('CODBANREF',5,0)->nullable();
            $table->integer('TIPOPAGCOND')->nullable();
            $table->dateTime('FECHAENVIO')->nullable();
            $table->dateTime('FECHADEVOLUCION')->nullable();
            $table->integer('NUM_OPERACION2')->nullable();
            $table->integer('NUM_OPERACION3')->nullable();
            $table->dateTime('VCTOORI')->nullable();
            $table->string('CTACTE',50)->nullable();
            $table->string('RUT_GIR',50)->nullable();
            $table->string('NOM_GIRADOR',50)->nullable();
            $table->string('FONO_GIRADOR',50)->nullable();
            $table->decimal('VERSION',2,0)->nullable();
            $table->string('PAC',2)->nullable();
            $table->decimal('LETRA',2,0)->nullable();
            $table->integer('ID_CUOTA')->nullable();
            $table->string('CODALUMNO',30)->nullable();
            $table->decimal('MONEDA_AD',1,0)->nullable();
            $table->decimal('MONTO_AD',12,4)->nullable();
            $table->decimal('SALDO_AD',12,4)->nullable();       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('umas')->dropIfExists('MT_CTADOC');
    }
}

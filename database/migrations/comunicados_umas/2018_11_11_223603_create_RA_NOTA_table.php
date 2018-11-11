<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRANOTATable extends Migration
{

    public function up()
    {
        Schema::connection('umas')->create('RA_NOTA', function (Blueprint $table) {
            $table->decimal('CODSECC',3,0)->nullable();
            $table->string('CODRAMO',20)->nullable();
            $table->string('CODCLI',30)->nullable();
            $table->decimal('ANO',4,0)->nullable();
            $table->decimal('PERIODO',3,0)->nullable();
            $table->string('CODSEDE',30)->nullable();
            $table->string('CODCARR',30)->nullable();
            $table->double('NP',5,1)->nullable();
            $table->double('NE',5,1)->nullable();
            $table->double('NPR',5,1)->nullable();
            $table->double('NER',5,1)->nullable();
            $table->double('NEP',5,1)->nullable();
            $table->double('NERP',5,1)->nullable();
            $table->double('NF',5,1)->nullable();
            $table->double('NFP',5,1)->nullable();
            $table->string('CONVALIDADO',1)->nullable();
            $table->string('ESTADO',2)->nullable();
            $table->string('ULTIMO',1)->nullable();
            $table->float('ASISTENCIA',5,0)->nullable();
            $table->string('OBSERVACIONES',30)->nullable();
            $table->string('GENERICO',30)->nullable();
            $table->string('codres',30)->nullable();
            $table->float('C11',5,1)->nullable();
            $table->float('C12',5,1)->nullable();
            $table->float('C13',5,1)->nullable();
            $table->float('C14',5,1)->nullable();
            $table->float('C15',5,1)->nullable();
            $table->float('P1',5,1)->nullable();
            $table->float('C21',5,1)->nullable();
            $table->float('C22',5,1)->nullable();
            $table->float('C23',5,1)->nullable();
            $table->float('C24',5,1)->nullable();
            $table->float('C25',5,1)->nullable();
            $table->float('P2',5,1)->nullable();
            $table->float('C31',5,1)->nullable();
            $table->float('C32',5,1)->nullable();
            $table->float('C33',5,1)->nullable();
            $table->float('C34',5,1)->nullable();
            $table->float('C35',5,1)->nullable();
            $table->string('TIPOCONVALIDA',1)->nullable();
            $table->string('RAMOEQUIV',20)->nullable();
            $table->float('NFCONTROL',5,1)->nullable();
            $table->float('NEJ',5,1)->nullable();
            $table->float('NCERT1',5,1)->nullable();
            $table->float('NCERT2',5,1)->nullable();
            $table->float('NCERT3',5,1)->nullable();
            $table->float('NCERT4',5,1)->nullable();
            $table->float('NCERT5',5,1)->nullable();
            $table->dateTime('FECMOD')->nullable();
            $table->string('CONCEPTO',2)->nullable();
            $table->integer('VALORE')->nullable();
            $table->integer('VALORD1')->nullable();
            $table->float('NCERT6',5,1)->nullable();
            $table->float('NCERT7',5,1)->nullable();
            $table->float('NCERT8',5,1)->nullable();
            $table->float('NCERT9',5,1)->nullable();
            $table->float('NCERT10',5,1)->nullable();
            $table->string('CONCEPTOEX',2)->nullable();
            $table->string('CONCEPTOEXREP',2)->nullable();
            $table->integer('ESCALA')->nullable();
            $table->integer('TIPO_INSCRIPCION')->nullable();
            $table->string('HOMOLOGADO',30)->nullable();
            $table->float('CODINST',4,0)->nullable();
            $table->float('PROCON',5,1)->nullable();
            $table->float('PROSOL',5,1)->nullable();
            $table->float('PROA',5,1)->nullable();
            $table->float('PRODDD',5,2)->nullable();
            $table->float('Asistencia_fecha',30)->nullable();
            $table->char('otrosramos',1)->nullable();
            $table->string('JUSTNCERT1',1)->nullable();
            $table->string('JUSTNCERT2',1)->nullable();
            $table->string('JUSTNE',1)->nullable();
            $table->string('carrera_conv',100)->nullable();
            $table->integer('PPM')->nullable();
        });
    }

    public function down()
    {
        Schema::connection('umas')->dropIfExists('RA_NOTA');
    }
}

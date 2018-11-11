<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMTALUMNOTable extends Migration
{

    public function up()
    {
        Schema::connection('umas')->create('MT_ALUMNO', function (Blueprint $table) {
            $table->string('CODCLI',30)->nullable();
            $table->string('CODCARPR',30)->nullable();
            $table->string('CODCARPT',30)->nullable();
            $table->string('ESTACAD',30)->nullable();
            $table->string('ESTFINAN',30)->nullable();
            $table->string('ANO',30)->nullable();
            $table->string('BIBLIOTECA',30)->nullable();
            $table->string('CODACAD',10)->nullable();
            $table->string('PERIODO',1)->nullable();
            $table->integer('PONDERADO')->nullable();
            $table->dateTime('FECREG')->nullable();
            $table->string('CODPESTUD',30)->nullable();
            $table->string('ESTFINANOBS',100)->nullable();
            $table->string('CLAVE',8)->nullable();
            $table->integer('PUNTAJE')->nullable();
            $table->integer('ANOPESTUD')->nullable();
            $table->string('USUARIO',8)->nullable();
            $table->dateTime('FECMOD')->nullable();
            $table->string('RUT',30)->nullable();
            $table->string('JORNADA',10)->nullable();
            $table->integer('NIVEL')->nullable();
            $table->string('CAUSALELIM',10)->nullable();
            $table->dateTime('FECING')->nullable();
            $table->integer('PERIODOTIT')->nullable();
            $table->integer('ANOTIT')->nullable();
            $table->integer('ESUDD')->nullable();
            $table->dateTime('FEC_MAT')->nullable();
            $table->string('ANO_MAT',10)->nullable();
            $table->string('PERIODO_MAT',10)->nullable();
            $table->string('MATRICULADO',1)->nullable();
            $table->string('CODSEDE',30)->nullable();
            $table->decimal('TIPOSITU',10,0)->nullable();
            $table->decimal('PAA',3,0)->nullable();
            $table->string('MATRICULABLE',1)->nullable();
            $table->decimal('TIPOSITUPRO',18,0)->nullable();
            $table->string('ESTANIVEL',60)->nullable();
            $table->dateTime('FECHASITU')->nullable();
            $table->string('FOLIO',20)->nullable();
            $table->string('EXPEDIENTE',15)->nullable();
            $table->string('DECRETO',60)->nullable();
            $table->string('NUEVO',1)->nullable();
            $table->string('TIPO_INGRESO',50)->nullable();
            $table->string('ENCDOC',1)->nullable();
            $table->string('PERIODO_ED',1)->nullable();
            $table->string('ANO_ED',50)->nullable();
            $table->integer('NUMMAXPER')->nullable();
            $table->string('ENTREGOTESIS',1)->nullable();
            $table->string('COMBO',10)->nullable();
            $table->integer('FOLIOGRADO')->nullable();
            $table->integer('codseccteo')->nullable();
            $table->integer('ANOSITUPRO')->nullable();
            $table->integer('PERIODOSITUPRO')->nullable();
            $table->integer('REGULTASIGPRO')->nullable();
            $table->integer('PERIODOS')->nullable();
            $table->string('COMBOAUX',1)->nullable();
            $table->string('codcliexterno',30)->nullable();
            $table->integer('PROMEGR')->nullable();
            $table->integer('ANOEGRE')->nullable();
            $table->integer('PERIODOEGRE')->nullable();
            $table->integer('NIVELRANKING')->nullable();
            $table->string('JORNADARANKING',1)->nullable();
            $table->string('MATFRAPLAZO',50)->nullable();
            $table->integer('NUMMAT')->nullable();
            $table->decimal('RANKING',5,4)->nullable();
            $table->integer('POSRANKING')->nullable();
            $table->string('EXPEDIENTEINT',15)->nullable();
            $table->string('FOLIOINT',20)->nullable();
            $table->string('DECRETOINT',60)->nullable();
            $table->integer('ANOTITINT')->nullable();
            $table->integer('PERIODOTITINT')->nullable();
        });
    }

    public function down()
    {
        Schema::connection('umas')->dropIfExists('MT_ALUMNO');
    }

}

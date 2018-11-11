<?php

use Illuminate\Database\Seeder;

class MTALUMNOSeeder extends Seeder
{

    public function run()
    {
        $mtalumno = new \App\MTALUMNO();
        $mtalumno->CODCLI = "20161NICIRE002";
        $mtalumno->CODCARPR = "NICIRE";
        $mtalumno->CODCARPT = "";
        $mtalumno->ESTACAD = "VIGENTE";
        $mtalumno->ESTFINAN = "AL DIA";
        $mtalumno->ANO = "2016";
        $mtalumno->BIBLIOTECA = "N";
        $mtalumno->CODACAD = "";
        $mtalumno->PERIODO = "1";
        $mtalumno->PONDERADO = "";
        $mtalumno->FECREG = "12/12/2017 0:00:00";
        $mtalumno->CODPESTUD = "NICIRE20151";
        $mtalumno->ESTFINANOBS = "";
        $mtalumno->CLAVE = "";
        $mtalumno->PUNTAJE = "";
        $mtalumno->ANOPESTUD = "2018";
        $mtalumno->USUARIO = "3551";
        $mtalumno->FECMOD = "12/12/2017 10:13:00";
        $mtalumno->RUT = "16340395";
        $mtalumno->JORNADA = "V";
        $mtalumno->NIVEL = "1";
        $mtalumno->CAUSALELIM = "";
        $mtalumno->FECING = "";
        $mtalumno->PERIODOTIT = "";
        $mtalumno->ANOTIT = "";
        $mtalumno->ESUDD = "";
        $mtalumno->FEC_MAT = "12/12/2017 0:00:00";
        $mtalumno->ANO_MAT = "2018";
        $mtalumno->PERIODO_MAT = "2";
        $mtalumno->MATRICULADO = "S";
        $mtalumno->CODSEDE = "RE";
        $mtalumno->TIPOSITU = "1";
        $mtalumno->PAA = "";
        $mtalumno->MATRICULABLE = "N";
        $mtalumno->TIPOSITUPRO = "0";
        $mtalumno->ESTANIVEL = "";
        $mtalumno->FECHASITU = "";
        $mtalumno->FOLIO = "";
        $mtalumno->EXPEDIENTE = "";
        $mtalumno->DECRETO = "";
        $mtalumno->NUEVO = "N";
        $mtalumno->TIPO_INGRESO = "";
        $mtalumno->ENCDOC = "";
        $mtalumno->PERIODO_ED = "";
        $mtalumno->ANO_ED = "";
        $mtalumno->NUMMAXPER = "2";
        $mtalumno->ENTREGOTESIS = "";
        $mtalumno->COMBO = "";
        $mtalumno->FOLIOGRADO = "";
        $mtalumno->codseccteo = "";
        $mtalumno->ANOSITUPRO = "";
        $mtalumno->PERIODOSITUPRO = "";
        $mtalumno->REGULTASIGPRO = "";
        $mtalumno->PERIODOS = "";
        $mtalumno->COMBOAUX = "";
        $mtalumno->codcliexterno = "";
        $mtalumno->PROMEGR = "";
        $mtalumno->ANOEGRE = "";
        $mtalumno->PERIODOEGRE = "";
        $mtalumno->NIVELRANKING = "";
        $mtalumno->JORNADARANKING = "";
        $mtalumno->MATFRAPLAZO = "";
        $mtalumno->NUMMAT = "";
        $mtalumno->RANKING = "";
        $mtalumno->POSRANKING = "";
        $mtalumno->EXPEDIENTEINT = "";
        $mtalumno->FOLIOINT = "";
        $mtalumno->DECRETOINT = "";
        $mtalumno->ANOTITINT = "";
        $mtalumno->PERIODOTITINT = "";
        $mtalumno->save();
    }
}

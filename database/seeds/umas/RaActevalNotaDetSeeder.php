<?php

use Illuminate\Database\Seeder;

class RaActevalNotaDetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //hay mas datos para ingresar
        $raactevalnotadet = new \App\RaActevalNotadet();
        $raactevalnotadet->Ano = "2018";
        $raactevalnotadet->Periodo = "1";
        $raactevalnotadet->CodSede = "RE";
        $raactevalnotadet->Codcarr = "IECIRE";
        $raactevalnotadet->CodRamo = "CA401IECIRE";
        $raactevalnotadet->CodSecc = "6";
        $raactevalnotadet->CodCLi = "20161NICIRE002";
        $raactevalnotadet->actividad = "Ejercicios";
        $raactevalnotadet->Linea = "1";
        $raactevalnotadet->Nota = "1";
        $raactevalnotadet->save();
    }
}

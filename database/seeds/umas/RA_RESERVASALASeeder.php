<?php

use Illuminate\Database\Seeder;

class RA_RESERVASALASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //hay mas datos en esta tabla
        $rareservasala = new \App\RaReservaSala();
        $rareservasala->CODSAL = "RE225";
        $rareservasala->CODPROF = "15774789";
        $rareservasala->CODMOD = "13";
        $rareservasala->DIA = "MIERCOLES";
        $rareservasala->CODRAMO = "CA401IECIRE";
        $rareservasala->CODSECC = "6";
        $rareservasala->ANO = "2018";
        $rareservasala->PERIODO = "1";
        $rareservasala->REGIMEN = "2";
        $rareservasala->FECHA = "2018-03-21 00:00:00";
        $rareservasala->TIPO = "HORARIO";
        $rareservasala->CODSEDE = "RE";
        $rareservasala->Glosa = "Reserva Horario";
        $rareservasala->CODCARR = "IECIRE";
        $rareservasala->ESTADO = "V";
        $rareservasala->marcado = "";
        $rareservasala->save();
    }
}

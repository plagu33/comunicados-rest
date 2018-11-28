<?php

use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $carrera = new \App\Carrera();
        $carrera->CODCARR = "NICIRE";
        $carrera->NOMBRE_C = "NIVELACIÓN INTERNA IECI";
        $carrera->save();

        $carrera = new \App\Carrera();
        $carrera->CODCARR = "IECIRE";
        $carrera->NOMBRE_C = "INGENIERÍA EN INFORMÁTICA";
        $carrera->save();

        $carrera = new \App\Carrera();
        $carrera->CODCARR = "IETMRE";
        $carrera->NOMBRE_C = "INGENIERIA EN CONECTIVIDAD Y REDES";
        $carrera->save();

    }
}

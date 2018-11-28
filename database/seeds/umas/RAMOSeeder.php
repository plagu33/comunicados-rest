<?php

use Illuminate\Database\Seeder;

class RAMOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "TP405IECIRE";
        $ramos->NOMBRE = "TALLER DE TITULO II IMPLEMENTACION";
        $ramos->save();

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "CI101IECIREOL";
        $ramos->NOMBRE = "ENSAMBLADO DE EQUIPOS COMPUTACIONALES E INSTALACION DE SISTEMAS OPERATIVOS";
        $ramos->save();

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "CI101IETMRE";
        $ramos->NOMBRE = "ENSAMBLADO DE EQUIPOS COMPUTACIONALES E INSTALACION DE SISTEMAS OPERATIVOS";
        $ramos->save();

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "CI201IECIREOL";
        $ramos->NOMBRE = "ANALISIS E IMPLEMENTACION DE ESTRUCTURAS DE DATOS";
        $ramos->save();

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "CI201IEMORE20141";
        $ramos->NOMBRE = "EDICIÓN DE DIBUJOS ASISTIDO POR COMPUTADOR";
        $ramos->save();

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "CI206NICIRE";
        $ramos->NOMBRE = "TALLER DE DESARROLLO DE APLICACIONES EMPRESARIALES I";
        $ramos->save();

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "CI301NICIRE";
        $ramos->NOMBRE = "ARQUITECTURA DE SOLUCIONES";
        $ramos->save();
    }
}

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

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "TP405NICIRE";
        $ramos->NOMBRE = "TALLER DE TITULO II IMPLEMENTACION";
        $ramos->save();

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "TP401NICIRE";
        $ramos->NOMBRE = "TALLER DE TITULO I PLANIFICACION";
        $ramos->save();

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "EH405NICIRE";
        $ramos->NOMBRE = "INGLES NIVEL CONVERSATIONAL II";
        $ramos->save();

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "CI401NICIRE";
        $ramos->NOMBRE = "GESTION Y EVALUACION DE PROYECTOS INFORMATICOS";
        $ramos->save();

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "CA402NICIRE";
        $ramos->NOMBRE = "HERRAMIENTAS PARA LA AUDITORIA Y SEGURIDAD DE SISTEMAS";
        $ramos->save();

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "TP305NICIRE";
        $ramos->NOMBRE = "TALLER DE DESARROLLO DE APLICACIONES EMPRESARIALES II";
        $ramos->save();

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "EH304NICIRE";
        $ramos->NOMBRE = "INGLES NIVEL CONVERSATIONAL I";
        $ramos->save();

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "CI307NICIRE";
        $ramos->NOMBRE = "PROYECTO DE INGENIERIA DE SOFTWARE";
        $ramos->save();

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "CA306NICIRE";
        $ramos->NOMBRE = "TALLER METODOLOGICO PARA DESARROLLO DE PROYECTOS";
        $ramos->save();

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "CA306NICIRE";
        $ramos->NOMBRE = "TALLER METODOLOGICO PARA DESARROLLO DE PROYECTOS";
        $ramos->save();

        $ramos = new \App\Ramo();
        $ramos->CODRAMO = "CA401NICIRE";
        $ramos->NOMBRE = "GESTION DE PROCESOS DE NEGOCIOS Y ARQUITECTURA DE SERVICIOS";
        $ramos->save();

    }

}

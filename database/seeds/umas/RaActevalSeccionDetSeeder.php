<?php

use Illuminate\Database\Seeder;

class RaActevalSeccionDetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //hay mas para insertar
        $raactevalsecciondet = new \App\RaActEvalSecciondet();
        $raactevalsecciondet->Ano = "2018";
        $raactevalsecciondet->Periodo = "1";
        $raactevalsecciondet->CodSede = "RE";
        $raactevalsecciondet->Codcarr = "IECIRE";
        $raactevalsecciondet->CodRamo = "CA401IECIRE";
        $raactevalsecciondet->CodSecc = "6";
        $raactevalsecciondet->actividad = "Ejercicios";
        $raactevalsecciondet->Linea = "1";
        $raactevalsecciondet->Porcentaje = "50";
        $raactevalsecciondet->FecIngInicial = "";
        $raactevalsecciondet->FecIngFinal = "";
        $raactevalsecciondet->save();
    }
}

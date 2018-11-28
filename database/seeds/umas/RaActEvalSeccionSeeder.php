<?php

use Illuminate\Database\Seeder;

class RaActEvalSeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $raactevalseccion = new \App\RaActEvalSeccion();
        $raactevalseccion->Ano = "2018";
        $raactevalseccion->Periodo = "1";
        $raactevalseccion->CodSede = "RE";
        $raactevalseccion->Codcarr = "IECIRE";
        $raactevalseccion->CodRamo = "CA401IECIRE";
        $raactevalseccion->CodSecc = "6";
        $raactevalseccion->Actividad = "Ejercicios";
        $raactevalseccion->Cantidad = "2";
        $raactevalseccion->Elimina_mas_baja = "NO";
        $raactevalseccion->Posee_recuperativa = "NO";
        $raactevalseccion->Porcentaje = "10";
        $raactevalseccion->Fec_Ini_IngNotas = "";
        $raactevalseccion->Fec_Fin_IngNotas = "";
        $raactevalseccion->Usa_mas_Baja = "NO";
        $raactevalseccion->Usa_Recuperativa = "NO";
        $raactevalseccion->save();
    }
}

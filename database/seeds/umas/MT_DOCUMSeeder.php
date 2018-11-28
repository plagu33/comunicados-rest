<?php

use Illuminate\Database\Seeder;

class MT_DOCUMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mtdocum = new \App\MtDocum();
        $mtdocum->TIPODOC = "4";
        $mtdocum->NOMBRE = "CUOTA PAGARE";
        $mtdocum->VENDIBLE = "N";
        $mtdocum->USUARIO = "ROOT";
        $mtdocum->FECMOD = "2014-09-24 10:10:00";
        $mtdocum->DEFECTO = "N";
        $mtdocum->ABREVIATURA = "CPA";
        $mtdocum->CUENTA = "";
        $mtdocum->ANALISIS = "";
        $mtdocum->PROTESTO = "N";
        $mtdocum->PorCaja = "N";
        $mtdocum->Flujo = "2";
        $mtdocum->TIPDOCPROTESTO = "67";
        $mtdocum->DOCRESPALDO = "N";
        $mtdocum->PagoWeb = "SI";
        $mtdocum->CODIGO_ERP = "";
        $mtdocum->protestable = "S";
        $mtdocum->CODIGO_SII = "";
        $mtdocum->VentaReversa = "";
        $mtdocum->VENTACOMPLEMENTARIA = "";
        $mtdocum->GENERAINT = "SI";
        $mtdocum->MONEDA_AD = "";
        $mtdocum->save();
    }
}

<?php

namespace App\Http\Controllers;

use App\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{

    public function getNotas($id)
    {

        $notas = Nota::select("codigo_ramo","nombre_ramo","tipo_nota","porcentaje","nota")->orderBy("nombre_ramo","asc")->orderBy("tipo_nota","asc")->where("usuario_id",$id)->get();

        if (count($notas)>0)
        {
            return response()->json($notas,200);
        }else{
            //esto nunca sucede, ya que el primer mensaje se crea en conjunto con la sala
            //además no esta permitido borrar mensajes
            return response()->json("Sin Notas",200);
        }

    }

}

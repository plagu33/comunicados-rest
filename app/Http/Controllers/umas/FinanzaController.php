<?php

namespace App\Http\Controllers;

use App\Finanza;
use Illuminate\Http\Request;

class FinanzaController extends Controller
{
    /**
     * login
     *
     * @return \Illuminate\Http\Response
     */
    public function ObtenerFinanzas(Request $request,$id)
    {

        if ($request->isMethod('get')) {

            $finanzas = Finanza::where("id_usuario",$id)->get();

            if ($finanzas) {
                return response()->json($finanzas,200);
            }else{
                return response()->json(["status"=>"not found"],200);
            }

        }

    }

}

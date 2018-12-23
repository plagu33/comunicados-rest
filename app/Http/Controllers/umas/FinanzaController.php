<?php

namespace App\Http\Controllers;

use App\Finanza;
use App\UsuarioFirebase;
use Illuminate\Http\Request;

class FinanzaController extends Controller
{
    /**
     * finanzas
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

            //$token = UsuarioFirebase::select("token")->where("usuario_id",$id)->first()['token'];

            //$notify = FcmNotification($title,$body,$token,$actividad);

        }

    }

}

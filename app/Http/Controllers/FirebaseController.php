<?php

namespace App\Http\Controllers;

use App\Finanza;
use App\Usuario;
use App\UsuarioFirebase;
use Illuminate\Http\Request;

class FirebaseController extends Controller
{
    /**
     * save token firebase
     *
     * @return \Illuminate\Http\Response
     */
    public function saveToken(Request $request)
    {

        $usuario_id = $request->input('usuario_id');
        $token = $request->input('token');

        if ($request->isMethod('post')) {

            $usuario_firebase = UsuarioFirebase::where("usuario_id",$usuario_id)->first();

            /*si usuario firebase existe lo actualizamos con el nuevo token, si no existe lo creamos como un nuevo registro*/

            //$usuario_firebase = new Usuario();

            /*$finanzas = Finanza::where("id_usuario",$id)->get();

            if ($finanzas) {
                return response()->json($finanzas,200);
            }else{
                return response()->json(["status"=>"not found"],200);
            }*/

        }

    }

}

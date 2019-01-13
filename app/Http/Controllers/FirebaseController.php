<?php

namespace App\Http\Controllers;

use App\Nota;
use App\Room;
use App\RoomUsuario;
use App\Usuario;
use App\Documento;
use App\UsuarioFirebase;
use Illuminate\Http\Request;

class FirebaseController extends Controller
{

    public function saveToken(Request $request)
    {

        $usuario_id = $request->input('id');
        $token      = $request->input('token');

        if ($request->isMethod('post'))
        {

            $uf = UsuarioFirebase::where("usuario_id",$usuario_id)->first();

            if ($uf == null)
            {

                UsuarioFirebase::where("token",$token)->delete();

                $nuevo_usuario_firebase = new UsuarioFirebase();
                $nuevo_usuario_firebase->usuario_id = $usuario_id;
                $nuevo_usuario_firebase->token = $token;
                $nuevo_usuario_firebase->save();

            }else{

                $actualizar_usuario_firebase = UsuarioFirebase::where("usuario_id",$usuario_id);
                $actualizar_usuario_firebase->update(['token'=>$token]);

            }

        }

        //FcmNotification("New Token","Actualización del Token Firebase",$token);

    }

}

<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * login
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        $rut = $request->input('rut');
        $password = $request->input('password');

        if ($request->isMethod('post')) {

            $usuario = Usuario::where('rut',$rut)->where('contrasena',$password)->first();

            if ($usuario["id_persona"]) {

                if ($usuario) {
                    return response()->json($usuario,200);
                }else{
                    return response()->json(["status"=>"not found"],200);
                }

            }else{

                return response()->json(["status"=>"not found"],200);

            }

        }

    }

}

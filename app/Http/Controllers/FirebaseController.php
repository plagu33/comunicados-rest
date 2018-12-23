<?php

namespace App\Http\Controllers;

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

        $usuario_id = $request->input('id');
        $token      = $request->input('token');

        if ($request->isMethod('post')) {

            $uf = UsuarioFirebase::where("usuario_id",$usuario_id)->first();

            if ($uf == null) {

                $nuevo_usuario_firebase = new UsuarioFirebase();
                $nuevo_usuario_firebase->usuario_id = $usuario_id;
                $nuevo_usuario_firebase->token = $token;
                $nuevo_usuario_firebase->save();

            }else{

                $actualizar_usuario_firebase = UsuarioFirebase::where("usuario_id",$usuario_id);
                $actualizar_usuario_firebase->update(['token'=>$token]);

            }

        }

    }

    public function notificacion()
    {

        //$title,$token
        $fcmUrl   = config("app.fcmurl");
        $fcmtoken = config("app.fcmtoken"); //Legacy server key

        $title = "demo 6";
        $body = "cuerpo del mensajes 666";
        //$token = "ed9g_yrUv2c:APA91bGCgZv4Pdws3BMKEi_lpcYqReuVUnTDBGpY8bmo_WsrtL5WNr0_NtvnGMcdFHWdsZr9jEked9q7g8t2DJMvUy7AVM5xzYoUSYOZ0OpsWuzvdzNdCsUUPys4kxpTgEkt3kTi-qEE";
        $token = "cWRs1vjWNhc:APA91bEZyjvWChIxnY_cMuJh3Gub13qsAKfLzCJQ9QnHR7gjJnIclploVhTQ9QXUcmJ4x9VH4Cv41zNyOEXDN4oh0UjinGP0qi9mx57aNLTGIc_QfO_bBKo3mMSZicNxxUipC_r0gBJv";

        $notification = [
            "title" => $title,
            "body" => $body,
            "android_channel_id" => "1986",
            "sound" => "default",
            "color" => "#ff2933",
            "click_action" => "cl.mmerino.counicados.horario"
        ];

        $extraNotificationData = ["message" => $notification,"datos" =>'data de prueba'];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            'notification' => $notification,
            'data' => $extraNotificationData
        ];

        $headers = [
            'Authorization: key='.$fcmtoken,
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);

        return 1;

    }

}

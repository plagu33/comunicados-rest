<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomUsuario;
use App\Usuario;
use App\UsuarioFirebase;
use Illuminate\Http\Request;

class FirebaseController extends Controller
{
    /**
     * firebase
     *
     * @return \Illuminate\Http\Response
     */
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

        FcmNotification("New Token","Actualización del Token Firebase",$token);

    }

    public function getContactos($id)
    {

        $usuario = Usuario::select("id_perfil")->where("id_usuario",$id)->first();

        if ($usuario["id_perfil"])
        {

            switch ($usuario["id_perfil"])
            {
                case 64: //alumno
                    $contactos = Usuario::where("id_perfil",65)->orderBy("nombre","asc")->get();
                break;
                case 65: //docente
                    $contactos = Usuario::where("id_perfil",64)->orWhere("id_perfil",190)->orderBy("nombre","asc")->get();
                break;
                case 190: //secretaria
                    $contactos = Usuario::where("id_perfil",64)->orWhere("id_perfil",65)->orderBy("nombre","asc")->get();
                break;
            }

            if ( count($contactos)>0 ) {
                return response()->json($contactos,200);
            }else{
                return response()->json(["status"=>"Sin contactos"],200);
            }

        }else{
            return response()->json(["status"=>"Sin contactos"],200);
        }

    }

    public function enviarMensaje(Request $request)
    {

        $id = $request->input("id");
        $destinatario = $request->input("destinatario");
        $mensaje = $request->input("mensaje");

        if ($request->isMethod('post'))
        {

            if (! (Usuario::where("id_usuario",$id)->exists()) || !(Usuario::where("id_usuario",$destinatario)->exists()) )
            {
                return response()->json(["status"=>"usuarios no existen"],200);
            }

            $room = Room::where("id_usuario_inicio",$id)->where("id_usuario_destino",$destinatario)->first();

            if ($room==null)
            {
                $room = Room::where("id_usuario_inicio",$destinatario)->where("id_usuario_destino",$id)->first();

                if($room==null)
                {

                    $room = new Room();
                    $room->id_usuario_inicio = $id;
                    $room->id_usuario_destino = $destinatario;
                    $room->save();

                    $this->enviarMensajedDetalle($id,$room->id,$mensaje,$destinatario);

                }else{

                    //existe conversación
                    $this->enviarMensajedDetalle($id,$room->id,$mensaje,$destinatario);

                }

            }else{

                //existe conversación
                $this->enviarMensajedDetalle($id,$room->id,$mensaje,$destinatario);

            }

        }

    }

    public function enviarMensajedDetalle($id_usuario_envia,$room_id,$mensaje,$destinatario)
    {

        $roomUsuario = new RoomUsuario();
        $roomUsuario->room_id = $room_id;
        $roomUsuario->usuario_id = $id_usuario_envia;
        $roomUsuario->mensaje = $mensaje;
        $roomUsuario->save();

        $n = Usuario::where("id_usuario",$id_usuario_envia)->first();
        $nombre = title_case($n["nombre"]." ".$n["apellido"]);

        $token = UsuarioFirebase::select("token")->where("usuario_id",$destinatario)->first();

        $extra_data = [
            "id" => $id_usuario_envia,
            "nombre" => $nombre,
        ];

        if ($token["token"]!="")
        {
            FcmNotification($nombre,$mensaje,$token["token"],"cl.mmerino.counicados.mensaje",$extra_data);
        }
    }

}

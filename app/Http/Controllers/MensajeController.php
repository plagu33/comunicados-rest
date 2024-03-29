<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomUsuario;
use App\Usuario;
use App\UsuarioFirebase;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
  
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

            if ( count($contactos)>0 )
            {
                return response()->json($contactos,200);
            }else{
                return response()->json(["status"=>"Sin contactos"],200);
            }

        }else{

            return response()->json(["status"=>"Sin contactos"],200);

        }

    }

    public function getContactosConMensajes($id)
    {

        $array = Array();

        $rooms = Room::where("id_usuario_inicio",$id)->orWhere("id_usuario_destino",$id)->get();

        if (count($rooms)>0) 
        {

            foreach ($rooms as $room)
            {

                if( $room["id_usuario_inicio"]!=$id )
                {

                    $id_usuario = $room["id_usuario_inicio"];

                }

                if( $room["id_usuario_destino"]!=$id )
                {

                    $id_usuario = $room["id_usuario_destino"];

                }

                array_push($array,$id_usuario);

            }

            $contactos = Usuario::whereIn("id_usuario",$array)->orderBy("nombre","asc")->get();

            if ( count($contactos)>0 )
            {
                return response()->json($contactos,200);
            }else{
                $arr = array(["nombre"=>"0","apellido"=>"0","rut"=>"0","id_usuario"=>"0","id_persona"=>"0","id_perfil"=>"0"]);
                return response()->json($arr,200);
            }

        }else{
            $arr = array(["nombre"=>"0","apellido"=>"0","rut"=>"0","id_usuario"=>"0","id_persona"=>"0","id_perfil"=>"0"]);
            return response()->json($arr,200);
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
                return response()->json(["status"=>"usuario no existe"],200);
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
            FcmNotification($nombre,$mensaje,$token["token"],"cl.mmerino.comunicados.mensaje",$extra_data);
        }

    }

    public function getMensajes(Request $request)
    {

        $id = $request->input("id");
        $destinatario = $request->input("destinatario");

        $room = Room::where("id_usuario_inicio",$id)->where("id_usuario_destino",$destinatario)->first();

        if ($room==null)
        {

            $room = Room::where("id_usuario_inicio", $destinatario)->where("id_usuario_destino", $id)->first();

            if ($room == null)
            {
                //$arr = ["usuario_id"=>"0","mensaje"=>"0","created_at"=>"0"]; 
                $arr = array(["usuario_id"=>"0","mensaje"=>"0","created_at"=>"0"]);
                return response()->json($arr,200);

            }else{

                $mensajes = $this->getMensajesDetalle($room["id"]);               
                return response()->json($mensajes,200);

            }

        }else{

            $mensajes = $this->getMensajesDetalle($room["id"]);
            return response()->json($mensajes,200);

        }

    }

    public function getMensajesDetalle($room_id)
    {

        if ($room_id>0)
        {

            $mensajes = RoomUsuario::select("usuario_id","mensaje","created_at")->where("room_id",$room_id)->get();
            return $mensajes;

        }else{

            return response()->json("Sin conversaciones",200);

        }

    }

}

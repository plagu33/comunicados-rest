<?php

namespace App\Http\Controllers;

use App\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{

    public function getDocumentos($username)
    {
        //username es rut, tenemos que agregarle antes del ultimo digito un guion
        $documentos = Documento::where("username",$username)->orderBy("nombre_curso","desc")->get();
        
        if(count($documentos)>0)
        {
            return response()->json($documentos,200);
        }else{
            $arr = array(["id"=>"0","username"=>"0","curso_id"=>"0","nombre_curso"=>"0","nombre_actividad"=>"0","nombre_archivo"=>"0","path"=>"0","tipo"=>"0"]);
            return response()->json($arr,200);            
        }

    }

}

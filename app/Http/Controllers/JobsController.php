<?php

namespace App\Http\Controllers;

use App\Finanza;
use App\MtAlumno;
use App\MtCtaDoc;
use App\Nota;
use App\Persona;
use App\RaActevalNotadet;
use App\RaActEvalSecciondet;
use App\Ramo;
use App\RaNota;
use App\NotaTemp;
use App\NotaTemp1;
use App\NotaTemp2;
use App\Usuario;
use App\UsuarioPerfiles;
use App\UsuarioFirebase;
use Carbon\Carbon;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobsController extends Controller
{

    public function GenerateUsers(Persona $p) 
    {

        $personas = $p::with('user');

        Usuario::truncate();

        foreach ($personas->get() as $persona) {

            $perfil = UsuarioPerfiles::where('id_usuario',$persona->user->id_usuario)->first();

            $usuario = New Usuario();
            $usuario->nombre = $persona->pe_nombres;
            $usuario->apellido = $persona->pe_appaterno;
            $usuario->rut = $persona->pe_rut;
            $usuario->id_usuario = $persona->user->id_usuario;
            $usuario->id_persona = $persona->id_persona;
            $usuario->id_perfil = ( @$perfil->id_perfil ) ? $perfil->id_perfil : 0;
            $usuario->usuario = $persona->user->us_consuser;
            $usuario->contrasena = $persona->user->us_password;
            $usuario->save();

        }

        echo now();

    }

    public function GenerateFinanzas() 
    {

        /*
            $new_date = Carbon::createFromFormat("Y-m-d","2018-09-30");
            echo $new_date->format("m");
        */

        $finanzas = MtCtaDoc::select("usuario","ano","cuota","monto","saldo","fecven","estado")->where("estado",2)->get();

        Finanza::truncate();

        foreach ($finanzas as $f) {
            $finanza = new Finanza();
            $finanza->id_usuario = $f->usuario;
            $finanza->ano = $f->ano;
            $finanza->cuota = $f->cuota;
            $finanza->monto = $f->monto;
            $finanza->saldo = $f->saldo;
            $finanza->fecha_vencimiento = $f->fecven;
            $finanza->estado = $f->estado;
            $finanza->save();
        }

        echo now();

    }

    public function GenerateNotas()
    {

        #para que se ejecute, deben haber menos notas en la tabla nota, que las que vienen 
        #del sistema umas

        $this->createTableNotasTemp();

        $alumnos = MtAlumno::select("CODCLI","USUARIO","CODCARPR")->where("ESTACAD","VIGENTE")->get();

        foreach ($alumnos as $alumno)
        {

            $notas = RaNota::select("*")->where("CODCLI",$alumno->CODCLI)->where("CODCARR",$alumno->CODCARPR)->get();

            foreach ($notas as $nota)
            {

                $ramo = Ramo::where("CODRAMO",$nota->RAMOEQUIV)->first();

                $lineas = RaActevalNotadet::where("CodCLi",$nota->CODCLI)->where("CodRamo",$nota->RAMOEQUIV)->get();

                foreach ($lineas as $linea)
                {

                    $ll = RaActEvalSecciondet::where("Codcarr",$linea->Codcarr)
                        ->where("CodRamo",$linea->CodRamo)
                        ->where("CodSecc",$linea->CodSecc)
                        ->where("actividad",$linea->actividad)
                        ->where("Linea",$linea->Linea)->get();

                    foreach ($ll as $l)
                    {

                        $ranota = new NotaTemp();                       
                        $ranota->usuario_id = $alumno->USUARIO;
                        $ranota->nombre_ramo = $ramo->NOMBRE;
                        $ranota->codigo_ramo = $l->CodRamo;
                        $ranota->codigo_carrera = $l->Codcarr;
                        $ranota->tipo_nota = $l->actividad;
                        $ranota->porcentaje = $l->Porcentaje;
                        $ranota->nota = $linea->Nota;
                        $ranota->save();
                        
                        $ranota2 = json_decode($ranota->replicate(),true);
                        NotaTemp2::create($ranota2);
                    }

                }

            }

        }

        Schema::dropIfExists('notaTemp1');
        Schema::rename("nota","notaTemp1"); //respaldo original
        Schema::rename("notaTemp","nota"); //tabla actualizada

        // todo queda en tempNota1 y tempNota2    
        $this->checkNuevasNotas();     

        echo now();

    }

    public function checkNuevasNotas()
    {

        $notasIDS = NotaTemp1::select("usuario_id","codigo_ramo","nombre_ramo")->groupBy("usuario_id")->get();

        foreach( $notasIDS as $n )
        {

            $id_usuario = $n["usuario_id"];
            $codigo_ramo = $n["codigo_ramo"];
            $nombre_ramo = $n["nombre_ramo"];

            $notasOriginal = NotaTemp1::where("usuario_id",$id_usuario)
                                        ->where("codigo_ramo",$codigo_ramo)->count();
            $notasNueva = NotaTemp2::where("usuario_id",$id_usuario)
                                     ->where("codigo_ramo",$codigo_ramo)->count();
            
            if ($notasOriginal<$notasNueva) 
            {

                $user = UsuarioFirebase::where("usuario_id",$id_usuario)->first();
                $token = $user["token"];

                FcmNotification("Nueva calificación",$nombre_ramo,$token,"cl.mmerino.comunicados.notas");                

            }

        }

    }

    public function createTableNotasTemp()
    {

        Schema::dropIfExists('notaTemp');
        Schema::create('notaTemp', function (Blueprint $table) {
            $table->increments('id')->comment("ID incrementable de la tabla");
            $table->string('usuario_id',150)->comment("código de usuario");
            $table->string('nombre_ramo',150)->comment("nombre de ramo");
            $table->string('codigo_ramo',150)->comment("código de ramo");
            $table->string('codigo_carrera',150)->comment("código de carrera");
            $table->string('tipo_nota',50)->comment("tipo de nota, si es ejercicio o solemne1, solemne2, solemne3");
            $table->string('porcentaje',50)->comment("porcentaje que vale la nota");
            $table->double('nota',7,1)->comment("nota");
        });   
        
        Schema::dropIfExists('notaTemp2');
        Schema::create('notaTemp2', function (Blueprint $table) {
            $table->increments('id')->comment("ID incrementable de la tabla");
            $table->string('usuario_id',150)->comment("código de usuario");
            $table->string('nombre_ramo',150)->comment("nombre de ramo");
            $table->string('codigo_ramo',150)->comment("código de ramo");
            $table->string('codigo_carrera',150)->comment("código de carrera");
            $table->string('tipo_nota',50)->comment("tipo de nota, si es ejercicio o solemne1, solemne2, solemne3");
            $table->string('porcentaje',50)->comment("porcentaje que vale la nota");
            $table->double('nota',7,1)->comment("nota");
        });          

    }

}

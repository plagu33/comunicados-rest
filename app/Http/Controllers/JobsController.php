<?php

namespace App\Http\Controllers;

use App\Finanza;
use App\MtAlumno;
use App\MtCtaDoc;
use App\Persona;
use App\RaActevalNotadet;
use App\RaActEvalSeccion;
use App\RaActEvalSecciondet;
use App\Ramo;
use App\RaNota;
use App\Usuario;
use App\UsuarioPerfiles;
use Carbon\Carbon;

class JobsController extends Controller
{

    public function GenerateUsers(Persona $p) {

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

    public function GenerateFinanzas() {

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

    public function GenerateNotas() {

        //$alumnos = MtAlumno::select("CODCLI","CODCARPR","USUARIO","ESTFINAN")->where("ESTACAD","VIGENTE")->get();
        $alumnos = MtAlumno::select("CODCLI","USUARIO")->where("ESTACAD","VIGENTE")->get();

        //importante CODCLI, USUARIO

        //dd($alumnos);

        foreach ($alumnos as $alumno) {

            //echo $alumno->CODCARPR."<br>";

            //$notas = RaNota::select("CODSECC","CODRAMO","NP","NPR","NF","ESTADO","ASISTENCIA")->where("CODCLI",$alumno->CODCLI)->where("CODCARR",$alumno->CODCARPR)->get();

            //dd($notas);

            /*foreach ($notas as $nota) {

                echo $nota->CODRAMO;

                $lineas_ejercicios = RaActEvalSecciondet::where("CodRamo",$nota->CODRAMO)->get();

                dd($lineas_ejercicios);

            }*/

            $lineas = RaActevalNotadet::where("CodCLi",$alumno->CODCLI)->get();

            foreach ($lineas as $linea) {

                /*
                echo $linea->Codcarr."<br>";
                echo $linea->CodRamo."<br>";
                echo $linea->CodSecc."<br>";
                echo $linea->actividad."<br>";
                echo $linea->Linea."<br><br>";
                */

                $ll = RaActEvalSecciondet::where("Codcarr",$linea->Codcarr)
                                        ->where("CodRamo",$linea->CodRamo)
                                        ->where("CodSecc",$linea->CodSecc)
                                        ->where("actividad",$linea->actividad)
                                        ->where("Linea",$linea->Linea)->get();

                foreach ($ll as $l) {

                    //echo $l->CodRamo."<br>";

                    //$ramo = Ramo::where("CODRAMO",$l->CodRamo)->first();

                    echo $l->actividad."-";
                    echo $l->Linea."<br>";
                    echo $l->CodRamo."<br>";
                    //echo $ramo->NOMBRE."<br>";
                    echo $l->Porcentaje."<br>";
                    echo $l->Codcarr."<br>";
                    echo $linea->Nota."<br>";
                    echo $alumno->USUARIO."<br>";

                    echo "-------<br>";

                }

            }

        }

    }

}

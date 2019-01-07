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

    public function GenerateNotas()
    {

        Nota::truncate();

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

                        $ranota = new Nota();
                        $ranota->usuario_id = $alumno->USUARIO;
                        $ranota->nombre_ramo = $ramo->NOMBRE;
                        $ranota->codigo_ramo = $l->CodRamo;
                        $ranota->codigo_carrera = $l->Codcarr;
                        $ranota->tipo_nota = $l->actividad;
                        $ranota->porcentaje = $l->Porcentaje;
                        $ranota->nota = $linea->Nota;
                        $ranota->save();

                    }

                }

            }

        }

        echo now();

    }

}

<?php

namespace App\Http\Controllers;

use App\Finanza;
use App\MtCtaDoc;
use App\Persona;
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

}

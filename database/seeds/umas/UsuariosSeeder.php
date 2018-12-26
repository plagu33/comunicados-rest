<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new \App\Usuarios();
        $usuario->id_usuario = "3425";
        $usuario->id_persona = "3404";
        $usuario->us_consuser = "154684646";
        $usuario->us_password = "111111";
        $usuario->save();

        $usuario = new \App\Usuarios();
        $usuario->id_usuario = "6575";
        $usuario->id_persona = "6554";
        $usuario->us_consuser = "84621355";
        $usuario->us_password = "111111";
        $usuario->save();

        $usuario = new \App\Usuarios();
        $usuario->id_usuario = "4383";
        $usuario->id_persona = "4363";
        $usuario->us_consuser = "95462133";
        $usuario->us_password = "111111";
        $usuario->save();

        $usuario = new \App\Usuarios();
        $usuario->id_usuario = "5668";
        $usuario->id_persona = "5649";
        $usuario->us_consuser = "197845566";
        $usuario->us_password = "111111";
        $usuario->save();

        $usuario = new \App\Usuarios();
        $usuario->id_usuario = "5014";
        $usuario->id_persona = "4995";
        $usuario->us_consuser = "145648879";
        $usuario->us_password = "111111";
        $usuario->save();

        $usuario = new \App\Usuarios();
        $usuario->id_usuario = "3551";
        $usuario->id_persona = "1111";
        $usuario->us_consuser = "163403951";
        $usuario->us_password = "111111";
        $usuario->save();

        $usuario = new \App\Usuarios();
        $usuario->id_usuario = "3552";
        $usuario->id_persona = "2222";
        $usuario->us_consuser = "111111111";
        $usuario->us_password = "111111";
        $usuario->save();

    }
}

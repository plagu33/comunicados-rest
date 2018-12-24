<?php

use Illuminate\Database\Seeder;

class UsuarioPerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarioperfil = new \App\UsuarioPerfiles();
        $usuarioperfil->id_usuarioperfil = "1894";
        $usuarioperfil->id_usuario = "3425";
        $usuarioperfil->id_perfil = "65";
        $usuarioperfil->save();

        $usuarioperfil = new \App\UsuarioPerfiles();
        $usuarioperfil->id_usuarioperfil = "1895";
        $usuarioperfil->id_usuario = "6575";
        $usuarioperfil->id_perfil = "190";
        $usuarioperfil->save();

        $usuarioperfil = new \App\UsuarioPerfiles();
        $usuarioperfil->id_usuarioperfil = "1896";
        $usuarioperfil->id_usuario = "4383";
        $usuarioperfil->id_perfil = "65";
        $usuarioperfil->save();

        $usuarioperfil = new \App\UsuarioPerfiles();
        $usuarioperfil->id_usuarioperfil = "1897";
        $usuarioperfil->id_usuario = "5668";
        $usuarioperfil->id_perfil = "190";
        $usuarioperfil->save();

        $usuarioperfil = new \App\UsuarioPerfiles();
        $usuarioperfil->id_usuarioperfil = "1898";
        $usuarioperfil->id_usuario = "5014";
        $usuarioperfil->id_perfil = "65";
        $usuarioperfil->save();

        $usuarioperfil = new \App\UsuarioPerfiles();
        $usuarioperfil->id_usuarioperfil = "1899";
        $usuarioperfil->id_usuario = "3551";
        $usuarioperfil->id_perfil = "64";
        $usuarioperfil->save();

    }
}

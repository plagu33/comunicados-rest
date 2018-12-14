<?php

use Illuminate\Database\Seeder;

class PerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $perfiles = new \App\Perfiles();
        $perfiles->id_perfil = "64";
        $perfiles->pe_perfil = "Portal Alumnos";
        $perfiles->save();

        $perfiles = new \App\Perfiles();
        $perfiles->id_perfil = "65";
        $perfiles->pe_perfil = "Portal Docente";
        $perfiles->save();

        $perfiles = new \App\Perfiles();
        $perfiles->id_perfil = "190";
        $perfiles->pe_perfil = "SECRETARIA ACADEMICA";
        $perfiles->save();

    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(MTCLIENTSeeder::class);
        $this->call(MTALUMNOSeeder::class);
        $this->call(RANOTASeeder::class);
        $this->call(CarreraSeeder::class);
        $this->call(MT_CTADOCSeeder::class);
        $this->call(MT_DOCUMSeeder::class);
        $this->call(PerfilesSeeder::class);
        $this->call(RA_RESERVASALASeeder::class);
        $this->call(RaActevalNotaDetSeeder::class);
        $this->call(RaActevalSeccionDetSeeder::class);
        $this->call(RaActEvalSeccionSeeder::class);
        $this->call(RAMOSeeder::class);
        $this->call(UsuarioPerfilesSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(PersonaSeeder::class);
    }

}

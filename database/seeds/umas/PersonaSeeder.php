<?php

use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persona = new \App\Persona();
        $persona->id_persona = "3404";
        $persona->pe_nombrecompleto = "alvaro perez diaz";
        $persona->pe_nombres = "alvaro";
        $persona->pe_appaterno = "perez";
        $persona->pe_apmaterno = "diaz";
        $persona->pe_rut = "154684646";
        $persona->save();

        $persona = new \App\Persona();
        $persona->id_persona = "4995";
        $persona->pe_nombrecompleto = "juan torres perez";
        $persona->pe_nombres = "juan";
        $persona->pe_appaterno = "torres";
        $persona->pe_apmaterno = "perez";
        $persona->pe_rut = "145648879";
        $persona->save();

        $persona = new \App\Persona();
        $persona->id_persona = "5649";
        $persona->pe_nombrecompleto = "belen silva serey";
        $persona->pe_nombres = "belen";
        $persona->pe_appaterno = "silva";
        $persona->pe_apmaterno = "serey";
        $persona->pe_rut = "197845566";
        $persona->save();

        $persona = new \App\Persona();
        $persona->id_persona = "4363";
        $persona->pe_nombrecompleto = "claudia silva garrido";
        $persona->pe_nombres = "claudia";
        $persona->pe_appaterno = "silva";
        $persona->pe_apmaterno = "garrido";
        $persona->pe_rut = "95462133";
        $persona->save();

        $persona = new \App\Persona();
        $persona->id_persona = "6554";
        $persona->pe_nombrecompleto = "carla lopez ruiz";
        $persona->pe_nombres = "carla";
        $persona->pe_appaterno = "lopez";
        $persona->pe_apmaterno = "ruiz";
        $persona->pe_rut = "84621355";
        $persona->save();

        $persona = new \App\Persona();
        $persona->id_persona = "1111";
        $persona->pe_nombrecompleto = "Manuel Arturo Meriño Cáceres	";
        $persona->pe_nombres = "Manuel";
        $persona->pe_appaterno = "Meriño";
        $persona->pe_apmaterno = "Cáceres";
        $persona->pe_rut = "163403951";
        $persona->save();

    }
}

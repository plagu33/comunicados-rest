<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    public function toArray($request)
    {

        return [
            'id_persona' => $this->id_persona,
            'nombre' => $this->pe_nombres,
            'apellido' => $this->pe_appaterno,
            'rut' => $this->pe_rut
        ];

    }
}

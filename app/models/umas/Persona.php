<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{

    protected $connection = 'umas';
    protected $table = 'persona';
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\Usuarios','id_persona','id_persona');
    }

}

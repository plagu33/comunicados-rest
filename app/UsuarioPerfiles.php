<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioPerfiles extends Model
{
    protected $connection = 'umas';
    protected $table = 'usuario_perfiles';
    public $timestamps = false;
}

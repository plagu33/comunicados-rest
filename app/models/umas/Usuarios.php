<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{

    protected $connection = 'umas';
    protected $table = 'usuarios';
    public $timestamps = false;

}

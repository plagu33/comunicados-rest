<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtAlumno extends Model
{
    protected $connection = 'umas';
    protected $table = 'MT_ALUMNO';
    public $timestamps = false;
}

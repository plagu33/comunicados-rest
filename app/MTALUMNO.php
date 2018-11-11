<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MTALUMNO extends Model
{
    protected $connection = 'umas';
    protected $table = 'MT_ALUMNO';
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $connection = 'umas';
    protected $table = 'CARRERA';
    public $timestamps = false;
}

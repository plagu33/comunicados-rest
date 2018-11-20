<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaActEvalSeccion extends Model
{
    protected $connection = 'umas';
    protected $table = 'ra_ActEval_Seccion';
    public $timestamps = false;
}

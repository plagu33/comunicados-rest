<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaActevalNotadet extends Model
{
    protected $connection = 'umas';
    protected $table = 'ra_Acteval_Nota_det';
    public $timestamps = false;
}

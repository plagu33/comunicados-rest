<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaReservaSala extends Model
{
    protected $connection = 'umas';
    protected $table = 'RA_RESERVASALA';
    public $timestamps = false;
}

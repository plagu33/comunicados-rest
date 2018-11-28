<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ramo extends Model
{
    protected $connection = 'umas';
    protected $table = 'RAMO';
    public $timestamps = false;
}

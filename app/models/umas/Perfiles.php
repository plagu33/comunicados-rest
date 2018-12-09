<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    protected $connection = 'umas';
    protected $table = 'perfiles';
    public $timestamps = false;

}

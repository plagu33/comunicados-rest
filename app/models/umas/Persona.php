<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $connection = 'umas';
    protected $table = 'persona';
    public $timestamps = false;
}

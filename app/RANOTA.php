<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RANOTA extends Model
{
    protected $connection = 'umas';
    protected $table = 'RA_NOTA';
    public $timestamps = false;
}

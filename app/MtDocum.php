<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtDocum extends Model
{
    protected $connection = 'umas';
    protected $table = 'MT_DOCUM';
    public $timestamps = false;
}

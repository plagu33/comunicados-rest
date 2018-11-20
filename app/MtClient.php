<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtClient extends Model
{
    protected $connection = 'umas';
    protected $table = 'MT_CLIENT';
    public $timestamps = false;
}

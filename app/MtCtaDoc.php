<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtCtaDoc extends Model
{
    protected $connection = 'umas';
    protected $table = 'MT_CTADOC';
    public $timestamps = false;
}

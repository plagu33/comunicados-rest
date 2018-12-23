<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioFirebase extends Model
{

    protected $table = 'usuario_firebase';

    protected $fillable = [
        'usuario_id',
        'token',
    ];

}

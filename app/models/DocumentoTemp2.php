<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentoTemp2 extends Model
{   
    protected $table = 'documentoTemp2';
    public $timestamps = false;

    protected $fillable = [
        'id', 'username', 'curso_id','nombre_curso','nombre_actividad','nombre_archivo','path','tipo',
    ];   

}

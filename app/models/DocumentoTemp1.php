<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentoTemp1 extends Model
{

    protected $table = 'documentoTemp1';
    public $timestamps = false;

    protected $fillable = [
        'id', 'username', 'curso_id','nombre_curso','nombre_actividad','nombre_archivo','path','tipo',
    ];     

}
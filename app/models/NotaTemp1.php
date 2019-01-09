<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotaTemp1 extends Model
{

    protected $table = 'notaTemp1';
    public $timestamps = false;

    protected $fillable = [
        'id', 'usuario_id', 'nombre_ramo','codigo_ramo','codigo_carrera','tipo_nota','porcentaje','nota',
    ];    

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{

    protected $connection = 'umas';
    protected $table = 'usuarios';
    public $timestamps = false;

/*    public function roles()
    {
        return $this
            ->belongsToMany('App\UsuariosPerfiles','App\Perfiles','id_usuario','id_usuario');
    }
*/

}

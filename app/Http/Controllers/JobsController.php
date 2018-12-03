<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;

class JobsController extends Controller
{

    public function GenerateUsers(Persona $p)
    {

        //$personas = $p::with('user')->with('perfil');
        $personas = $p::with('perfil');
        dd($personas->get());

    }

}

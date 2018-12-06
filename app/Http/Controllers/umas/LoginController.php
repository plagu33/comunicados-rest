<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Usuarios;
use Illuminate\Http\Request;
//use App\Http\Resources\User as UserResource;

class LoginController extends Controller
{
    /**
     * Do login
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        $rut = $request->input('rut');
        $password = $request->input('password');

        if ($request->isMethod('post')) {

            $usuario = Usuarios::where('us_consuser',$rut)->where('us_password',$password)->first();

            if ($usuario["id_persona"]) {

                $id_persona = $usuario["id_persona"];
                $persona = Persona::where("id_persona","=",$id_persona)->first();

                if ($persona) {
                    return response()->json($persona,200);
                }else{
                    return response()->json(["status"=>"not found"],200);
                }

            }else{

                return response()->json(["status"=>"not found"],200);

            }

        }

        //return UserResource::collection($persona);
        //return new UserResource($persona);
        //return response()->json("",403);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();
        return UserResource::collection($personas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

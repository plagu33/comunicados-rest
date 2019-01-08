<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

*/

Route::post('login','LoginController@login');
Route::get('finanzas/{id}','FinanzaController@ObtenerFinanzas');
Route::post('firebase/token','FirebaseController@saveToken');

Route::get('chat/getContactos/{id}','FirebaseController@getContactos');
Route::get('chat/getContactosConMensajes/{id}','FirebaseController@getContactosConMensajes');
Route::post('chat/mensaje','FirebaseController@enviarMensaje');
Route::post('chat/getMensajes','FirebaseController@getMensajes');
Route::get('getNotas/{id}','FirebaseController@getNotas');

Route::get('jobusers','JobsController@GenerateUsers');
Route::get('jobfinanzas','JobsController@GenerateFinanzas');
Route::get('jobnotas','JobsController@GenerateNotas');

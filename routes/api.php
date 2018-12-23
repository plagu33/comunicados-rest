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

// get list of tasks
Route::get('tasks','TaskController@index');
// get specific task
Route::get('task/{id}','TaskController@show');
// create new task
Route::post('task','TaskController@store');
// update existing task
Route::put('task','TaskController@store');
// delete a task
Route::delete('task/{id}','TaskController@destroy');
// get list of tasks
//Route::get('demos','DemoController@index');

// create new demo
//Route::post('demo','DemoController@store');

//Route::get('login','LoginController@index'); //no tiene sentido, solo de prueba

*/

Route::post('login','LoginController@login');
Route::get('finanzas/{id}','FinanzaController@ObtenerFinanzas');
Route::post('firebase/token','FirebaseController@saveToken');
Route::get('firebase/notificacion','FirebaseController@notificacion');

Route::get('jobusers','JobsController@GenerateUsers');
Route::get('jobfinanzas','JobsController@GenerateFinanzas');
Route::get('jobnotas','JobsController@GenerateNotas');

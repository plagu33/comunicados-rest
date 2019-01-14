<?php

use Illuminate\Http\Request;

//Login usuario
Route::post('login','LoginController@login');

//Refrescar token firebase
Route::post('firebase/token','FirebaseController@saveToken');

//actividad de chat
Route::get('chat/getContactos/{id}','MensajeController@getContactos');
Route::get('chat/getContactosConMensajes/{id}','MensajeController@getContactosConMensajes');
Route::post('chat/mensaje','MensajeController@enviarMensaje');
Route::post('chat/getMensajes','MensajeController@getMensajes');

//actividad notas
Route::get('getNotas/{id}','NotaController@getNotas');

//actividad finanzas
Route::get('getFinanzas/{id}','FinanzaController@getFinanzas');

//actividad documentos
Route::get('getDocumentos/{id}','DocumentoController@getDocumentos');

//jobs para traer los datos a la db de comunicad@s
Route::get('jobusers','JobsController@GenerateUsers');
Route::get('jobfinanzas','JobsController@GenerateFinanzas');
Route::get('jobnotas','JobsController@GenerateNotas');
Route::get('jobDocumentos','JobsController@GenerateDocumentos'); //pendiente

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Examples
Route::get('mi_primera_funcion',function(){
    return 'Hola mama esta es mi primera linea en Laravel';
});

Route::get('nombre/{nombre}/{apellido?}',function($nombre,$apellido='Noria'){
    return 'Mi nombre es : '.$nombre.' '.$apellido;
});

Route::resource('doctor','doctorController');
Route::resource('hospital','hospitalController');

Route::get('doctor/show/{idDoctor}','doctorController@show');

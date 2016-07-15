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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::post('cliente/obtenerDominio', 'clienteController@obtenerDominio');

// Authentication routes...
Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as' => 'login'
]);
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as' => 'logout'
]);
Route::get('bloqueo', [
    'uses' => 'Auth\AuthController@getLockscreen',
    'as' => 'bloqueito'
]);

// Registration routes...
Route::get('register', [
    'uses' => 'Auth\AuthController@getRegister',
    'as' => 'register'
]);
// Registration routes...
Route::get('register_new', [
    'uses' => 'Auth\AuthController@getRegister',
    'as' => 'register_new'
]);
// Registration routes...
Route::get('bienvenido', [
    'uses' => 'Auth\AuthController@getFinalRegisterScreen',
    'as' => 'bienvenido'
]);
// Registration routes...
Route::get('activacion/{id_user}', [
    'uses' => 'homeController@getActivationScreen',
    'as' => 'activacion'
]);
Route::post('register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/ver_perfil', 'homeController@seeProfile');

    Route::get('textNewTemplate', 'homeController@textNewTemplate');
    Route::get('textNewProspecto', 'prospectosController@textNewProspecto');
    Route::get('mis_prospectos', 'prospectosController@misProspectos');
    Route::get('configura_tu_menu', 'homeController@getConfigurationMenu');

    Route::get('/', [
        'uses' => 'homeController@index',
        'as' => 'home'
    ]);

});
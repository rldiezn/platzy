<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*doctor*/
//post
Route::post('doctor/editarNombre', 'doctorController@editarNombre');
Route::post('doctor/store', 'doctorController@store');
Route::post('doctor/cambiarStatusExperiencia','doctorController@updateStatusExperience');
Route::post('doctor/cambiarStatusEstudio','doctorController@updateStatusEducation');
Route::post('doctor/cambiarStatusCursos','doctorController@updateStatusCourse');
/*Hospital*/
Route::get('hospital/obtenerTodos','hospitalController@getAll');
/*Hospital*/
/*EndDoctor*/

/*Linkedin*/
Route::post('linkedin/crearLinkedin','linkedinController@crearLinkedin');
Route::post('linkedin/editarLinkedin','linkedinController@editarLinkedin');
Route::post('linkedin/eliminarLinkedin','linkedinController@eliminarLinkedin');
Route::post('linkedin/obtenerLinkedin','linkedinController@obtenerLinkedin');
Route::post('linkedin/editarDireccion', 'linkedinController@editarDireccion');
Route::post('linkedin/editarExtracto', 'linkedinController@editarExtracto');
Route::post('linkedin/editarCV', 'linkedinController@editarCV');
Route::post('linkedin/editarImgProfile', 'linkedinController@editarImgProfile');
Route::post('linkedin/editarImgBanner', 'linkedinController@editarImgBanner');
/*Experiencia*/
Route::post('experiencia/crearExperiencia','experienceController@crearExperiencia');
Route::post('experiencia/crearExperienciaWeb','experienceController@crearExperienciaWeb');
Route::post('experiencia/editarExperiencia','experienceController@editarExperiencia');
Route::post('experiencia/editarExperienciaWeb','experienceController@editarExperienciaWeb');
Route::post('experiencia/eliminarExperiencia','experienceController@eliminarExperiencia');
Route::post('experiencia/obtenerExperiencia','experienceController@obtenerExperiencia');
Route::post('experiencia/obtenerExperiencias','experienceController@obtenerExperiencias');
/*Estudio*/
Route::post('estudio/crearEstudio','educationController@crearEstudio');
Route::post('estudio/crearEstudioWeb','educationController@crearEstudioWeb');
Route::post('estudio/editarEstudio','educationController@editarEstudio');
Route::post('estudio/editarEstudioWeb','educationController@editarEstudioWeb');
Route::post('estudio/eliminarEstudio','educationController@eliminarEstudio');
Route::post('estudio/obtenerEstudio','educationController@obtenerEstudio');
Route::post('estudio/obtenerEstudios','educationController@obtenerEstudios');
/*Curso*/
Route::post('curso/crearCurso','courseController@crearCurso');
Route::post('curso/crearCursoWeb','courseController@crearCursoWeb');
Route::post('curso/editarCurso','courseController@editarCurso');
Route::post('curso/editarCursoWeb','courseController@editarCursoWeb');
Route::post('curso/eliminarCurso','courseController@eliminarCurso');
Route::post('curso/obtenerCurso','courseController@obtenerCurso');
Route::post('curso/obtenerCursos','courseController@obtenerCursos');


/*Paciente*/
Route::post('linkedin/editarPerfil','linkedinController@editarPerfil');
Route::post('linkedin/editarDireccionM','linkedinController@editarDireccionM');
Route::post('linkedin/editarDireccionFiscal','linkedinController@editarDireccionFiscal');
Route::post('linkedin/obtenerPerfil','linkedinController@obtenerPerfil');

Route::post('registrar/registraPaciente','doctorController@registroPaciente');

Route::post('paciente/editarNombre', 'pacienteController@editarNombre');
Route::post('paciente/editarInfo', 'pacienteController@editarInfo');
Route::post('paciente/editarDireccionParticular', 'pacienteController@editarDireccionParticular');
Route::post('paciente/editarDireccionFiscal', 'pacienteController@editarDireccionFiscal');
Route::post('paciente/eliminarDireccionFiscal', 'pacienteController@eliminarDireccionFiscal');
Route::post('paciente/editarImgProfile', 'pacienteController@editarImgProfile');
/*endPaciente*/


/* Servicios */
Route::post('servicios/obtenerHospitales','serviciosController@hospitalesServicio');
Route::post('hospitales/obtenerServiciosHosp','hospitalController@serviciosHospital');


/*

    Días hábiles y horarios por doctor

*/
Route::post('labores/laboresDoctor', 'laboresController@laboresDoctor');


/*

    Citas

*/
Route::post('citas/historialCitas', 'laboresController@historialCitas');
Route::post('citas/agendarCita', 'laboresController@agendarCita');
Route::post('citas/editarCita', 'laboresController@editarCita');
Route::post('citas/cancelarCita', 'laboresController@cancelarCita');
Route::post('citas/pagarCita', 'laboresController@pagarCita');
Route::post('citas/confirmarCita', 'laboresController@confirmarCita');
Route::post('citas/reagendarCita', 'laboresController@reagendarCita');

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


// Registration routes...
Route::get('register', [
    'uses' => 'Auth\AuthController@getRegister',
    'as' => 'register'
]);
Route::post('register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/', 'Auth\PasswordController@getReset');
//Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

/*Route::get('account', function(){
    return view('account');
});*/

Route::group(['middleware' => 'auth'], function(){

    Route::get('account', function(){
        return view('account');
    });

    Route::get('/', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    /*Doctor*/
    //get
    Route::get('nuevoDoctor', 'doctorController@create');
    Route::get('doctor/verPerfil/{idDoctor}', 'doctorController@show');
    Route::get('doctor/editarPerfil/{idDoctor}', 'doctorController@showEdit');
    Route::get('doctor/listadoDoctores', 'doctorController@listarDoctores');
    /*Hospital*/
    //get
    Route::get('hospital/listadoHospitales', 'hospitalController@listarHospitales');
    Route::get('hospital/verHospital/{idDoctor}', 'hospitalController@show');
    /*Servicio*/
    //get
    Route::get('servicio/listadoServicios', 'servicioController@listarServicios');
    Route::get('servicio/verServicio/{idServicio}', 'servicioController@show');
    /*Paciente*/
    //get
    Route::get('paciente/verPerfil/{idPaciente}', 'pacienteController@show');
    /*Agenda*/
    Route::get('labores/laboresDoctor/{idDoctor}', 'laboresController@laboresDoctor');

});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

});


Route::group(['prefix' => 'api'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('doctor/obtenerTodos','doctorController@obtenerTodos');
    Route::get('hospital/obtenerTodos','hospitalController@getAll');
    Route::get('servicios/obtenerTodos','serviciosController@getAll');
});
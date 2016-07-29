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
Route::post('doctor/listarDoctoresLimit', 'doctorController@listarDoctoresLimit');
Route::post('doctor/getEspecialidadesOptions', 'doctorController@getEspecialidadesOptions');
Route::post('doctor/obtenerTodosFilter', 'doctorController@obtenerTodosFilter');
Route::post('doctor/nuevoDoctor', 'doctorController@nuevoDoctor');
/*Hospital*/
Route::get('hospital/obtenerTodos','hospitalController@getAll');
Route::post('hospital/editarNombre', 'hospitalController@editarNombre');
Route::post('hospital/editarDireccion', 'hospitalController@editarDireccion');
Route::post('hospital/editarTlfn', 'hospitalController@editarTlfn');
Route::post('hospital/editarTlfnUrgencias', 'hospitalController@editarTlfnUrgencias');
Route::post('hospital/editarDescripcion', 'hospitalController@editarDescripcion');
Route::post('hospital/editarGeolacalizacion', 'hospitalController@editarGeolacalizacion');
Route::post('hospital/editarImgProfile', 'hospitalController@editarImgProfile');
Route::post('hospital/nuevoHospital', 'hospitalController@nuevoHospital');
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
Route::post('servicios/obtenerHospitales','servicioController@hospitalesServicio');
Route::post('hospitales/obtenerServiciosHosp','hospitalController@serviciosHospital');
Route::post('servicio/listarServiciosLimit', 'servicioController@listarServiciosLimit');
Route::post('servicio/editarImgProfile', 'servicioController@editarImgProfile');
Route::post('servicio/editarNombre', 'servicioController@editarNombre');
Route::post('servicio/editarDireccion', 'servicioController@editarDireccion');
Route::post('servicio/editarCuadroMedico', 'servicioController@editarCuadroMedico');
Route::post('servicio/editarHospitalesServicio', 'servicioController@editarHospitalesServicio');
Route::post('servicio/nuevoServicio', 'servicioController@nuevoServicio');

/*Productos*/
Route::post('producto/listarProductosLimit', 'productoController@listarProductosLimit');
/*Asistente*/
Route::post('asistente/guardarAsistente','asistenteDoctorController@guardarAsistente');
Route::post('asistente/editarAsistente','asistenteDoctorController@editarAsistente');
Route::post('asistente/obtenerAsistente','asistenteDoctorController@obtenerAsistente');
Route::post('asistente/obtenerTodos','asistenteDoctorController@obtenerTodos');
Route::post('asistente/asignarDoctor','asistenteDoctorController@asignarDoctor');


/*Flores*/
Route::post('floresRegalos/guardar','floresRegalosController@guardar');
Route::post('floresRegalos/editarCustom','floresRegalosController@editarCustom');
Route::post('floresRegalos/cargarCSV','floresRegalosController@cargarCSV');
/*

    Agenda Doctor

*/

Route::post('agenda/listarPacientes', 'agdoctorController@listarPacientes');
Route::get('agenda/listarPacientes/{idPaciente}', 'agdoctorController@listarPacientes');
Route::post('agenda/expedientePaciente', 'agdoctorController@expedientePaciente');
Route::get('agenda/expedientePaciente/{idPaciente}', 'agdoctorController@expedientePaciente');
Route::post('agenda/detalleCita', 'agdoctorController@detalleCita');
Route::get('agenda/detalleCita/{idPaciente}', 'agdoctorController@detalleCita');

/*

    Días hábiles y horarios por doctor

*/

Route::post('labores/laboresDoctor', 'agdoctorController@laboresDoctor');

/*

    Citas

*/

Route::post('citas/agendarCita', 'agdoctorController@agendarCita');
Route::post('citas/editarCita', 'agdoctorController@editarCita');
Route::post('citas/cancelarCita', 'agdoctorController@cancelarCita');
Route::post('citas/pagarCita', 'agdoctorController@pagarCita');
Route::post('citas/confirmarCita', 'agdoctorController@confirmarCita');
Route::post('citas/reagendarCita', 'agdoctorController@reagendarCita');
Route::post('citas/detalleCita', 'agdoctorController@detalleCitas');
Route::post('citas/obtenerTodas', 'agdoctorController@historialPacientes');
Route::post('citas/obtenerTodasPaciente', 'agdoctorController@historialCitas');
Route::post('citas/obtener_agenda', 'agdoctorController@obtenerCitasCalendar');


Route::post('getadwords', 'HomeController@getAdwords');
Route::post('addWords/saveShow', 'HomeController@saveShow');
Route::post('addWords/saveClick', 'HomeController@saveClick');

//guardar meritocracia
Route::post('meritocracia/guardar', 'pacienteController@guardarMeritocracia');
/***HOSPITAL****/
Route::post('hospital/listarHospitalesLimit', 'hospitalController@listarHospitalesLimit');
/***HOSPITAL****/
Route::post('validarEmail', 'doctorController@validarEmail');


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
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
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
    Route::get('hospital/directorio_medico/{idHospital}', 'hospitalController@listarDoctoresHospitales');
    Route::get('hospital/directorio_servicio/{idHospital}', 'hospitalController@listarServiciosHospitales');
    Route::get('hospital/verHospital/{idDoctor}', 'hospitalController@show');
    Route::get('hospital/editHospital/{idHospital}', 'hospitalController@edit');
    /*Servicio*/
    //get
    Route::get('servicio/listadoServicios', 'servicioController@listarServicios');
    Route::get('servicio/verServicio/{idcatHospital}/{idServicio}', 'servicioController@show');
    Route::get('servicio/editServicio/{idcatHospital}/{idServicio}', 'servicioController@edit');
    Route::get('servicio/verServicioHospital/{idServicio}', 'servicioController@showMainService');
    /*Producto*/
    //get
    Route::get('producto/listadoProductos', 'productoController@listarProductos');
    Route::get('producto/verProducto/{idcatHospital}/{idProducto}', 'productoController@show');
    /*Paciente*/
    //get
    Route::get('paciente/verPerfil/{idPaciente}', 'pacienteController@show');
    /*Agenda*/
    Route::get('labores/laboresDoctor/{idDoctor}', 'agdoctorController@laboresDoctor');
    Route::get('doctor/configurar_agenda/{idDoctor}', 'agdoctorController@configurarAgenda');
    Route::get('labores/laboresDoctorCalendario/{idDoctor}', 'agdoctorController@laboresDoctorCalendario');
    Route::get('citas/historialPacientes/{idDoctor}', 'agdoctorController@historialPacientes');
    Route::get('citas/historialCitas/{idPaciente}', 'agdoctorController@historialCitas');
    Route::get('citas/misCitas/{idPaciente}', 'agdoctorController@citasPaciente');
    Route::get('citas/detalle_cita/{idCita}', 'agdoctorController@detalleCitas');
    Route::get('citas/obtener_agenda/{idCita}', 'agdoctorController@obtenerCitasCalendar');
    /*Flores*/
    Route::get('floresRegalos/editar','floresRegalosController@editar');
    Route::get('floresRegalos/obtener/{idFloresRegalos}','floresRegalosController@obtener');
    Route::get('floresRegalos/obtenerTodos','floresRegalosController@obtenerTodos');

    

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
    Route::get('doctor/obtenerTodos/{idPagina}','doctorController@obtenerTodos');
    Route::get('doctorAsistente/obtenerTodos/{idAsistente}','doctorController@obtenerTodosAsistente');
    Route::get('doctor/buscarDoctores/{tblDoctorName}','doctorController@buscarDoctores');
    Route::get('doctor/buscarDoctores2/{tblDoctorName}','doctorController@buscarDoctores2');
    Route::get('doctor/buscarDoctores3/{tblDoctorName}','doctorController@buscarDoctores3');
    Route::get('doctor/directorioDoctores/{idHospital}/{tblDoctorName}','doctorController@directorioDoctores');
    Route::get('hospital/directorio/{idHospital}/{idPagina}','doctorController@directorioMedico');
    Route::get('hospital/obtenerTodos','hospitalController@getAll');
    Route::get('servicios/obtenerTodos','servicioController@getAll');
    Route::get('servicios/filtrarTodos/{nombreServicio}','servicioController@filtroServicios');
    Route::get('hospitales/obtenerServiciosHosp/{idHospital}','hospitalController@serviciosHospitalLista');
    Route::get('hospital/especialidades/{idHospital}','hospitalController@expecialidadesHospital');
    Route::get('especialidad/{idHospital}/{idEspecialidad}','hospitalController@especialidad');
    /* Servicio Mobile */
    Route::get('servicio/perfil/{idcatHospital}/{idServicio}', 'servicioController@perfilservicio');
    Route::get('usuario/recuperarPassword/{emailUser}', 'linkedinController@recuperarPassword');
    Route::get('citas/confirmaHorario/{idCita}', 'agdoctorController@confirmaHorario');
    Route::post('citas/enviarHorarios', 'agdoctorController@enviarHorarios');
    Route::post('citas/confirmarCita', 'agdoctorController@confirmarCita');
    Route::get('citas/obtenerCalificacion/{idtblCita}', 'agdoctorController@obtenerCalificacion');
    Route::post('citasAsistente/obtenerTodas', 'agdoctorController@historialAsistente');
});
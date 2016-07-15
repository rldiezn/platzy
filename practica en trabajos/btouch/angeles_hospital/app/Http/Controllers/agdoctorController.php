<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\agdoctorModel;

class agdoctorController extends Controller
{

    public function __construct() {

    }

    /*

        Función para obtener listado de pacientes

    */

    public function listarPacientes(Request $request, $id = false) {

        $respuesta = new agdoctorModel();
        
        return $respuesta->listarPacientes($request, $id);

    }

    /*

        Función para obtener expediente por paciente

    */

    public function expedientePaciente(Request $request, $id = false) {

        $respuesta = new agdoctorModel();
        
        return $respuesta->expedientePaciente($request, $id);

    }

    /*

        Función para obtener el detalle de cada cita

    */

    public function detalleCita(Request $request, $id = false) {

        $respuesta = new agdoctorModel();
        
        return $respuesta->detalleCita($request, $id);

    }

    public function laboresDoctor(Request $request, $id = false) {

        $respuesta = new agdoctorModel();

        return $respuesta->horarios($request, $id);

    }

    public function laboresDoctorCalendario(Request $request, $id = false) {

        $respuesta = new agdoctorModel();

        return $respuesta->horariosCalendario($request, $id);

    }

    public function historialCitas(Request $request,$idPaciente=false) {

        $respuesta = new agdoctorModel();
        $labores = $respuesta->historialCitas($request,$idPaciente);

        return $labores;

    }

    public function detalleCitas(Request $request,$idtblcitas=false) {

        $respuesta = new agdoctorModel();
        $labores = $respuesta->detalleCitas($request,$idtblcitas);

        return $labores;

    }

    public function historialPacientes(Request $request) {

        $respuesta = new agdoctorModel();
        $labores = $respuesta->historialPacientes($request);

        return $labores;

    }

    public function historialAsistente(Request $request) {

        $respuesta = new agdoctorModel();
        $labores = $respuesta->historialPacientes($request);

        return $labores;

    }

    public function agendarCita(Request $request) {

        $respuesta = new agdoctorModel();
        $labores = $respuesta->agendarCita($request);

        return $labores;

    }

    public function editarCita(Request $request) {

        $respuesta = new agdoctorModel();
        $labores = $respuesta->editarCita($request);

        return $labores;

    }

    public function cancelarCita(Request $request) {

        $respuesta = new agdoctorModel();
        $labores = $respuesta->cancelarCita($request);

        return $labores;

    }

    public function confirmarCita(Request $request) {

        $respuesta = new agdoctorModel();
        $labores = $respuesta->confirmarCita($request);

        return $labores;

    }

    public function pagarCita(Request $request) {

        $respuesta = new agdoctorModel();
        $labores = $respuesta->pagarCita($request);

        return $labores;

    }

    public function reagendarCita(Request $request) {

        $respuesta = new agdoctorModel();
        $labores = $respuesta->reagendarCita($request);

        return $labores;

    }

    public function obtenerCitasCalendar(Request $request){

        $agdoctorModel = new agdoctorModel();
        $idtblDr = 4;
        $result=$agdoctorModel->obtenerCitasCalendar($idtblDr);
        echo $result;

    }

    public function confirmaHorario($idCita){

        $agdoctorModel = new agdoctorModel();
        $result=$agdoctorModel->confirmaHorario($idCita);
        
        return $result;

    }

    public function enviarHorarios(Request $request){

        $agdoctorModel = new agdoctorModel();
        $result=$agdoctorModel->enviarHorarios($request);
        
        return $result;

    }

    public function obtenerCalificacion($idtblCita){

        $agdoctorModel = new agdoctorModel();
        $result=$agdoctorModel->obtenerCalificacion($idtblCita);
        
        return $result;

    }

    public function cerrarCita(Request $request){

        $agdoctorModel = new agdoctorModel();
        $result=$agdoctorModel->cerrarCita($request);
        
        return $result;

    }

    public function configurarAgenda(Request $request, $id = false) {

        $respuesta = new agdoctorModel();

        return $respuesta->configurarAgenda($request, $id);

    }

    public function citasPaciente(Request $request,$idPaciente=false) {

        $respuesta = new agdoctorModel();
        $labores = $respuesta->citasPaciente($request,$idPaciente);

        return $labores;

    }


}
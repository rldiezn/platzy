<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\laboresModel;

class laboresController extends Controller
{

    public function __construct() {

    }

    public function laboresDoctor(Request $request, $id = false) {

        $respuesta = new laboresModel();
        
        return $respuesta->horarios($request, $id);

    }

    public function historialCitas(Request $request) {
    
        $respuesta = new laboresModel();
        $labores = $respuesta->historialCitas($request);
        
        return $labores;
    
    }

    public function agendarCita(Request $request) {
    
        $respuesta = new laboresModel();
        $labores = $respuesta->agendarCita($request);

        return $labores;
    
    }

    public function editarCita(Request $request) {
    
        $respuesta = new laboresModel();
        $labores = $respuesta->editarCita($request);

        return $labores;
    
    }

    public function cancelarCita(Request $request) {
    
        $respuesta = new laboresModel();
        $labores = $respuesta->cancelarCita($request);

        return $labores;
    
    }

    public function confirmarCita(Request $request) {
    
        $respuesta = new laboresModel();
        $labores = $respuesta->confirmarCita($request);

        return $labores;
    
    }

    public function pagarCita(Request $request) {
    
        $respuesta = new laboresModel();
        $labores = $respuesta->pagarCita($request);

        return $labores;
    
    }

    public function reagendarCita(Request $request) {
    
        $respuesta = new laboresModel();
        $labores = $respuesta->reagendarCita($request);

        return $labores;
    
    }

}
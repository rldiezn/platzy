<?php

namespace App\Http\Controllers;

use App\asistenteDoctorModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class asistenteDoctorController extends Controller
{
    public function guardarAsistente(Request $request){
        $experience = new asistenteDoctorModel();
        $response=$experience->guardarAsistente($request);
        return $response;
    }

    public function editarAsistente(Request $request){
        $experience = new asistenteDoctorModel();
        $response=$experience->editarAsistente($request);
        return $response;
    }

    public function obtenerAsistente(Request $request){
        $experience = new asistenteDoctorModel();
        $response=$experience->obtenerAsistente($request);
        return $response;
    }

    public function obtenerTodos(Request $request){
        $experience = new asistenteDoctorModel();
        $response=$experience->obtenerTodos($request);
        return $response;
    }

    public function asignarDoctor(Request $request){
        $experience = new asistenteDoctorModel();
        $response=$experience->asignarDoctor($request);
        return $response;
    }
    
}

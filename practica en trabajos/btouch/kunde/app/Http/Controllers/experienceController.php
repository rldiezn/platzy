<?php

namespace App\Http\Controllers;

use App\experienceModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class experienceController extends Controller
{
    public function crearExperiencia(Request $request){
        $experience = new experienceModel();
        $response=$experience->guardarExperiencia($request);
        return $response;
    }
    
    public function crearExperienciaWeb(Request $request){
        $experience = new experienceModel();
        $response=$experience->guardarExperienciaWeb($request);
        return $response;
    }

    public function editarExperiencia(Request $request){
        $experience = new experienceModel();
        $response=$experience->editarExperiencia($request);
        return $response;
    }

    public function editarExperienciaWeb(Request $request){
        $experience = new experienceModel();
        $response=$experience->editarExperienciaWeb($request);
        return $response;
    }

    public function eliminarExperiencia(Request $request){
        $experience = new experienceModel();
        $response=$experience->eliminarExperiencia($request);
        return $response;
    }

    public function obtenerExperiencia(Request $request){
        $experience = new experienceModel();
        $response=$experience->obtenerExperiencia($request);
        return $response;
    }

    public function obtenerExperiencias(Request $request){
        $experience = new experienceModel();
        $response=$experience->obtenerExperiencias($request);
        return $response;
    }
    
}

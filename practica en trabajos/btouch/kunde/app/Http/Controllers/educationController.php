<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\educationModel;

class educationController extends Controller
{
    public function crearEstudio(Request $request){
        $education = new educationModel();
        $response=$education->guardarEstudio($request);
        return $response;
    }
    
    public function crearEstudioWeb(Request $request){
        $education = new educationModel();
        $response=$education->guardarEstudioWeb($request);
        return $response;
    }

    public function editarEstudio(Request $request){
        $education = new educationModel();
        $response=$education->editarEstudio($request);
        return $response;
    }

    public function editarEstudioWeb(Request $request){
        $education = new educationModel();
        $response=$education->editarEstudioWeb($request);
        return $response;
    }

    public function eliminarEstudio(Request $request){
        $education = new educationModel();
        $response=$education->eliminarEstudio($request);
        return $response;
    }

    public function obtenerEstudio(Request $request){
        $education = new educationModel();
        $response=$education->obtenerEstudio($request);
        return $response;
    }

    public function obtenerEstudios(Request $request){
        $education = new educationModel();
        $response=$education->obtenerEstudios($request);
        return $response;
    }
}

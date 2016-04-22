<?php

namespace App\Http\Controllers;

use App\linkedinModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class linkedinController extends Controller
{

    public function crearLinkedin(Request $request){
        $linkedin = new linkedinModel();
        $response=$linkedin->guardarLinkedin($request);
        return $response;
    }

    public function editarLinkedin(Request $request){
        $linkedin = new linkedinModel();
        $response=$linkedin->editarLinkedin($request);
        return $response;
    }

    public function eliminarLinkedin(Request $request){
        $linkedin = new linkedinModel();
        $response=$linkedin->eliminarLinkedin($request);
        return $response;
    }

    public function obtenerLinkedin(Request $request){
        $linkedin = new linkedinModel();
        $response=$linkedin->obtenerLinkedin($request);
        return $response;
    }

    public function editarDireccion(Request $request){
        $linkedin = new linkedinModel();
        $response=$linkedin->editarDireccion($request);
        return  $response;
    }

    public function editarExtracto(Request $request){
        $linkedin = new linkedinModel();
        $response=$linkedin->editarExtracto($request);
        return  $response;
    }

    public function editarCV(Request $request){
        $linkedin = new linkedinModel();
        $response=$linkedin->editarCV($request);
        return  $response;
    }

    public function editarImgProfile(Request $request){
        $linkedin = new linkedinModel();
        $response=$linkedin->editarImgProfile($request);
        return  $response;
    }

    public function editarImgBanner(Request $request){
        $linkedin = new linkedinModel();
        $response=$linkedin->editarImgBanner($request);
        return  $response;
    }

    public function obtenerPerfil(Request $request){
        $linkedin = new linkedinModel();
        $response=$linkedin->obtenerPerfil($request);
        return $response;
    }

    public function editarPerfil(Request $request){
        $linkedin = new linkedinModel();
        $response=$linkedin->editarPerfil($request);
        return $response;
    }

    public function editarDireccionM(Request $request){
        $linkedin = new linkedinModel();
        $response=$linkedin->editarDireccionM($request);
        return $response;
    }

    public function editarDireccionFiscal(Request $request){
        $linkedin = new linkedinModel();
        $response=$linkedin->editarDireccionFiscal($request);
        return $response;
    }

}

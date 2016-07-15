<?php

namespace App\Http\Controllers;

use App\socialinModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class socialinController extends Controller
{

    public function crearSocialin(Request $request){
        $linkedin = new socialinModel();
        $response=$linkedin->guardarSocialin($request);
        return $response;
    }

    public function editarSocialin(Request $request){
        $linkedin = new socialinModel();
        $response=$linkedin->editarSocialin($request);
        return $response;
    }

    public function eliminarSocialin(Request $request){
        $linkedin = new socialinModel();
        $response=$linkedin->eliminarSocialin($request);
        return $response;
    }

    public function obtenerSocialin(Request $request){
        $linkedin = new socialinModel();
        $response=$linkedin->obtenerSocialin($request);
        return $response;
    }

    public function editarDireccion(Request $request){
        $linkedin = new socialinModel();
        $response=$linkedin->editarDireccion($request);
        return  $response;
    }

    public function editarExtracto(Request $request){
        $linkedin = new socialinModel();
        $response=$linkedin->editarExtracto($request);
        return  $response;
    }

    public function editarCV(Request $request){
        $linkedin = new socialinModel();
        $response=$linkedin->editarCV($request);
        return  $response;
    }

    public function editarImgProfile(Request $request){
        $linkedin = new socialinModel();
        $response=$linkedin->editarImgProfile($request);
        return  $response;
    }

    public function editarImgBanner(Request $request){
        $linkedin = new socialinModel();
        $response=$linkedin->editarImgBanner($request);
        return  $response;
    }

    public function obtenerPerfil(Request $request){
        $linkedin = new socialinModel();
        $response=$linkedin->obtenerPerfil($request);
        return $response;
    }

    public function editarPerfil(Request $request){
        $linkedin = new socialinModel();
        $response=$linkedin->editarPerfil($request);
        return $response;
    }

    public function editarDireccionM(Request $request){
        $linkedin = new socialinModel();
        $response=$linkedin->editarDireccionM($request);
        return $response;
    }

    public function editarDireccionFiscal(Request $request){
        $linkedin = new socialinModel();
        $response=$linkedin->editarDireccionFiscal($request);
        return $response;
    }

}

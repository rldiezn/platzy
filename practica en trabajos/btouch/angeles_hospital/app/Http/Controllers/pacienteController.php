<?php
/*
 * Btouch Inc
 * Ricardo Diez
 * Angeles Digital
 * */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\linkedinModel;
use App\courseModel;
use App\educationModel;
use App\experienceModel;
use App\doctorModel;
use App\pacienteModel;
use App\menuModel;

class pacienteController extends Controller
{

    public function show($idPaciente)
    {
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $paciente= new pacienteModel();
        $pacienteResult=$paciente->getPaciente($idPaciente);

        $pacienteResult[0]->srcImage=pacienteModel::isImageHere($pacienteResult);
        return view('paciente.show-perfil',['paciente'=>$pacienteResult,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }

    public function editarNombre(Request $request){
        $paciente = new pacienteModel();
        $response=$paciente->editarNombre($request);
        return  $response;
    }

    public function editarInfo(Request $request){
        $paciente = new pacienteModel();
        $response=$paciente->editarInfo($request);
        return  $response;
    }

    public function editarDireccionParticular(Request $request){
        $paciente = new pacienteModel();
        $response=$paciente->editarDireccionParticular($request);
        return  $response;
    }

    public function editarDireccionFiscal(Request $request){
        $paciente = new pacienteModel();
        $response=$paciente->editarDireccionFiscal($request);
        return  $response;
    }

    public function eliminarDireccionFiscal(Request $request){
        $paciente = new pacienteModel();
        $response=$paciente->eliminarDireccionFiscal($request);
        return  $response;
    }

    public function editarImgProfile(Request $request){
        $paciente = new pacienteModel();
        $response=$paciente->editarImgProfile($request);
        return  $response;
    }

    public function guardarMeritocracia(Request $request){
        $paciente = new pacienteModel();
        $response=$paciente->guardarMeritocracia($request);
        return  $response;
    }

}

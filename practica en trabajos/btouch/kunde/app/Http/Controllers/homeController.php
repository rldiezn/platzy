<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\experienceModel;
use Crypt;
use App\educationModel;
use App\courseModel;
use Illuminate\Support\Facades\Auth;
use DB;

class homeController extends Controller
{


    public function __construct()
    {
        /*if(Auth::user()->perfil_confirmado == 0){
            return redirect('bienvenido');
        }*/
    }


    public function index(){
        if(Auth::user()->perfil_confirmado == 0){
            return view('auth/register_end');
        }else{
            return view("home.home-index");
        }
        
    }

    public function seeProfile($idUser=37){
//        echo '<pre>';print_r(Auth::user());exit;
        $idUser=37;
        if(user::find($idUser)!=false){
            DB::statement("SET lc_time_names = 'es_ES'");
            $dataUser= array(
                'infoGeneral'=>user::find($idUser),
                'infoSocialin'=>user::find($idUser)->socialin,
                'infoExperience'=>experienceModel::obtenerExperienciaPorUsuario($idUser),
                'infoEducation'=>educationModel::obtenerEstudiosPorUsuario($idUser),
                'infoCourse'=>courseModel::obtenerCursosPorUsuario($idUser)
            );

//            $doctor['infoLinkedin']['srcImage']=doctorModel::isImageHere($doctor['infoLinkedin']);
//            $doctor['infoLinkedin']['currentExperiences']=$exp->getCurrentExperience($idUser);
//            $doctor['infoLinkedin']['oldExperiences']=$exp->getOldExperience($idUser);

//            echo '<pre>';print_r($dataUser);exit;
            return view('perfil.show',['dataUser'=>$dataUser]);
        }else{//si el usuario no existe
            return redirect()->route('home');
        }
        return view("perfil.show");
    }

    public function textNewTemplate(){
        return view("home.home-index");
    }

    public function textNewProspecto(){
        return view("prospectos.prospectos");
    }

    public function getActivationScreen($id_user){
        $id_user = Crypt::decrypt($id_user);
        $user=User::find($id_user);
        $user->perfil_confirmado=1;
        $user->save();
        return view('auth.activation_form');
    }

    public function getConfigurationMenu(){
        Auth::user()->id;
        return view('auth.menu_config');
    }

}

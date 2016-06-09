<?php

namespace App\Http\Controllers;

use App\linkedinModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use DB;


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

    public function recuperarPassword($emailUser){

        $nuevoPass = $this->nuevoPassword(8);

        $email = DB::table('users')
                 ->where('email', '=', $emailUser)
                 ->update(['password' => bcrypt($nuevoPass)]);

        $to      = $emailUser;
        $subject = 'Ángeles Digital - Recupera tu contraseña';
        $message = 'Tu nueva contraseña es ' . $nuevoPass;
        $headers = 'From: info@hospitalangeles.com' . "\r\n" .
            'Reply-To: info@hospitalangeles.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if(mail($to, $subject, $message, $headers)) {
            $respuesta = 'Se ha enviado tu nueva contraseña a tu correo electrónico';
        } else {
            $respuesta = 'Correo electrónico incorrecto, ingrésalo nuevamente';
        }

        return $nuevoPass;
    }

    public function nuevoPassword($length) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
        $charactersLength = strlen($characters);
        $randomString = '';
        
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;

    }

}

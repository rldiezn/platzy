<?php
/*
 * Btouch Inc
 * Ricardo Diez
 * Angeles Digital
 * */

namespace App\Http\Controllers;

use App\servicioModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\hospitalModel;
use App\menuModel;


class servicioController extends Controller
{

    public function show($idServicio)
    {
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $servicio=new servicioModel();
        $servicioProfile=$servicio->obtenerServicio($idServicio);
        return view('servicio.perfil-servicio',['servicio'=>$servicioProfile,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }


    public function listarServicios(){
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $hospital = new servicioModel();
        $arrayServicios=$hospital->listarServicios();
        return view('servicio.show-all-servicio',['servicios'=>$arrayServicios,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }

    public function getAll()
    {
        return servicioModel::all();
    }

}

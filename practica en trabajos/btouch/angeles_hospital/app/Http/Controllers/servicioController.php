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
use DB;


class servicioController extends Controller
{

    public function show($idcatHospital,$idServicio)
    {
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $servicio=new servicioModel();
        $servicioProfile=$servicio->obtenerServicio($idcatHospital,$idServicio);
        return view('servicio.perfil-servicio',['servicio'=>$servicioProfile,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }

    public function showMainService($idServicio)
    {
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $servicio=new servicioModel();
        $servicioProfile=$servicio->obtenerServicio(false,$idServicio);
        return view('servicio.perfil-servicio-hospital-list',['servicio'=>$servicioProfile,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }

    public function perfilservicio($idcatHospital,$idServicio)
    {
        $servicio=new servicioModel();
        $servicioProfile=$servicio->perfilservicio($idcatHospital,$idServicio);
        return $servicioProfile;
    }


    public function listarServicios(){
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $hospital = new servicioModel();
        $arrayServicios=$hospital->listarServicios();
        return view('servicio.show-all-servicio',['servicios'=>$arrayServicios,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }

    public function listarServiciosLimit(Request $request){
        $servicio=new servicioModel();
        $serviciotable=$servicio->listarServiciosLimit($request);
        return $serviciotable;
    }

    public function getAll()
    {

        $servicios=DB::table('catservicios')
        ->join('tblhospitalesservicios', 'tblhospitalesservicios.idcatservicio', '=', 'catservicios.idcatservicio')
        ->select('catservicios.*', 'tblhospitalesservicios.catserviciodescription', 'tblhospitalesservicios.catservicioimage', 'tblhospitalesservicios.catservicioimagebanner')
        ->distinct()
        ->get();

        return $servicios;

    }

    public function filtroServicios($nombreServicio) {

        $servicios = DB::table('catservicios')
        ->join('tblhospitalesservicios', 'tblhospitalesservicios.idcatservicio', '=', 'catservicios.idcatservicio')
        ->where('catservicios.catservicioname', 'LIKE', "%" . $nombreServicio . "%")
        ->orWhere('catservicios.catMetaDato', 'LIKE', "%" . $nombreServicio . "%")
        ->select('catservicios.*', 'tblhospitalesservicios.catserviciodescription', 'tblhospitalesservicios.catservicioimage', 'tblhospitalesservicios.catservicioimagebanner')
        ->distinct()
        ->get();

        return $servicios;

    }

    public function hospitalesServicio(Request $request)
    {
        $hospitalesServicio = DB::table('catservicios')
            ->join('tblhospitalesservicios', 'catservicios.idcatservicio', '=', 'tblhospitalesservicios.idcatservicio')
            ->join('cathospital', 'tblhospitalesservicios.idcathospital', '=', 'cathospital.idcathospital')
            ->select('cathospital.catHospitalName', 'cathospital.idcathospital', 'catservicios.catservicioname')
            ->where('catservicios.idcatservicio', '=', $request->idcatservicio)
            ->get();

        return $hospitalesServicio;
    }
    
}

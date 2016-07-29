<?php
/*
 * Btouch Inc
 * Ricardo Diez
 * Angeles Digital
 * */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\hospitalModel;
use App\menuModel;
use App\servicioModel;
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
        $hospitalModel = new hospitalModel();
        $hospitales=$hospitalModel->listarHospitales();
        return view('servicio.show-all-servicio',['servicios'=>$arrayServicios,'hospitales'=>$hospitales,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
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
        ->groupBy('catservicios.idcatservicio')
        ->orderBy("catservicios.catservicioname","ASC")
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

    public function edit($idcatHospital,$idServicio)
    {
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $servicio = new servicioModel();
        $servicioProfile=$servicio->obtenerServicio($idcatHospital,$idServicio);
        return view('servicio.edit-perfil-servicio',['servicio'=>$servicioProfile,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }

    public function editarImgProfile(Request $request){

        $service = new servicioModel();
        $response=$service->editarImgProfile($request);
        return  $response;

    }

    public function editarNombre(Request $request){

        $servicio = new servicioModel();
        $response=$servicio->editarNombre($request);
        return  $response;

    }

    public function editarDireccion(Request $request){

        $servicio = new servicioModel();
        $response=$servicio->editarDireccion($request);
        return  $response;

    }

    public function editarCuadroMedico(Request $request){

        $servicio = new servicioModel();
        $response=$servicio->editarCuadroMedico($request);
        return  $response;

    }

    public function editarHospitalesServicio(Request $request){

        $servicio = new servicioModel();
        $response=$servicio->editarHospitalesServicio($request);
        return  $response;

    }

    public function nuevoServicio(Request $request){

        $servicio = new servicioModel();
        $response=$servicio->nuevoServicio($request);
        return  $response;

    }
    
}

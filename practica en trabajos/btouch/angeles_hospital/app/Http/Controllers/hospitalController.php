<?php
/*
 * Btouch Inc
 * Ricardo Diez
 * Angeles Digital 
 * */

namespace App\Http\Controllers;

use App\hospitalModel;
use Illuminate\Http\Request;
use App\menuModel;

use App\Http\Requests;
use DB;

class hospitalController extends Controller
{

    public function __construct()
    {

    }


    public function show($id)
    {
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $hospital=new hospitalModel();
        $hospitalProfile=$hospital->obtenerHospital($id);
        return view('hospital.perfil-hospital',['hospital'=>$hospitalProfile,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }


    public function listarHospitales(){
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $hospital = new hospitalModel();
        $arrayHospitales=$hospital->listarHospitales();
        return view('hospital.show-all-hospital',['hospitales'=>$arrayHospitales,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }

    public function getAll()
    {
        return hospitalModel::all();
    }

    public function serviciosHospital(Request $request)
    {
        $servicios=DB::table('catservicios')
                        ->join('tblhospitalesservicios', 'tblhospitalesservicios.idcatservicio', '=', 'catservicios.idcatservicio')
                        ->join('cathospital', 'cathospital.idcatHospital', '=', 'tblhospitalesservicios.idcathospital')
                        ->where('tblhospitalesservicios.idcathospital','=', $request->idcathospital)
                        /*->select('catservicios.idcatservicio','catservicios.catservicioname','catservicios.catserviciodescription','cathospital.catHospitalName')*/
                        ->get();

        return $servicios;
    }

    public function serviciosHospitalLista($idHospital)
    {
        $servicios=DB::table('catservicios')
                        ->join('tblhospitalesservicios', 'tblhospitalesservicios.idcatservicio', '=', 'catservicios.idcatservicio')
                        ->join('cathospital', 'cathospital.idcatHospital', '=', 'tblhospitalesservicios.idcathospital')
                        ->where('tblhospitalesservicios.idcathospital','=', $idHospital)
                        /*->select('catservicios.idcatservicio','catservicios.catservicioname','catservicios.catserviciodescription','cathospital.catHospitalName')*/
                        ->get();

        return $servicios;
    }

    public function listarHospitalesLimit(Request $request){
        $hospital=new hospitalModel();
        $hospitaltable=$hospital->listarHospitalesLimit($request);
        return $hospitaltable;
    }

    public function expecialidadesHospital($idHospital){
        $especialidadesHosp =new hospitalModel();
        $especialidades=$especialidadesHosp->especialidadByHospital($idHospital);
        return $especialidades;
    }

    public function especialidad($idHospital, $idEspecialidad){
        $especialidadesHosp =new hospitalModel();
        $especialidades=$especialidadesHosp->especialidad($idHospital, $idEspecialidad);
        return $especialidades;
    }


    public function listarDoctoresHospitales($idHospital){
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $hospital=new hospitalModel();
        $hospitalProfile=$hospital->obtenerHospital($idHospital);
        return view('hospital.doctores-por-hospital',['hospital'=>$hospitalProfile,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }

    public function listarServiciosHospitales($idHospital){
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $hospital=new hospitalModel();
        $hospitalProfile=$hospital->obtenerHospital($idHospital);
        return view('hospital.servicios-por-hospital',['hospital'=>$hospitalProfile,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }


    public function edit($id)
    {
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $hospital=new hospitalModel();
        $hospitalProfile=$hospital->obtenerHospital($id);
        return view('hospital.edit-perfil-hospital',['hospital'=>$hospitalProfile,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }

    public function editarNombre(Request $request){

        $hospital = new hospitalModel();
        $response=$hospital->editarNombre($request);
        return  $response;

    }

    public function editarDireccion(Request $request){

        $hospital = new hospitalModel();
        $response=$hospital->editarDireccion($request);
        return  $response;

    }

    public function editarTlfnUrgencias(Request $request){

        $hospital = new hospitalModel();
        $response=$hospital->editarTlfnUrgencias($request);
        return  $response;

    }

    public function editarTlfn(Request $request){

        $hospital = new hospitalModel();
        $response=$hospital->editarTlfn($request);
        return  $response;

    }

    public function editarDescripcion(Request $request){

        $hospital = new hospitalModel();
        $response=$hospital->editarDescripcion($request);
        return  $response;

    }

    public function editarGeolacalizacion(Request $request){

        $hospital = new hospitalModel();
        $response=$hospital->editarGeolacalizacion($request);
        return  $response;

    }

    public function editarImgProfile(Request $request){

        $hospital = new hospitalModel();
        $response=$hospital->editarImgProfile($request);
        return  $response;

    }

    public function nuevoHospital(Request $request){

        $hospital = new hospitalModel();
        $response=$hospital->nuevoHospital($request);
        return  $response;

    }


}

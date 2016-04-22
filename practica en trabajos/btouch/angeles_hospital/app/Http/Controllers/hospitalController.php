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
                        ->select('catservicios.idcatservicio','catservicios.catservicioname','catservicios.catserviciodescription','cathospital.catHospitalName')
                        ->get();

        return $servicios;
    }


}

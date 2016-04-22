<?php

namespace App\Http\Controllers;

use App\serviciosModel;
use Illuminate\Http\Request;
use App\menuModel;
use DB;

use App\Http\Requests;

class serviciosController extends Controller
{

    public function __construct()
    {

    }


    public function show($id)
    {
        $hospital=array();
        return view('hospital.perfil-hospital',['doctor'=>$hospital,'menu'=>$this->arrayMenu]);
    }


    public function listarServicios(){
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $hospital = new serviciosModel();
        $arrayHospitales=$hospital->listarHospitales();
        return view('hospital.show-all-hospital',['hospitales'=>$arrayHospitales,'menu'=>$arrayMenu]);
    }

    public function getAll()
    {
        return serviciosModel::all();
    }


    public function hospitalesServicio(Request $request)
    {
        $hospitalesServicio = DB::table('catservicios')
                              ->join('tblhospitalesservicios', 'catservicios.idcatservicio', '=', 'tblhospitalesservicios.idcatservicio')
                              ->join('cathospital', 'tblhospitalesservicios.idcathospital', '=', 'cathospital.idcathospital')
                              ->select('cathospital.catHospitalName', 'cathospital.idcathospital')
                              ->where('catservicios.idcatservicio', '=', $request->idcatservicio)
                              ->get();

        return $hospitalesServicio;
    }


}

<?php

namespace angelesHospital\Http\Controllers;


use Illuminate\Http\Request;

use angelesHospital\Http\Requests;
use angelesHospital\Http\Controllers\Controller;
use angelesHospital\doctorModel;

class doctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.perfil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = new doctorModel();
        $doctor->guardar($request);
        return 'Ya guardo';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos=doctorModel::find($id)->course;
        echo'<pre>';print_r($datos);
//        return 'Function show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor= array(
            'infoGeneral'=>doctorModel::find($id),
            'infoLinkedin'=>doctorModel::find($id)->linkedin,
            'infoExperience'=>json_decode(doctorModel::find($id)->experience,2),
            'infoEducation'=>json_decode(doctorModel::find($id)->education,2),
            'infoCourse'=>json_decode(doctorModel::find($id)->course,2)
        );

        return view('doctor.editar-perfil',['doctor'=>$doctor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idDoctor)
    {
        $doctor = new doctorModel();
        $doctor->editar($request,$idDoctor);
        return 'Ya guardo';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

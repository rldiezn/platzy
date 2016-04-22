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
use App\menuModel;
use DB;

class doctorController extends Controller
{

    public function __construct()
    {
        /*$menu = new menuModel();
        $this->arrayMenu= $menu->generateMenu();*/

    }

    public function create()
    {
        return view('doctor.perfil');
    }

    public function show($id)
    {
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $exp=new experienceModel();
        if(doctorModel::find($id)!=false){
            $doctor= array(
                'infoGeneral'=>doctorModel::find($id),
                'infoLinkedin'=>doctorModel::find($id)->linkedin,
                'infoExperience'=>json_decode(experienceModel::where('idtblDr', $id)->where('idcatstatus','<>', '4')->orderBy('tblExperienceStartDate', 'desc')->get(),2),
                'infoEducation'=>json_decode(educationModel::where('idtblDr', $id)->where('idcatstatus','<>', '4')->orderBy('tblEducationStartDate', 'desc')->get(),2),
                'infoCourse'=>json_decode(courseModel::where('idtblDr', $id)->where('idcatstatus','<>', '4')->orderBy('tblCoursesDateInit', 'desc')->get(),2)
            );

            $doctor['infoLinkedin']['srcImage']=doctorModel::isImageHere($doctor['infoLinkedin']);
            $doctor['infoLinkedin']['currentExperiences']=$exp->getCurrentExperience($id);
            $doctor['infoLinkedin']['oldExperiences']=$exp->getOldExperience($id);


            return view('doctor.show-perfil',['doctor'=>$doctor,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
        }else{//si el usuario no existe
            return redirect()->route('home');
        }

    }

    public function listarDoctores(){
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $doctor = new doctorModel();
        $arrayDoctores=$doctor->listarDoctores();
        return view('doctor.show-all-doctor',['doctores'=>$arrayDoctores,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }

    public function showEdit($id)
    {
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $exp=new experienceModel();
        $doctor= array(
            'infoGeneral'=>doctorModel::find($id),
            'infoLinkedin'=>doctorModel::find($id)->linkedin,
            'infoExperience'=>json_decode(experienceModel::where('idtblDr', $id)->where('idcatstatus','<>', '4')->orderBy('tblExperienceStartDate', 'desc')->get(),2),
            'infoEducation'=>json_decode(educationModel::where('idtblDr', $id)->where('idcatstatus','<>', '4')->orderBy('tblEducationStartDate', 'desc')->get(),2),
            'infoCourse'=>json_decode(courseModel::where('idtblDr', $id)->where('idcatstatus','<>', '4')->orderBy('tblCoursesDateInit', 'desc')->get(),2)
        );

        $doctor['infoLinkedin']['srcImage']=doctorModel::isImageHere($doctor['infoLinkedin']);
        $doctor['infoLinkedin']['currentExperiences']=$exp->getCurrentExperience($id);
        $doctor['infoLinkedin']['oldExperiences']=$exp->getOldExperience($id);


        return view('doctor.edit-perfil',['doctor'=>$doctor,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }

    public function editarDoctor(Request $request,$idDoctor){
        $doctor = new doctorModel();
        $doctor->editar($request,$idDoctor);
        return  redirect("/doctor/show/$idDoctor");
    }

    public function obtenerTodos(){
        $doctor = new doctorModel();
        $doctores=$doctor->obtenerTodosLosDoctores();
        return $doctores;

    }

    public function editarNombre(Request $request){
        $doctor = new doctorModel();
        $response=$doctor->editarNombre($request);
        return  $response;
    }
    
    public function updateStatusExperience(Request $request){
        $doctor = new doctorModel();
        if($doctor->updateStatusExperience($request->idExperience)){
            echo json_encode(array('success'=>'true'));
        }else{
            echo json_encode(array('success'=>'false'));
        }
    }

    public function updateStatusEducation(Request $request){
        $doctor = new doctorModel();
        $request->idEducation;
        if($doctor->updateStatusEducation($request->idEducation)){
            echo json_encode(array('success'=>'true'));
        }else{
            echo json_encode(array('success'=>'false'));
        }
    }

    public function updateStatusCourse(Request $request){
        $doctor = new doctorModel();
        $request->idCourse;
        if($doctor->updateStatusCourse($request->idCourse)){
            echo json_encode(array('success'=>'true'));
        }else{
            echo json_encode(array('success'=>'false'));
        }
    }

    public function registroPaciente(Request $request)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/

        DB::table('users')->insert(
            ['name' => $request->name,
                'email'=> $request->email,
                'role' => $request->role,
                'password'=> bcrypt($request->password)]
        );

        $insert_id= DB::getPdo()->lastInsertId();

        DB::table('tlbpaciente')->insert(
            ['idtblusers' => $insert_id, 'tblpacientename'=> $request->name,
                'tblpacientepaterno'=> $request->aPaterno,
                'tblpacientematerno'=> $request->aMaterno,
                'tblpacienteemail'=> $request->email,
                'tblpacienterfc'=> $request->rfc]
        );

        $registro_paciente = DB::getPdo()->lastInsertId();

        DB::table('tblcontactopaciente')->insert(
            ['idtblpaciente' => $registro_paciente]
        );

        $registro_contacto = DB::getPdo()->lastInsertId();
        
        return $registro_contacto;
    }

}

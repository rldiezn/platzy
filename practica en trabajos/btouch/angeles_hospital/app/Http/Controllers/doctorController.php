<?php
/*
 * Btouch Inc
 * Ricardo Diez
 * Angeles Digital
 * */

namespace App\Http\Controllers;

use App\hospitalModel;
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
            $doctor['infoGeneral']['hospital']=doctorModel::obtenerDoctor($id);


            return view('doctor.show-perfil',['doctor'=>$doctor,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
        }else{//si el usuario no existe
            return redirect()->route('home');
        }

    }

    public function buscarDoctores2($tblDoctorName){

        $doctores =  DB::table('tbldr')
                ->select('tbldr.*', 'tbllinkedindr.*', 'cathospital.*', DB::raw('CONCAT(tbldr.tblDoctorName, " ", tbldr.tblDoctorPaterno, " ", tbldr.tblDoctorMaterno) AS completar') )
                ->join('tbllinkedindr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
                ->join('cathospital', 'tbldr.cathospital', '=', 'cathospital.catSiglas')
                ->where('tbldr.tblDoctorName', '=', $tblDoctorName)
                ->orWhere('tbldr.tblDoctorName', 'LIKE', "% " . $tblDoctorName)
                ->orWhere('tbldr.tblDoctorPaterno', '=', $tblDoctorName)
                ->orWhere('tbldr.tblDoctorMaterno', '=', $tblDoctorName)
                ->orWhere(DB::raw('CONCAT(tbldr.tblDoctorName, " ", tbldr.tblDoctorPaterno)'), 'LIKE', "%" . $tblDoctorName . "%")
                ->orWhere(DB::raw('CONCAT(tbldr.tblDoctorName, " ", tbldr.tblDoctorPaterno, " ", tbllinkedindr.tblLinkedInDrProfHead)'), 'LIKE', $tblDoctorName . "%")
                ->orWhere(DB::raw('CONCAT(tbldr.tblDoctorPaterno, " ", tbldr.tblDoctorMaterno, " ", tbllinkedindr.tblLinkedInDrProfHead)'), 'LIKE', $tblDoctorName . "%")
                ->orWhere(DB::raw('CONCAT(tbldr.tblDoctorName, " ", tbldr.tblDoctorMaterno, " ", tbllinkedindr.tblLinkedInDrProfHead)'), 'LIKE', $tblDoctorName . "%")
                ->orWhere(DB::raw('CONCAT(tbldr.tblDoctorName, " ", tbllinkedindr.tblLinkedInDrProfHead)'), 'LIKE', $tblDoctorName . "%")
                ->orWhere(DB::raw('CONCAT(tbldr.tblDoctorPaterno, " ", tbllinkedindr.tblLinkedInDrProfHead)'), 'LIKE', $tblDoctorName . "%")
                ->orWhere(DB::raw('CONCAT(tbldr.tblDoctorMaterno, " ", tbllinkedindr.tblLinkedInDrProfHead)'), 'LIKE', $tblDoctorName . "%")
                ->get();

        if(count($doctores) == 0) {

            $doctores = DB::table('tbllinkedindr')
                ->select('tbllinkedindr.tblLinkedInDrProfHead', 'cathospital.cathospitalestado', 'cathospital.cathospitalname', DB::raw('CONCAT(tbllinkedindr.tblLinkedInDrProfHead, " en ", cathospital.cathospitalestado, " en ", cathospital.catHospitalName) AS completar'), 'cathospital.*')
                ->join('cathospital', 'cathospital.catSiglas', '=', 'tbllinkedindr.idcatHospital')
                ->where('tbllinkedindr.tblLinkedInDrProfHead', 'LIKE', $tblDoctorName . "%")
                ->orWhere('cathospital.cathospitalestado', 'LIKE', "%" . $tblDoctorName . "%")
                ->orWhere('cathospital.cathospitalname', 'LIKE', "%" . $tblDoctorName . "%")
                ->groupBy('tbllinkedindr.tblLinkedInDrProfHead')
                ->groupBy('tbllinkedindr.idcatHospital')
                ->orderBy('cathospital.cathospitalestado')
                ->distinct()
                ->get();

            /*$doctores = DB::table('tbldr')
                ->select('tbldr.*', 'tbllinkedindr.*', 'cathospital.*')
                ->join('tbllinkedindr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
                ->join('cathospital', 'tbldr.cathospital', '=', 'cathospital.catSiglas')
                ->where(DB::raw('CONCAT(tbldr.tblDoctorName, " ", tbldr.tblDoctorPaterno, " ", tbldr.tblDoctorMaterno)'), 'REGEXP', str_replace(' ', '|', $tblDoctorName))
                ->orWhere('tbllinkedindr.tblLinkedInDrProfHead', 'LIKE', "%" . $tblDoctorName . "%")
                ->orWhere('cathospital.catHospitalName', 'LIKE', "%" . $tblDoctorName . "%")
                ->get();*/
        }


        return json_encode($doctores);
        //return $prueba;
    }

    public function buscarDoctores($tblDoctorName){
        $doctores = DB::table('tbldr')
                ->select('tbldr.*', 'tbllinkedindr.*', 'cathospital.*', DB::raw('CONCAT(tbllinkedindr.tblLinkedInDrProfHead, " en ", cathospital.cathospitalestado, " en ", cathospital.catHospitalName) AS completar'))
                ->join('tbllinkedindr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
                ->join('cathospital', 'tbldr.cathospital', '=', 'cathospital.catSiglas')
                ->where(DB::raw('CONCAT(tbldr.tblDoctorName, " ", tbldr.tblDoctorPaterno, " ", tbldr.tblDoctorMaterno)'), 'LIKE', "%" . $tblDoctorName . "%")
                //->orWhere(DB::raw('CONCAT(tbllinkedindr.tblLinkedInDrProfHead, " en ", cathospital.cathospitalestado, " en ", cathospital.catHospitalName)'), '=', $tblDoctorName)
                //->orWhere('tbllinkedindr.tblLinkedInDrProfHead', 'LIKE', $tblDoctorName . "%")
                //->orwhere(DB::raw('tbllinkedindr.tblLinkedInDrProfHead'), 'REGEXP', str_replace(' ', '|', $tblDoctorName))
                ->take(50)
                ->get();

        if(count($doctores) == 0) {

            $parametros[0] = '';
            $parametros[1] = '';
            $parametros[2] = '';

            $parametros = explode(' en ', $tblDoctorName);

            if(count($parametros) == 1){
                $parametros[1] = '';
                $parametros[2] = '';
            }

            if(count($parametros) == 2){
                $parametros[2] = '';
            }

            $doctores = DB::table('tbldr')
                ->select('tbldr.*', 'tbllinkedindr.*', 'cathospital.*', DB::raw('CONCAT(tbllinkedindr.tblLinkedInDrProfHead, " en ", cathospital.cathospitalestado, " en ", cathospital.catHospitalName) AS completar'))
                ->join('tbllinkedindr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
                ->join('cathospital', 'tbldr.cathospital', '=', 'cathospital.catSiglas')
                ->where('tbllinkedindr.tblLinkedInDrProfHead', 'LIKE', $parametros[0] . "%")
                ->where('cathospital.cathospitalestado', 'LIKE', $parametros[1])
                ->where('cathospital.cathospitalname', 'LIKE', $parametros[2])
                ->get();

        }


        return json_encode($doctores);
    }

    public function buscarDoctores3($tblDoctorName){
        $doctores = DB::table('tbldr')
                ->select('tbldr.*', 'tbllinkedindr.*', 'cathospital.*', DB::raw('CONCAT(tbldr.tblDoctorName, " ", tbldr.tblDoctorPaterno, " ", tbldr.tblDoctorMaterno) AS completar'))
                ->join('tbllinkedindr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
                ->join('cathospital', 'tbldr.cathospital', '=', 'cathospital.catSiglas')
                ->where(DB::raw('CONCAT(tbldr.tblDoctorName, " ", tbldr.tblDoctorPaterno, " ", tbldr.tblDoctorMaterno)'), 'LIKE', "%" . $tblDoctorName . "%")
                ->orWhere(DB::raw('CONCAT(tbllinkedindr.tblLinkedInDrProfHead, " en ", cathospital.cathospitalestado, " en ", cathospital.catHospitalName)'), '=', $tblDoctorName)
                ->orWhere('tbllinkedindr.tblLinkedInDrProfHead', 'LIKE', $tblDoctorName . "%")
                //->orwhere(DB::raw('tbllinkedindr.tblLinkedInDrProfHead'), 'REGEXP', str_replace(' ', '|', $tblDoctorName))
                ->take(50)
                ->get();

        if(count($doctores) == 0) {

            $parametros = explode(', ', $tblDoctorName);

            if(count($parametros) == 1){
                $parametros[1] = '';
            }

            $doctores = DB::table('tbllinkedindr')
                ->select('tbllinkedindr.tblLinkedInDrProfHead', 'cathospital.cathospitalestado', 'cathospital.cathospitalname', DB::raw('CONCAT(tbllinkedindr.tblLinkedInDrProfHead, " en ", cathospital.cathospitalestado, " en ", cathospital.catHospitalName) AS completar'), 'cathospital.*')
                ->join('cathospital', 'cathospital.catSiglas', '=', 'tbllinkedindr.idcatHospital')
                ->where('tbllinkedindr.tblLinkedInDrProfHead', 'LIKE', "%" . $parametros[1] . "%")
                //->orWhere('cathospital.cathospitalestado', 'LIKE', "%" . $tblDoctorName . "%")
                ->where('cathospital.cathospitalname', 'LIKE', "%" . $parametros[0] . "%")
                ->groupBy('tbllinkedindr.tblLinkedInDrProfHead')
                ->groupBy('tbllinkedindr.idcatHospital')
                ->orderBy('cathospital.cathospitalestado')
                ->distinct()
                ->get();

            /*$doctores = DB::table('tbldr')
                ->select('tbldr.*', 'tbllinkedindr.*', 'cathospital.*')
                ->join('tbllinkedindr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
                ->join('cathospital', 'tbldr.cathospital', '=', 'cathospital.catSiglas')
                ->where(DB::raw('CONCAT(tbldr.tblDoctorName, " ", tbldr.tblDoctorPaterno, " ", tbldr.tblDoctorMaterno)'), 'REGEXP', str_replace(' ', '|', $tblDoctorName))
                ->orWhere('tbllinkedindr.tblLinkedInDrProfHead', 'LIKE', "%" . $tblDoctorName . "%")
                ->orWhere('cathospital.catHospitalName', 'LIKE', "%" . $tblDoctorName . "%")
                ->get();*/
        }


        return json_encode($doctores);
    }

    public function directorioDoctores($idHospital, $tblDoctorName){
        $doctores = DB::table('tbldr')
                ->select('tbldr.*', 'tbllinkedindr.*', 'cathospital.*')
                ->join('tbllinkedindr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
                ->join('cathospital', 'tbldr.cathospital', '=', 'cathospital.catSiglas')
                ->where(DB::raw('CONCAT(tbldr.tblDoctorName, " ", tbldr.tblDoctorPaterno, " ", tbldr.tblDoctorMaterno)'), 'LIKE', "%" . $tblDoctorName . "%")
                ->where('cathospital.idcatHospital', '=', $idHospital)
                ->take(50)
                ->get();

        if(count($doctores) == 0) {
            $doctores = DB::table('tbldr')
                ->select('tbldr.*', 'tbllinkedindr.*', 'cathospital.*')
                ->join('tbllinkedindr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
                ->join('cathospital', 'tbldr.cathospital', '=', 'cathospital.catSiglas')
                ->where(DB::raw('CONCAT(tbldr.tblDoctorName, " ", tbldr.tblDoctorPaterno, " ", tbldr.tblDoctorMaterno)'), 'REGEXP', str_replace(' ', '|', $tblDoctorName))
                ->orWhere('tbllinkedindr.tblLinkedInDrProfHead', 'LIKE', "%" . $tblDoctorName . "%")
                ->where('cathospital.idcatHospital', '=', $idHospital)
                ->take(50)
                ->get();
        }


        return json_encode($doctores);
    }

    public function listarDoctores(){
        $menu = new menuModel();
        $arrayMenu= $menu->generateMenu();
        $isDoctor= $menu->isDoctor();
        $hospital= new hospitalModel();
        $doctor = new doctorModel();
        $arrayDoctores=$doctor->listarDoctores();
        $arrayHospitales=$hospital->listarHospitales();
        $arrayEspecialidades=doctorModel::obtenerEspecialidades();
        return view('doctor.show-all-doctor',['doctores'=>$arrayDoctores,'hospitales'=>$arrayHospitales,'especialidades'=>$arrayEspecialidades,'menu'=>$arrayMenu,'isDoctor'=>$isDoctor]);
    }

    public function listarDoctoresLimit(Request $request){
        $doctor=new doctorModel();

        if(isset($request->hospital) && isset($request->especialidad)){
            $doctortable=$doctor->listarDoctoresLimit($request->rows,$request->limit,$request->hospital,$request->especialidad);
        }else if(isset($request->hospital)){
            $doctortable=$doctor->listarDoctoresLimit($request->rows,$request->limit,$request->hospital);
        }else{
            $doctortable=$doctor->listarDoctoresLimit($request->rows,$request->limit);
        }
        return $doctortable;
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

    public function obtenerTodos($idPagina = false){
        $doctor = new doctorModel();
        $doctores=$doctor->obtenerTodosLosDoctores($idPagina);
        return $doctores;

    }

    public function obtenerTodosAsistente($idAsistente = false){
        $doctor = new doctorModel();
        $doctores=$doctor->obtenerTodosAsistente($idAsistente);
        return $doctores;

    }

    public function directorioMedico($idHospital = false, $idPagina = false){
        $doctor = new doctorModel();
        $doctores=$doctor->directorioMedico($idHospital, $idPagina);
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

    public function getEspecialidadesOptions(Request $request){
        $doctor = new doctorModel();
        $doctor->getEspecialidadesOptions($request);
    }
    
    public function obtenerTodosFilter(Request $request){
        $doctor = new doctorModel();
        $result=$doctor->obtenerTodosFilter($request);
        echo $result;
    }

    public function nuevoDoctor(Request $request){
        $doctor = new doctorModel();
        $result=$doctor->nuevoDoctor($request);
        echo $result;
    }

    public function validarEmail(Request $request){
        $doctor = new doctorModel();
        $result=$doctor->validarEmail($request);
        echo $result;
    }

}

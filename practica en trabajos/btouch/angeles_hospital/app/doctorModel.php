<?php
/*
 * Btouch Inc
 * Ricardo Diez
 * Angeles Digital
 * */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\menuModel;
use DB;
use Response;

class doctorModel extends Model
{
    protected $table = "tbldr";
    protected $primaryKey = "idtblDr";
    protected $fillable = ['tblDoctorName','tblDoctorPaterno','tblDoctorMaterno','tblDoctorCedula','idcatstatus'];
    protected $guarded = ['idtblDr'];
    public $timestamps = false;

    public function linkedin()
    {
        return $this->hasOne('App\linkedinModel','idtblDr','idtblDr');//model,foreign_key,local_key
    }
    public function experience()
    {
        return $this->hasMany('App\experienceModel','idtblDr','idtblDr');//model,foreign_key,local_key
    }
    public function education()
    {
        return $this->hasMany('App\educationModel','idtblDr','idtblDr');//model,foreign_key,local_key
    }
    public function course()
    {
        return $this->hasMany('App\courseModel','idtblDr','idtblDr');//model,foreign_key,local_key
    }

    public function obtenerTodosLosDoctores($idPagina = false){

        if($idPagina == 0) {
            $sumar = 0;
        } else {
            $sumar = 1;
        }

        $doctores = DB::table('tbldr')
                ->join('tbllinkedindr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
                ->join('cathospital', 'tbldr.cathospital', '=', 'cathospital.catSiglas')
                ->having('tbldr.idtbldr', '>', (10 * $idPagina) + $sumar)
                ->take(10)
                ->get();


        return json_encode($doctores);
    }

    public function directorioMedico($idHospital = false, $idPagina = false){

        if($idPagina == 0) {
            $sumar = 0;
        } else {
            $sumar = 1;
        }


        $doctores = DB::table('tbldr')
                ->join('tbllinkedindr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
                ->join('cathospital', 'tbldr.cathospital', '=', 'cathospital.catSiglas')
                ->where('cathospital.idcathospital','=', $idHospital)
                ->having('tbldr.idtbldr', '>', (10 * $idPagina) + $sumar)
                ->take(10)
                ->get();


        return json_encode($doctores);
    }

    public function listarDoctores($rows=50,$limit=0){

        $menu = new menuModel();
        $isDoctor= $menu->isDoctor();
        
        if($isDoctor['isDoctor']){
            $datos = DB::table('tbldr')
                ->join('tbllinkedindr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
                ->join('cathospital', 'cathospital.catSiglas', '=', 'tbldr.cathospital')
                ->where('tbldr.idtblDr','<>',$isDoctor['usuario']['id_usuario'])
                ->orderby('tbldr.tblDoctorName','asc')
                ->take($rows)
                ->skip($limit)
                ->get();
        }else{
            $datos = DB::table('tbldr')
                ->join('tbllinkedindr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
                ->join('cathospital', 'cathospital.catSiglas', '=', 'tbldr.cathospital')
                ->orderby('tbldr.tblDoctorName','asc')
                ->take($rows)
                ->skip($limit)
                ->get();
        }

        $datos = json_encode($datos);
        $arrayDoctores=json_decode($datos,2);
        $fileSystem = new Filesystem();

        foreach($arrayDoctores as $ind=>$aDoctores){
            if($aDoctores['tblLinkedInDrImg']==""){
                $arrayDoctores[$ind]['srcImage']='/img/contacto_foto.jpg';
            }else if(!$fileSystem->exists("upload/doctores/$aDoctores[idtblDr]/profile_img/".$aDoctores['tblLinkedInDrImg'])){
                $arrayDoctores[$ind]['srcImage']='/img/contacto_foto.jpg';
            }else{
                $arrayDoctores[$ind]['srcImage']="/upload/doctores/$aDoctores[idtblDr]/profile_img/".$aDoctores['tblLinkedInDrImg'];
            }
        }

        foreach($arrayDoctores as $ind=>$aDoc){
//            $arrayDoctores[$ind]['modalAgenda']=($isDoctor['isDoctor'])?view('agenda.agenda-doctor-modal')->with('isDoctor',$isDoctor)->with('doctor',$aDoc):view('agenda.agenda-patient-modal')->with('isDoctor',$isDoctor)->with('doctor',$aDoc);
            $alertas = DB::table('catalertas')->get();            
            $arrayDoctores[$ind]['modalAgenda']=view('agenda.agenda-patient-modal')->with('isDoctor',$isDoctor)->with('doctor',$aDoc)->with('alertas',$alertas);
        }

        return $arrayDoctores;
    }

    public function listarDoctoresLimit($rows=50,$limit=0){

        $menu = new menuModel();
        $isDoctor= $menu->isDoctor();

        if($isDoctor['isDoctor']){
            $datos = DB::table('tbldr')
                ->join('tbllinkedindr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
                ->join('cathospital', 'cathospital.catSiglas', '=', 'tbldr.cathospital')
                ->where('tbldr.idtblDr','<>',$isDoctor['usuario']['id_usuario'])
                ->orderby('tbldr.tblDoctorName','asc')
                ->take($rows)
                ->skip($limit)
                ->get();
            $datos2 = DB::table('tbldr')
                ->join('tbllinkedindr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
                ->join('cathospital', 'cathospital.catSiglas', '=', 'tbldr.cathospital')
                ->where('tbldr.idtblDr','<>',$isDoctor['usuario']['id_usuario'])
                ->orderby('tbldr.tblDoctorName','asc')
                ->take($rows)
                ->skip(($limit+$rows))
                ->get();
        }else{
            $datos = DB::table('tbldr')
                ->join('tbllinkedindr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
                ->join('cathospital', 'cathospital.catSiglas', '=', 'tbldr.cathospital')
                ->orderby('tbldr.tblDoctorName','asc')
                ->take($rows)
                ->skip($limit)
                ->get();
            $datos2 = DB::table('tbldr')
                ->join('tbllinkedindr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
                ->join('cathospital', 'cathospital.catSiglas', '=', 'tbldr.cathospital')
                ->orderby('tbldr.tblDoctorName','asc')
                ->take($rows)
                ->skip(($limit+$rows))
                ->get();
        }

        $datos = json_encode($datos);
        $datos2 = json_encode($datos2);

        //$datos=$this->obtenerTodosLosDoctores();
        $arrayDoctores=json_decode($datos,2);
        $arrayDoctoresFuture=json_decode($datos2,2);
        $disabled=(count($arrayDoctoresFuture)>0)?0:1;
        $fileSystem = new Filesystem();
        if(count($arrayDoctores)>0){
            foreach($arrayDoctores as $ind=>$aDoctores){
                if($aDoctores['tblLinkedInDrImg']==""){
                    $arrayDoctores[$ind]['srcImage']='/img/contacto_foto.jpg';
                }else if(!$fileSystem->exists("upload/doctores/$aDoctores[idtblDr]/profile_img/".$aDoctores['tblLinkedInDrImg'])){
                    $arrayDoctores[$ind]['srcImage']='/img/contacto_foto.jpg';
                }else{
                    $arrayDoctores[$ind]['srcImage']="/upload/doctores/$aDoctores[idtblDr]/profile_img/".$aDoctores['tblLinkedInDrImg'];
                }
            }

            foreach($arrayDoctores as $ind=>$aDoc){
                $alertas = DB::table('catalertas')->get();
                $arrayDoctores[$ind]['modalAgenda']=($isDoctor['isDoctor'])?view('agenda.agenda-doctor-modal')->with('isDoctor',$isDoctor)->with('doctor',$aDoc)->with('alertas',$alertas)->render():view('agenda.agenda-patient-modal')->with('isDoctor',$isDoctor)->with('doctor',$aDoc)->with('alertas',$alertas)->render();
            }

            $view=view('doctor.rows-doctor',['doctores'=>$arrayDoctores])->render();
            $estado="1";
            $msg="Celdas cargadas correctamente";

        }else{

            $view="";
            $estado="0";
            $msg="No hay mas registros disponibles";
        }

        return json_encode(array("rows"=>$view,"estado"=>$estado,"msg"=>$msg,"disabled"=>$disabled));
    }

    static function isImageHere($doctorLinkedin){

        $fileSystem = new Filesystem();
        $arrayImg= Array();

        if($doctorLinkedin['tblLinkedInDrImg']==""){
            $arrayImg['srcImage']='/img/contacto_foto.jpg';
        }else if(!$fileSystem->exists("upload/doctores/".$doctorLinkedin['idtblDr']."/profile_img/".$doctorLinkedin['tblLinkedInDrImg'])){
            $arrayImg['srcImage']='/img/contacto_foto.jpg';
        }else{
            $arrayImg['srcImage']="/upload/doctores/".$doctorLinkedin['idtblDr']."/profile_img/".$doctorLinkedin['tblLinkedInDrImg'];
        }

        if($doctorLinkedin['tblLinkedInDrBannerImg']==""){
            $arrayImg['srcImageBanner']='';
        }else if(!$fileSystem->exists("upload/doctores/".$doctorLinkedin['idtblDr']."/banner_img/".$doctorLinkedin['tblLinkedInDrBannerImg'])){
            $arrayImg['srcImageBanner']='';
        }else{
            $arrayImg['srcImageBanner']="/upload/doctores/".$doctorLinkedin['idtblDr']."/banner_img/".$doctorLinkedin['tblLinkedInDrBannerImg'];
        }

        if($doctorLinkedin['tblLinkedInDrCV']==""){
            $arrayImg['srcCV']=false;
            $arrayImg['targetCV']='';
            $arrayImg['msgCV']=trans('auth.cv-no-exist');
        }else if(!$fileSystem->exists("upload/doctores/".$doctorLinkedin['idtblDr']."/cv/".$doctorLinkedin['tblLinkedInDrCV'])){
            $arrayImg['srcCV']=false;
            $arrayImg['targetCV']='';
            $arrayImg['msgCV']=trans('auth.cv-no-exist');
        }else{
            $arrayImg['srcCV']="href='/upload/doctores/".$doctorLinkedin['idtblDr']."/cv/".$doctorLinkedin['tblLinkedInDrCV']."'";
            $arrayImg['targetCV']='_blank';
            $arrayImg['msgCV']=trans('auth.cv-exist');
        }

        return $arrayImg;

    }
    
    public function editarNombre($request){

        $doctor = $this->find($request->idtblDr);

        $doctor->tblDoctorName=strtoupper($request->formDataJson['tblDoctorName']);
        $doctor->tblDoctorPaterno=strtoupper($request->formDataJson['tblDoctorPaterno']);
        $doctor->tblDoctorMaterno=strtoupper($request->formDataJson['tblDoctorMaterno']);

        if(!$doctor->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el experiencia','datos'=>$doctor));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Su nombre se ha editado satisfactoriamente','datos'=>$doctor));
        }


    }

    public function updateStatusExperience($idExperience){
        $experience =
            [
                'idcatstatus' => '4'
            ];

        if(experienceModel::where('idtblExperience', '=', $idExperience)->update($experience)){
            return true;
        }else{
            return false;
        }
    }

    public function updateStatusEducation($idEducation){
        $education =
            [
                'idcatstatus' => '4'
            ];

        if(educationModel::where('idtblEducation', '=', $idEducation)->update($education)){
            return true;
        }else{
            return false;
        }

    }

    public function updateStatusCourse($idtblCourses){
        $education =
            [
                'idcatstatus' => '4'
            ];

        if(courseModel::where('idtblCourses', '=', $idtblCourses)->update($education)){
            return true;
        }else{
            return false;
        }

    }

}

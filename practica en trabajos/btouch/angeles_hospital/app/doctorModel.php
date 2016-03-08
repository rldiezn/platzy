<?php

namespace angelesHospital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Input;

class doctorModel extends Model
{
    protected $table = "tbldoctor";
    protected $primaryKey = "idtblDr";
    protected $fillable = ['tblDoctorName'];
    protected $guarded = ['idtblDr'];
    public $timestamps = false;

    public function linkedin()
    {
        return $this->hasOne('angelesHospital\linkedinModel','idtblDr','idtblDr');//model,foreign_key,local_key
    }
    public function experience()
    {
        return $this->hasMany('angelesHospital\experienceModel','idtblDr','idtblDr');//model,foreign_key,local_key
    }
    public function education()
    {
        return $this->hasMany('angelesHospital\educationModel','idtblDr','idtblDr');//model,foreign_key,local_key
    }

    public function guardar($request){

        //inserttblDoctor
        //defino los archivos
        $this->tblDoctorName=$request->inputName;
        $this->save();
        $insert_idDoctor=$this->idtblDr;
        //creo la extructura de carpetas para el doctor
        if(!$this->makeFolders($insert_idDoctor)){
            return false;
        }
        //subir archivos
        $profile_image_doctor = Input::file('profile_image_doctor');
        $CVmedico = Input::file('CVmedico');
        $files=$this->uploadFiles($insert_idDoctor,$profile_image_doctor,$CVmedico);
        if($files==false){
            return false;
        }
        //insertlinkedin
        if(!$this->saveLinkedin($insert_idDoctor,$request,$files['img_profile_name'],$files['cv_name'])){
            echo "Error al Guardar Linkedin";
        }
        //insertexperience
        if(!$this->saveExperience($insert_idDoctor,$request)){
            echo "Error al Guardar experiencia";
        }
        //insertEducation
        if(!$this->saveEducation($insert_idDoctor,$request)){
            echo "Error al Guardar estudios";
        }

        echo  'Vas a guardar O_O';
    }

    public function saveLinkedin($idDoctor,$request,$img_profile_name,$cv_name){
        $linkedin = new linkedinModel(
            [
                'idtblDr' => $idDoctor,
                'tblLinkedInDrProfHead' => $request->inputEspecalizacion,
                'tblLinkedInDrCountry' => 'MEXICO',
                'idcatHospital' => '1',
                'tblLinkedInDrSummary' => $request->inputExtracto,
                'tblLinkedInDrImg' => $img_profile_name,
                'tblLinkedInDrCV' => $cv_name
            ]
        );

        if($this->linkedin()->save($linkedin)){
            return true;
        }else{
            return false;
        }

    }

    public function saveExperience($idDoctor,$request){
        $count_cargo = count($request->cargo);
        if($count_cargo>=2){
            foreach($request->cargo as $ind=>$cargo){
                if($ind > 0){
                    $experience = new experienceModel(
                        [
                            'idtblDr' => $idDoctor,
                            'tblExperienceCompany' => $request->hospital[$ind],
                            'tblExperienceJobTitle' => $cargo,
                            'tblExperienceStartDate' => $request->fechaIngreso[$ind],
                            'tblExperienceEndDate' => $request->fechaFin[$ind],
                            'tblExperienceDescriptionJob' => $request->inputDescripcionCargo[$ind],
                            'tblExperienceLocationJob' => 'HOUSTON, TEXAS',
                            'idcatStatus' => 1,
                            'tblExperienceCurrent' => (isset($request->actual_exp[$ind]))?$request->actual_exp[$ind]:0
                        ]
                    );
                    if(!$this->experience()->save($experience)){
                        return false;
                    }
                }
            }
        }

        return true;
    }

    public function saveEducation($idDoctor,$request){
        $count_carrera = count($request->carrera);
        if($count_carrera>=2){
            foreach($request->carrera as $ind=>$carrera){
                if($ind > 0){
                    $education = new educationModel(
                        [
                            'idtblDr' => $idDoctor,
                            'tblEducationSchool' => $request->universidad[$ind],
                            'tblEducationStartDate' => $request->inputFechaIngresoUniv[$ind],
                            'tblEducationEndDate' => $request->inputFechaFinUniv[$ind],
                            'tblEducationDegree' => 'UNIVERSIDAD',
                            'tblEducationFieldOfStudy' => $carrera,
                            'tblEducationGrade' => 1,
                            'tblEducationDescription' => $request->inputDescripcionCarrera[$ind],
                            'tblEducationCurrent' => (isset($request->actual_est[$ind]))?$request->actual_est[$ind]:0
                        ]
                    );
                    if(!$this->education()->save($education)){
                        return false;
                    }
                }
            }
        }

        return true;
    }

    public function makeFolders($idDoctor){
        $fileSystem = new Filesystem();
        if(!$fileSystem->exists("upload/doctores")){
            if(!$fileSystem->makeDirectory("upload/doctores","0755")){
                return false;
            }
        }
        if(!$fileSystem->exists("upload/doctores/$idDoctor")){
            if(!$fileSystem->makeDirectory("upload/doctores/$idDoctor","0755")){
                return false;
            }
        }
        if(!$fileSystem->exists("upload/doctores/$idDoctor/profile_img")){
            if(!$fileSystem->makeDirectory("upload/doctores/$idDoctor/profile_img","0755")){
                return false;
            }
        }
        if(!$fileSystem->exists("upload/doctores/$idDoctor/cv")){
            if(!$fileSystem->makeDirectory("upload/doctores/$idDoctor/cv","0755")){
                return false;
            }
        }

        return true;
    }

    public function uploadFiles($idDoctor,$img_profile,$cv){
        $fileSystem = new Filesystem();
        //for profile_img
        if($fileSystem->exists("upload/doctores/$idDoctor/profile_img/")){
            $name=date('Ymdhis').'.'.$img_profile->getClientOriginalExtension();
            if(!$img_profile->move("upload/doctores/$idDoctor/profile_img",$name)){
                return false;
            }
        }
        //for cv
        if($fileSystem->exists("upload/doctores/$idDoctor/cv/")){
            $nameCV=date('Ymdhis').'.'.$cv->getClientOriginalExtension();
            if(!$cv->move("upload/doctores/$idDoctor/cv",$nameCV)){
                return false;
            }
        }

        return array('img_profile_name'=>$name,'cv_name'=>$nameCV);

    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;

class educationModel extends Model
{
    protected $table = "tbleducation";
    protected $primaryKey = "idtblEducation";
    protected $fillable = ['idtblDr','tblEducationSchool','tblEducationStartDate','tblEducationEndDate','tblEducationDegree','tblEducationFieldOfStudy','tblEducationGrade','tblEducationDescription','tblEducationCurrent','idcatstatus'];
    protected $guarded = ['idtblEducation'];
    public $timestamps = false;


    public function doctor()
    {
        return $this->belongsTo('App\doctorModel','idtblDr','idtblDr');//model,local_key,parent_key
    }


    public function guardarEstudio($request){

        $this->idtblDr =$request->idtblDr;
        $this->tblEducationSchool =$request->tblEducationSchool;
        $this->tblEducationStartDate =date('Y-m-15',strtotime($request->tblEducationStartDate));
        $this->tblEducationEndDate =date('Y-m-15',strtotime($request->tblEducationEndDate));
        $this->tblEducationFieldOfStudy =$request->tblEducationFieldOfStudy;
        $this->tblEducationDescription =$request->tblEducationDescription;
        $this->idcatstatus = '5';

        if(!$this->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al guardar el estudio'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Estudio guardado satisfactoriamente'));
        }
    }

    public function guardarEstudioWeb($request){

        $this->idtblDr =$request->idtblDr;
        $this->tblEducationSchool =$request->formDataJson['tblEducationSchool'];
        $this->tblEducationStartDate =date('Y-m-15',strtotime($request->formDataJson['tblEducationStartDate']));
        $this->tblEducationEndDate =date('Y-m-15',strtotime($request->formDataJson['tblEducationEndDate']));
        $this->tblEducationDegree ='';
        $this->tblEducationFieldOfStudy =$request->formDataJson['tblEducationFieldOfStudy'];
        $this->tblEducationGrade ='';
        $this->tblEducationDescription =$request->formDataJson['tblEducationDescription'];
        $this->tblEducationCurrent ='N';
        $this->idcatstatus ='5';

        if(!$this->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al guardar el estudio'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Estudio guardado satisfactoriamente'));
        }
    }

    public function editarEstudio($request){

        $education = $this->find($request->idtblEducation);

        $education->idtblDr =$request->idtblDr;
        $education->tblEducationSchool =$request->tblEducationSchool;
        $education->tblEducationStartDate =date('Y-m-15',strtotime($request->tblEducationStartDate));
        $education->tblEducationEndDate =date('Y-m-15',strtotime($request->tblEducationEndDate));
        $education->tblEducationFieldOfStudy =$request->tblEducationFieldOfStudy;
        $education->tblEducationDescription =$request->tblEducationDescription;
        $education->idcatstatus ='5';

        if(!$education->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el estudio'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Estudio se ha editado satisfactoriamente'));
        }
    }

    public function editarEstudioWeb($request){

        $education = $this->find($request->idtblEducation);

        $education->idtblDr =$request->idtblDr;
        $education->tblEducationSchool =$request->formDataJson['tblEducationSchool'];
        $education->tblEducationStartDate =date('Y-m-15',strtotime($request->formDataJson['tblEducationStartDate']));
        $education->tblEducationEndDate =date('Y-m-15',strtotime($request->formDataJson['tblEducationEndDate']));
        $education->tblEducationDegree ='';
        $education->tblEducationFieldOfStudy =$request->formDataJson['tblEducationFieldOfStudy'];
        $education->tblEducationGrade ='';
        $education->tblEducationDescription =$request->formDataJson['tblEducationDescription'];
        $education->tblEducationCurrent ='N';
        $education->idcatstatus ='5';

        if(!$education->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el estudio','datos'=>$education));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Estudio se ha editado satisfactoriamente','datos'=>$education));
        }
    }

    public function eliminarEstudio($request){
        $education = $this->find($request->idtblEducation);
        $education->idcatstatus=4;
        if(!$education->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al editar estudio'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Estudio eliminado satisfactoriamente'));
        }
    }

    public function obtenerEstudio($request){
        $education = $this->find($request->idtblEducation);
        if($education){
            return Response::json(array('success'=>'1','data'=>$education,'msg'=>'Registros obtenidos con exito.'));
        }else{
            return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
        }

    }

    public function obtenerEstudios($request){
        $education= educationModel::where('idtblDr', '=', $request->idtblDr)->where('idcatstatus', '<>', '4')->get();
        if($education){
            return Response::json(array('success'=>'1','data'=>$education,'msg'=>'Registros obtenidos con exito.'));
        }else{
            return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
        }
    }


}

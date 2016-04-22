<?php
/*
 * Btouch Inc
 * Ricardo Diez
 * Angeles Digital
 * */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class experienceModel extends Model
{
    protected $table = "tblexperience";
    protected $primaryKey = "idtblExperience";
    protected $fillable = ['idtblDr','tblExperienceCompany','tblExperienceJobTitle','tblExperienceStartDate','tblExperienceEndDate','tblExperienceDescriptionJob','tblExperienceLocationJob','idcatStatus','tblExperienceCurrent','idcatstatus'];
    protected $guarded = ['idtblExperience'];
    public $timestamps = false;


    public function doctor()
    {
        return $this->belongsTo('App\doctorModel','idtblDr','idtblDr');//model,local_key,parent_key
    }


    public function guardarExperiencia($request){

        $this->idtblDr =$request->idtblDr;
        $this->tblExperienceCompany =$request->tblExperienceCompany;
        $this->tblExperienceJobTitle =$request->tblExperienceJobTitle;
        $this->tblExperienceStartDate = date('Y-m-15',strtotime($request->tblExperienceStartDate));
        $this->tblExperienceEndDate =date('Y-m-15',strtotime($request->tblExperienceEndDate));
        $this->tblExperienceDescriptionJob =$request->tblExperienceDescriptionJob;
        $this->tblExperienceCurrent =$request->tblExperienceCurrent;
        $this->idcatstatus = '5';

        if(!$this->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al guardar el experiencia'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'experiencia guardado satisfactoriamente'));
        }
    }

    public function guardarExperienciaWeb($request){

        $this->idtblDr =$request->idtblDr;
        $this->tblExperienceCompany = $request->formDataJson['tblExperienceCompany'];
        $this->tblExperienceJobTitle = $request->formDataJson['tblExperienceJobTitle'];
        $this->tblExperienceStartDate = date('Y-m-15',strtotime($request->formDataJson['tblExperienceStartDate']));
        $this->tblExperienceEndDate =date('Y-m-15',strtotime($request->formDataJson['tblExperienceEndDate']));
        $this->tblExperienceDescriptionJob = $request->formDataJson['tblExperienceDescriptionJob'];
        $this->tblExperienceLocationJob = '';
        $this->tblExperienceCurrent = (isset($request->formDataJson['tblExperienceCurrent']))?$request->formDataJson['tblExperienceCurrent']:'N';
        $this->idcatstatus = '5';

        if(!$this->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al guardar el experiencia'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'experiencia guardado satisfactoriamente'));
        }
    }

    public function editarExperiencia($request){

        $experiencia = $this->find($request->idtblExperience);

        $experiencia->idtblDr =$request->idtblDr;
        $experiencia->tblExperienceCompany =$request->tblExperienceCompany;
        $experiencia->tblExperienceJobTitle =$request->tblExperienceJobTitle;
        $experiencia->tblExperienceStartDate = date('Y-m-15',strtotime($request->tblExperienceStartDate));
        $experiencia->tblExperienceEndDate =date('Y-m-15',strtotime($request->tblExperienceEndDate));
        $experiencia->tblExperienceDescriptionJob =$request->tblExperienceDescriptionJob;
        $experiencia->tblExperienceCurrent =$request->tblExperienceCurrent;

        if(!$experiencia->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el experiencia'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'experiencia se ha editado satisfactoriamente'));
        }
    }

    public function editarExperienciaWeb($request){

        $experiencia = $this->find($request->idtblExperience);

        $experiencia->idtblDr =$request->idtblDr;
        $experiencia->tblExperienceCompany =$request->formDataJson['tblExperienceCompany'];
        $experiencia->tblExperienceJobTitle =$request->formDataJson['tblExperienceJobTitle'];
        $experiencia->tblExperienceStartDate = date('Y-m-15',strtotime($request->formDataJson['tblExperienceStartDate']));
        $experiencia->tblExperienceEndDate =date('Y-m-15',strtotime($request->formDataJson['tblExperienceEndDate']));
        $experiencia->tblExperienceDescriptionJob =$request->formDataJson['tblExperienceDescriptionJob'];
        $experiencia->tblExperienceLocationJob ='';
        $experiencia->tblExperienceCurrent =(isset($request->formDataJson['tblExperienceCurrent']))?$request->formDataJson['tblExperienceCurrent']:'N';
        $experiencia->idcatstatus ='5';
        if(!$experiencia->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el experiencia','datos'=>$experiencia));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'experiencia se ha editado satisfactoriamente','datos'=>$experiencia));
        }
    }

    public function eliminarExperiencia($request){
        
        $experiencia = $this->find($request->idtblExperience);
        $experiencia->idcatstatus = 4;
        if(!$experiencia->save()){
            return Response::json(array('estado'=>'0','msg'=>'Ya esta experiencia a sido eliminada'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'experiencia eliminado satisfactoriamente'));
        }
    }

    public function obtenerExperiencia($request){
        $experiencia = $this->find($request->idtblExperience);
        if($experiencia){
            return Response::json(array('success'=>'1','data'=>$experiencia,'msg'=>'Registros obtenidos con exito.'));
        }else{
            return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
        }

    }

    public function obtenerExperiencias($request){
        $experiencia= experienceModel::where('idtblDr', '=', $request->idtblDr)->where('idcatstatus', '<>', '4')->get();
        if($experiencia){
            return Response::json(array('success'=>'1','data'=>$experiencia,'msg'=>'Registros obtenidos con exito.'));
        }else{
            return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
        }
    }

    public function getCurrentExperience($idtblDr){
        $experiencia= experienceModel::where('idtblDr', '=', $idtblDr)->
                                       where('idcatstatus', '<>', '4')->
                                       where('tblExperienceCurrent', '=', 'S')->
                                       orderby('tblExperienceStartDate', 'DESC')->
                                       get();

        if($experiencia != false){
            return $experiencia;
        }else{
            return false;
        }

    }

    public function getOldExperience($idtblDr){
        $experiencia= experienceModel::where('idtblDr', '=', $idtblDr)->
                                       where('idcatstatus', '<>', '4')->
                                       where('tblExperienceCurrent', '=', 'N')->
                                       orderby('tblExperienceEndDate', 'DESC')->
                                       get();

        if($experiencia != false){
            return $experiencia;
        }else{
            return false;
        }

    }
}

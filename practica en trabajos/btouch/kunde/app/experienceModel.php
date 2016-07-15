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
use DB;

class experienceModel extends Model
{
    protected $table = "tblexperience";
    protected $primaryKey = "idtblexperience";
    protected $fillable = ['idtblusers','tblexperiencecompany','tblexperiencejobtitle','tblexperiencestartdate','tblexperienceenddate','tblexperiencedescriptionjob','tblexperiencelocationjob','tblexperiencecurrent','idcatstatus'];
    protected $guarded = ['idtblexperience'];
    public $timestamps = false;


    public function doctor()
    {
        return $this->belongsTo('App\user','idtblusers','id');//model,local_key,parent_key
    }


    public function guardarExperiencia($request){

        $this->idtblusers =$request->idtblusers;
        $this->tblexperiencecompany =$request->tblexperiencecompany;
        $this->tblexperiencejobtitle =$request->tblexperiencejobtitle;
        $this->tblexperiencestartdate = date('Y-m-15',strtotime($request->tblexperiencestartdate));
        $this->tblexperienceenddate =date('Y-m-15',strtotime($request->tblexperienceenddate));
        $this->tblexperiencedescriptionjob =$request->tblexperiencedescriptionjob;
        $this->tblexperiencecurrent =$request->tblexperiencecurrent;
        $this->idcatstatus = '5';

        if(!$this->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al guardar el experiencia'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'experiencia guardado satisfactoriamente'));
        }
    }

    public function guardarExperienciaWeb($request){

        $this->idtblusers =$request->idtblusers;
        $this->tblexperiencecompany = $request->formDataJson['tblexperiencecompany'];
        $this->tblexperiencejobtitle = $request->formDataJson['tblexperiencejobtitle'];
        $this->tblexperiencestartdate = date('Y-m-15',strtotime($request->formDataJson['tblexperiencestartdate']));
        $this->tblexperienceenddate =date('Y-m-15',strtotime($request->formDataJson['tblexperienceenddate']));
        $this->tblexperiencedescriptionjob = $request->formDataJson['tblexperiencedescriptionjob'];
        $this->tblExperienceLocationJob = '';
        $this->tblexperiencecurrent = (isset($request->formDataJson['tblexperiencecurrent']))?$request->formDataJson['tblexperiencecurrent']:'N';
        $this->idcatstatus = '5';

        if(!$this->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al guardar el experiencia'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'experiencia guardado satisfactoriamente'));
        }
    }

    public function editarExperiencia($request){

        $experiencia = $this->find($request->idtblexperience);

        $experiencia->idtblusers =$request->idtblusers;
        $experiencia->tblexperiencecompany =$request->tblexperiencecompany;
        $experiencia->tblexperiencejobtitle =$request->tblexperiencejobtitle;
        $experiencia->tblexperiencestartdate = date('Y-m-15',strtotime($request->tblexperiencestartdate));
        $experiencia->tblexperienceenddate =date('Y-m-15',strtotime($request->tblexperienceenddate));
        $experiencia->tblexperiencedescriptionjob =$request->tblexperiencedescriptionjob;
        $experiencia->tblexperiencecurrent =$request->tblexperiencecurrent;

        if(!$experiencia->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el experiencia'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'experiencia se ha editado satisfactoriamente'));
        }
    }

    public function editarExperienciaWeb($request){

        $experiencia = $this->find($request->idtblexperience);

        $experiencia->idtblusers =$request->idtblusers;
        $experiencia->tblexperiencecompany =$request->formDataJson['tblexperiencecompany'];
        $experiencia->tblexperiencejobtitle =$request->formDataJson['tblexperiencejobtitle'];
        $experiencia->tblexperiencestartdate = date('Y-m-15',strtotime($request->formDataJson['tblexperiencestartdate']));
        $experiencia->tblexperienceenddate =date('Y-m-15',strtotime($request->formDataJson['tblexperienceenddate']));
        $experiencia->tblexperiencedescriptionjob =$request->formDataJson['tblexperiencedescriptionjob'];
        $experiencia->tblExperienceLocationJob ='';
        $experiencia->tblexperiencecurrent =(isset($request->formDataJson['tblexperiencecurrent']))?$request->formDataJson['tblexperiencecurrent']:'N';
        $experiencia->idcatstatus ='5';
        if(!$experiencia->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el experiencia','datos'=>$experiencia));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'experiencia se ha editado satisfactoriamente','datos'=>$experiencia));
        }
    }

    public function eliminarExperiencia($request){
        
        $experiencia = $this->find($request->idtblexperience);
        $experiencia->idcatstatus = 4;
        if(!$experiencia->save()){
            return Response::json(array('estado'=>'0','msg'=>'Ya esta experiencia a sido eliminada'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'experiencia eliminado satisfactoriamente'));
        }
    }

    public function obtenerExperiencia($request){
        $experiencia = $this->find($request->idtblexperience);
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
        $experiencia= experienceModel::where('idtblusers', '=', $idtblDr)->
                                       where('idcatstatus', '<>', '4')->
                                       where('tblexperiencecurrent', '=', 'S')->
                                       orderby('tblexperiencestartdate', 'DESC')->
                                       get();

        if($experiencia != false){
            return $experiencia;
        }else{
            return false;
        }

    }

    public function getOldExperience($idtblDr){
        $experiencia= experienceModel::where('idtblusers', '=', $idtblDr)->
                                       where('idcatstatus', '<>', '4')->
                                       where('tblexperiencecurrent', '=', 'N')->
                                       orderby('tblexperienceenddate', 'DESC')->
                                       get();

        if($experiencia != false){
            return $experiencia;
        }else{
            return false;
        }

    }

    public static function obtenerExperienciaPorUsuario($idUser)
    {
        $courses=json_decode(
            experienceModel::where('idtblusers', $idUser)
                ->where('idcatstatus','<>', '4')->orderBy('tblexperiencestartdate', 'desc')
                ->select('*',DB::raw("DATE_FORMAT(tblexperiencestartdate,' %M %Y ') as format_star_date_exp"),
                    DB::raw("CONCAT(TIMESTAMPDIFF(MONTH,tblexperiencestartdate,tblexperienceenddate),' meses') AS diff_time"),
                    DB::raw("IF(tblexperiencecurrent=1,'Actual',".DB::raw("DATE_FORMAT(tblexperienceenddate,' %M %Y ')").") AS tblexperienceenddateIF"))
                ->get(),2);

        return $courses;
    }
}

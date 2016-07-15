<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;
use DB;

class educationModel extends Model
{
    protected $table = "tbleducation";
    protected $primaryKey = "idtbleducation";
    protected $fillable = ['idtblusers','tbleducationschool','tbleducationstartdate','tbleducationenddate','tbleducationdegree','tbleducationfieldofstudy','tbleducationgrade','tbleducationdescription','tbleducationcurrent','idcatstatus'];
    protected $guarded = ['idtbleducation'];
    public $timestamps = false;


    public function doctor()
    {
        return $this->belongsTo('App\user','idtblusers','id');//model,local_key,parent_key
    }


    public function guardarEstudio($request){

        $this->idtblusers =$request->idtblusers;
        $this->tbleducationschool =$request->tbleducationschool;
        $this->tbleducationstartdate =date('Y-m-15',strtotime($request->tbleducationstartdate));
        $this->tbleducationenddate =date('Y-m-15',strtotime($request->tbleducationenddate));
        $this->tbleducationfieldofstudy =$request->tbleducationfieldofstudy;
        $this->tbleducationdescription =$request->tbleducationdescription;
        $this->idcatstatus = '5';

        if(!$this->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al guardar el estudio'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Estudio guardado satisfactoriamente'));
        }
    }

    public function guardarEstudioWeb($request){

        $this->idtblusers =$request->idtblusers;
        $this->tbleducationschool =$request->formDataJson['tbleducationschool'];
        $this->tbleducationstartdate =date('Y-m-15',strtotime($request->formDataJson['tbleducationstartdate']));
        $this->tbleducationenddate =date('Y-m-15',strtotime($request->formDataJson['tbleducationenddate']));
        $this->tbleducationdegree ='';
        $this->tbleducationfieldofstudy =$request->formDataJson['tbleducationfieldofstudy'];
        $this->tbleducationgrade ='';
        $this->tbleducationdescription =$request->formDataJson['tbleducationdescription'];
        $this->tbleducationcurrent ='N';
        $this->idcatstatus ='5';

        if(!$this->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al guardar el estudio'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Estudio guardado satisfactoriamente'));
        }
    }

    public function editarEstudio($request){

        $education = $this->find($request->idtbleducation);

        $education->idtblusers =$request->idtblusers;
        $education->tbleducationschool =$request->tbleducationschool;
        $education->tbleducationstartdate =date('Y-m-15',strtotime($request->tbleducationstartdate));
        $education->tbleducationenddate =date('Y-m-15',strtotime($request->tbleducationenddate));
        $education->tbleducationfieldofstudy =$request->tbleducationfieldofstudy;
        $education->tbleducationdescription =$request->tbleducationdescription;
        $education->idcatstatus ='5';

        if(!$education->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el estudio'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Estudio se ha editado satisfactoriamente'));
        }
    }

    public function editarEstudioWeb($request){

        $education = $this->find($request->idtbleducation);

        $education->idtblusers =$request->idtblusers;
        $education->tbleducationschool =$request->formDataJson['tbleducationschool'];
        $education->tbleducationstartdate =date('Y-m-15',strtotime($request->formDataJson['tbleducationstartdate']));
        $education->tbleducationenddate =date('Y-m-15',strtotime($request->formDataJson['tbleducationenddate']));
        $education->tbleducationdegree ='';
        $education->tbleducationfieldofstudy =$request->formDataJson['tbleducationfieldofstudy'];
        $education->tbleducationgrade ='';
        $education->tbleducationdescription =$request->formDataJson['tbleducationdescription'];
        $education->tbleducationcurrent ='N';
        $education->idcatstatus ='5';

        if(!$education->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el estudio','datos'=>$education));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Estudio se ha editado satisfactoriamente','datos'=>$education));
        }
    }

    public function eliminarEstudio($request){
        $education = $this->find($request->idtbleducation);
        $education->idcatstatus=4;
        if(!$education->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al editar estudio'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Estudio eliminado satisfactoriamente'));
        }
    }

    public function obtenerEstudio($request){
        $education = $this->find($request->idtbleducation);
        if($education){
            return Response::json(array('success'=>'1','data'=>$education,'msg'=>'Registros obtenidos con exito.'));
        }else{
            return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
        }

    }

    public function obtenerEstudios($request){
        $education= educationModel::where('idtblusers', '=', $request->idtblusers)->where('idcatstatus', '<>', '4')->get();
        if($education){
            return Response::json(array('success'=>'1','data'=>$education,'msg'=>'Registros obtenidos con exito.'));
        }else{
            return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
        }
    }

    public static function obtenerEstudiosPorUsuario($idUser)
    {
        $educations=json_decode(
            educationModel::where('idtblusers', $idUser)
                ->where('idcatstatus','<>', '4')
                ->orderBy('tbleducationstartdate', 'desc')
                ->select('*',DB::raw("DATE_FORMAT(tbleducationstartdate,' %M %Y ') as format_star_date_est"),
                          DB::raw("CONCAT(TIMESTAMPDIFF(MONTH,tbleducationstartdate,tbleducationenddate),' meses') AS diff_time"),
                          DB::raw("IF(tbleducationcurrent=1,'Actual',".DB::raw("DATE_FORMAT(tbleducationenddate,' %M %Y ')").") AS tbleducationenddateIF"))
                ->get(),2);

        return $educations;
    }


}

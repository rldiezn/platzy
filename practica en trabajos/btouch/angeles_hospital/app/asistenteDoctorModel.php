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

class asistenteDoctorModel extends Model
{
    protected $table = "tblasistente";
    protected $primaryKey = "idtblasistente";
    protected $fillable = ['tblasistenteNombre','tblasistenteEmail','tblasistenteDoctores','idasistente'];
    protected $guarded = ['idtblasistente'];
    public $timestamps = false;


    public function guardarAsistente($request){

        $respuesta = new dispModel();
        if($respuesta->dispositivo($request)){
            $this->tblasistenteNombre =$request->tblasistenteNombre;
            $this->tblasistenteEmail =$request->tblasistenteEmail;
            $this->tblasistenteDoctores =$request->tblasistenteDoctores;
            $this->idasistente =$request->idasistente;

            if(!$this->save()){
                return Response::json(array('estado'=>'0','msg'=>'Error al registrar al asistente'));
            }else{
                return Response::json(array('estado'=>'1','msg'=>'Asistente registrado satisfactoriamente'));
            }
        }else{
            $this->tblasistenteNombre =$request->tblasistenteNombre;
            $this->tblasistenteEmail =$request->tblasistenteEmail;
            $this->tblasistenteDoctores =$request->tblasistenteDoctores;
            $this->idasistente =$request->idasistente;

            if(!$this->save()){
                return Response::json(array('estado'=>'0','msg'=>'Error al registrar al asistente'));
            }else{
                return Response::json(array('estado'=>'1','msg'=>'Asistente registrado satisfactoriamente'));
            }
        }

    }

    public function editarAsistente($request){

        $respuesta = new dispModel();
        if($respuesta->dispositivo($request)){
            $asistente = $this->find($request->idtblasistente);

            $asistente->tblasistenteNombre =$request->tblasistenteNombre;
            $asistente->tblasistenteEmail =$request->tblasistenteEmail;
            $asistente->idasistente =$request->idasistente;

            if(!$asistente->save()){
                return Response::json(array('estado'=>'0','msg'=>'Error al Editar el asistente'));
            }else{
                return Response::json(array('estado'=>'1','msg'=>'Asistente se ha editado satisfactoriamente'));
            }
        }else{
            $asistente = $this->find($request->idtblasistente);

            $asistente->tblasistenteNombre =$request->tblasistenteNombre;
            $asistente->tblasistenteEmail =$request->tblasistenteEmail;
            $asistente->tblasistenteDoctores = $request->tblasistenteDoctores;
            $asistente->idasistente =$request->idasistente;

            if(!$asistente->save()){
                return Response::json(array('estado'=>'0','msg'=>'Error al Editar el asistente'));
            }else{
                return Response::json(array('estado'=>'1','msg'=>'Asistente se ha editado satisfactoriamente'));
            }
        }


    }

    public function obtenerAsistente($request){

        $respuesta = new dispModel();
        if($respuesta->dispositivo($request)){
            $asistente = $this->find($request->idtblasistente);
            if($asistente){
                return Response::json(array('success'=>'1','data'=>$asistente,'msg'=>'Registros obtenidos con exito.'));
            }else{
                return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
            }
        }else{
            $asistente = $this->find($request->idtblasistente);
            if($asistente){
                return Response::json(array('success'=>'1','data'=>$asistente,'msg'=>'Registros obtenidos con exito.'));
            }else{
                return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
            }
        }

    }

    public function obtenerTodos($request){
        $respuesta = new dispModel();
        if($respuesta->dispositivo($request)){
            $asistentes= asistenteDoctorModel::all();
            if($asistentes){
                return Response::json(array('success'=>'1','data'=>$asistentes,'msg'=>'Registros obtenidos con exito.'));
            }else{
                return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
            }
        }else{
            $asistentes= asistenteDoctorModel::all();
            if($asistentes){
                return Response::json(array('success'=>'1','data'=>$asistentes,'msg'=>'Registros obtenidos con exito.'));
            }else{
                return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
            }
        }

    }

    public function asignarDoctor($request){

        $respuesta = new dispModel();
        if($respuesta->dispositivo($request)){

            $asistente = $this->find($request->idtblasistente);
            if($asistente->tblasistenteDoctores==""){
                $asistente->tblasistenteDoctores = $request->tblasistenteDoctores;
            }else{
                $asistente->tblasistenteDoctores = $asistente->tblasistenteDoctores.','.$request->tblasistenteDoctores;
            }

            if(!$asistente->save()){
                return Response::json(array('estado'=>'0','msg'=>'Error al Editar el asistente'));
            }else{
                return Response::json(array('estado'=>'1','msg'=>'Asistente se ha editado satisfactoriamente'));
            }
        }else{

            $asistente = $this->find($request->idtblasistente);
            if($asistente->tblasistenteDoctores==""){
                $asistente->tblasistenteDoctores = $request->tblasistenteDoctores;
            }else{
                $asistente->tblasistenteDoctores = $asistente->tblasistenteDoctores.','.$request->tblasistenteDoctores;
            }


            if(!$asistente->save()){
                return Response::json(array('estado'=>'0','msg'=>'Error al Editar el asistente'));
            }else{
                return Response::json(array('estado'=>'1','msg'=>'Asistente se ha editado satisfactoriamente'));
            }
        }


    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;

class courseModel extends Model
{

    protected $table = "tblcourses";
    protected $primaryKey = "idtblCourses";
    protected $fillable = ['idtblDr','tblCoursesName','tblCoursesInstitution','idtblExperience','tblCoursesDateInit','tblCoursesDateEnd','tblCoursesDescription','tblCoursesCurrent','idcatstatus'];
    protected $guarded = ['idtblCourses'];
    public $timestamps = false;


    public function doctor()
    {
        return $this->belongsTo('App\doctorModel','idtblDr','idtblDr');//model,local_key,parent_key
    }


    public function saveSingleCourse($request){

        $this->idtblDr =$request->idtblDr;
        $this->tblCoursesName =$request->tblCoursesName;
        $this->tblCoursesInstitution =$request->tblCoursesInstitution;
        $this->tblCoursesDateInit =date('Y-m-15',strtotime($request->tblCoursesDateInit));
        $this->tblCoursesDateEnd =date('Y-m-15',strtotime($request->tblCoursesDateEnd));
        $this->idtblExperience =$request->idtblExperience;
        $this->tblCoursesDescription =$request->tblCoursesDescription;
        $this->idcatstatus = '5';

        if(!$this->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al guardar el cursos'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Cursos guardado satisfactoriamente'));
        }
    }


    public function saveSingleCourseWeb($request){

        $this->idtblDr =$request->idtblDr;
        $this->tblCoursesName =$request->formDataJson['tblCoursesName'];
        $this->tblCoursesInstitution =$request->formDataJson['tblCoursesInstitution'];
        $this->tblCoursesDateInit =date('Y-m-15',strtotime($request->formDataJson['tblCoursesDateInit']));
        $this->tblCoursesDateEnd =date('Y-m-15',strtotime($request->formDataJson['tblCoursesDateEnd']));
        $this->idtblExperience =$request->formDataJson['idtblExperience'];
        $this->tblCoursesDescription =$request->formDataJson['tblCoursesDescription'];
        $this->idcatstatus ='5';
        $this->tblCoursesCurrent ='N';

        if(!$this->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al guardar el cursos'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Cursos guardado satisfactoriamente'));
        }
    }

    public function editSingleCourse($request){

        $course = $this->find($request->idtblCourses);

        $course->idtblDr =$request->idtblDr;
        $course->tblCoursesName =$request->tblCoursesName;
        $course->tblCoursesInstitution =$request->tblCoursesInstitution;
        $course->tblCoursesDateInit =date('Y-m-15',strtotime($request->tblCoursesDateInit));
        $course->tblCoursesDateEnd =date('Y-m-15',strtotime($request->tblCoursesDateEnd));
        $course->idtblExperience =$request->idtblExperience;
        $course->tblCoursesDescription =$request->tblCoursesDescription;

        if(!$course->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el cursos'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Curso se ha editado satisfactoriamente'));
        }
    }

    public function editSingleCourseWeb($request){

        $course = $this->find($request->idtblCourses);

        $course->idtblDr =$request->idtblDr;
        $course->tblCoursesName =$request->formDataJson['tblCoursesName'];
        $course->tblCoursesInstitution =$request->formDataJson['tblCoursesInstitution'];
        $course->tblCoursesDateInit =date('Y-m-15',strtotime($request->formDataJson['tblCoursesDateInit']));
        $course->tblCoursesDateEnd =date('Y-m-15',strtotime($request->formDataJson['tblCoursesDateEnd']));
        $course->idtblExperience =$request->formDataJson['idtblExperience'];
        $course->tblCoursesDescription =$request->formDataJson['tblCoursesDescription'];
        $course->idcatstatus ='5';
        $course->tblCoursesCurrent ='N';

        if(!$course->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el cursos'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Curso se ha editado satisfactoriamente'));
        }
    }

    public function eliminarCurso($request){

        $course = $this->find($request->idtblCourses);
        $course->idcatstatus = 4;
        if(!$course->save()){
            return Response::json(array('estado'=>'0','msg'=>'Ya este curso a sido eliminado'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Cursos eliminado satisfactoriamente'));
        }
    }

    public function obtenerCurso($request){
        $course = $this->find($request->idtblCourses);
        if($course){
            return Response::json(array('success'=>'1','data'=>$course,'msg'=>'Registros obtenidos con exito.'));
        }else{
            return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
        }
    }

    public function obtenerCursos($request){
        $course= courseModel::where('idtblDr', '=', $request->idtblDr)->where('idcatstatus', '<>', '4')->get();
        if($course){
            return Response::json(array('success'=>'1','data'=>$course,'msg'=>'Registros obtenidos con exito.'));
        }else{
            return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
        }
    }

}

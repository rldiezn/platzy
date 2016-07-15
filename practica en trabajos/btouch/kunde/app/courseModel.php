<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;
use DB;

class courseModel extends Model
{

    protected $table = "tblcourses";
    protected $primaryKey = "idtblCourses";
    protected $fillable = ['idtblusers','tblcoursesname','tblcoursesinstitution','idtblexperience','tblcoursesdateinit','tblcoursesdateend','tblcoursesdescription','tblcoursescurrent','idcatstatus'];
    protected $guarded = ['idtblCourses'];
    public $timestamps = false;


    public function doctor()
    {
        return $this->belongsTo('App\doctorModel','idtblusers','idtblusers');//model,local_key,parent_key
    }


    public function saveSingleCourse($request){

        $this->idtblusers =$request->idtblusers;
        $this->tblcoursesname =$request->tblcoursesname;
        $this->tblcoursesinstitution =$request->tblcoursesinstitution;
        $this->tblcoursesdateinit =date('Y-m-15',strtotime($request->tblcoursesdateinit));
        $this->tblcoursesdateend =date('Y-m-15',strtotime($request->tblcoursesdateend));
        $this->idtblexperience =$request->idtblexperience;
        $this->tblcoursesdescription =$request->tblcoursesdescription;
        $this->idcatstatus = '5';

        if(!$this->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al guardar el cursos'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Cursos guardado satisfactoriamente'));
        }
    }


    public function saveSingleCourseWeb($request){

        $this->idtblusers =$request->idtblusers;
        $this->tblcoursesname =$request->formDataJson['tblcoursesname'];
        $this->tblcoursesinstitution =$request->formDataJson['tblcoursesinstitution'];
        $this->tblcoursesdateinit =date('Y-m-15',strtotime($request->formDataJson['tblcoursesdateinit']));
        $this->tblcoursesdateend =date('Y-m-15',strtotime($request->formDataJson['tblcoursesdateend']));
        $this->idtblexperience =$request->formDataJson['idtblexperience'];
        $this->tblcoursesdescription =$request->formDataJson['tblcoursesdescription'];
        $this->idcatstatus ='5';
        $this->tblcoursescurrent ='N';

        if(!$this->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al guardar el cursos'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Cursos guardado satisfactoriamente'));
        }
    }

    public function editSingleCourse($request){

        $course = $this->find($request->idtblCourses);

        $course->idtblusers =$request->idtblusers;
        $course->tblcoursesname =$request->tblcoursesname;
        $course->tblcoursesinstitution =$request->tblcoursesinstitution;
        $course->tblcoursesdateinit =date('Y-m-15',strtotime($request->tblcoursesdateinit));
        $course->tblcoursesdateend =date('Y-m-15',strtotime($request->tblcoursesdateend));
        $course->idtblexperience =$request->idtblexperience;
        $course->tblcoursesdescription =$request->tblcoursesdescription;

        if(!$course->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el cursos'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Curso se ha editado satisfactoriamente'));
        }
    }

    public function editSingleCourseWeb($request){

        $course = $this->find($request->idtblCourses);

        $course->idtblusers =$request->idtblusers;
        $course->tblcoursesname =$request->formDataJson['tblcoursesname'];
        $course->tblcoursesinstitution =$request->formDataJson['tblcoursesinstitution'];
        $course->tblcoursesdateinit =date('Y-m-15',strtotime($request->formDataJson['tblcoursesdateinit']));
        $course->tblcoursesdateend =date('Y-m-15',strtotime($request->formDataJson['tblcoursesdateend']));
        $course->idtblexperience =$request->formDataJson['idtblexperience'];
        $course->tblcoursesdescription =$request->formDataJson['tblcoursesdescription'];
        $course->idcatstatus ='5';
        $course->tblcoursescurrent ='N';

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
        $course= courseModel::where('idtblusers', '=', $request->idtblusers)->where('idcatstatus', '<>', '4')->get();
        if($course){
            return Response::json(array('success'=>'1','data'=>$course,'msg'=>'Registros obtenidos con exito.'));
        }else{
            return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
        }
    }

    public static function obtenerCursosPorUsuario($idUser)
    {
        $courses=json_decode(
            courseModel::where('idtblusers', $idUser)
                ->where('idcatstatus','<>', '4')
                ->orderBy('tblcoursesdateinit', 'desc')
                ->select('*',DB::raw("DATE_FORMAT(tblcoursesdateinit,' %M %Y ') as format_star_date_course"),
                    DB::raw("CONCAT(TIMESTAMPDIFF(MONTH,tblcoursesdateinit,tblcoursesdateend),' meses') AS diff_time"),
                    DB::raw("IF(tblcoursescurrent=1,'Actual',".DB::raw("DATE_FORMAT(tblcoursesdateend,' %M %Y ')").") AS tblcourseenddateIF"))
                ->get(),2);

        return $courses;
    }

}

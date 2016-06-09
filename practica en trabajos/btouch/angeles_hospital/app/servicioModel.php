<?php
/*
 * Btouch Inc
 * Ricardo Diez
 * Angeles Digital
 * */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Input;
use DB;
use Response;

class servicioModel extends Model
{
    protected $table = "catservicios";
    protected $primaryKey = "idcatservicio";
    protected $fillable = ['catservicioname','catserviciodescription','catservicioimage'];
    protected $guarded = ['idcatservicio'];
    public $timestamps = false;

    public function obtenerTodosLosServicios(){
        $servicios=servicioModel::orderby("catservicioname","asc")
        ->join('tblhospitalesservicios', 'tblhospitalesservicios.idcatservicio', '=', 'catservicios.idcatservicio')
        ->groupBy('tblhospitalesservicios.idcatservicio')
        ->get();
        
        return json_encode($servicios);
    }

    public function obtenerTodosLosServiciosLimit($rows=50,$limit=0){
        $servicios=servicioModel::orderby("catservicioname","asc")
        ->join('tblhospitalesservicios', 'tblhospitalesservicios.idcatservicio', '=', 'catservicios.idcatservicio')
        ->groupBy('tblhospitalesservicios.idcatservicio')
        ->take($rows)
        ->skip($limit)
        ->get();
        return json_encode($servicios);
    }

    public function listarServicios(){

        $datos=$this->obtenerTodosLosServiciosLimit();
        $arrayHospitales=json_decode($datos,2);
        $fileSystem = new Filesystem();
        $menu = new menuModel();
        $isDoctor= $menu->isDoctor();

        foreach($arrayHospitales as $ind=>$aHospitales){
            if(!isset($aHospitales['catservicioimage'])){
                $arrayHospitales[$ind]['srcImage']='/img/default_company_logo.png';
            }else if($aHospitales['catservicioimage']==""){
                $arrayHospitales[$ind]['srcImage']='/img/default_company_logo.png';
            }else if(!$fileSystem->exists("upload/servicio/".$aHospitales['catservicioimage'])){
                $arrayHospitales[$ind]['srcImage']='/img/default_company_logo.png';
            }else{
                $arrayHospitales[$ind]['srcImage']="/upload/servicio/".$aHospitales['catservicioimage'];
            }
            $arrayHospitales[$ind]['servicioHospitales']=$this->hospitalByServicio($aHospitales['idcatservicio']);
        }

        return $arrayHospitales;
    }

    public function listarServiciosLimit($request){

        $datos=$this->obtenerTodosLosServiciosLimit($request->rows,$request->limit);
        $datos2=$this->obtenerTodosLosServiciosLimit($request->rows,($request->limit+$request->rows));
        $arrayServicio=json_decode($datos,2);
        $arrayServicioFuture=json_decode($datos2,2);
        $disabled=(count($arrayServicioFuture)>0)?0:1;
        $fileSystem = new Filesystem();
        if(count($arrayServicio)>0){
            foreach($arrayServicio as $ind=>$aHospitales){
                if(!isset($aHospitales['catservicioimage'])){
                    $arrayServicio[$ind]['srcImage']='/img/default_company_logo.png';
                }else if($aHospitales['catservicioimage']==""){
                    $arrayServicio[$ind]['srcImage']='/img/default_company_logo.png';
                }else if(!$fileSystem->exists("upload/servicio/".$aHospitales['catservicioimage'])){
                    $arrayServicio[$ind]['srcImage']='/img/default_company_logo.png';
                }else{
                    $arrayServicio[$ind]['srcImage']="/upload/servicio/".$aHospitales['catservicioimage'];
                }
                $arrayServicio[$ind]['servicioHospitales']=$this->hospitalByServicio($aHospitales['idcatservicio']);
            }
            $view=view('servicio.rows-servicio',['servicios'=>$arrayServicio])->render();
            $estado="1";
            $msg="Celdas cargadas correctamente";
        }else{
            $view="";
            $estado="0";
            $msg="No hay mas registros disponibles";
        }

        return json_encode(array("rows"=>$view,"estado"=>$estado,"msg"=>$msg,"disabled"=>$disabled));
    }

    public function obtenerServicio($idcatHospital=false,$idServicio){
        $menu = new menuModel();
        $isDoctor= $menu->isDoctor();

        if($idcatHospital!=false) {
            $servicio = servicioModel::join('tblhospitalesservicios as b', 'b.idcatservicio', '=', 'catservicios.idcatservicio')
                ->join('cathospital as c', 'c.idcatHospital', '=', 'b.idcathospital')
                ->where("catservicios.idcatservicio", "=", $idServicio)
                ->where("c.idcatHospital", "=", $idcatHospital)
                ->firstOrFail();
        }else{
            $servicio = servicioModel::join('tblhospitalesservicios as b', 'b.idcatservicio', '=', 'catservicios.idcatservicio')
                ->join('cathospital as c', 'c.idcatHospital', '=', 'b.idcathospital')
                ->where("catservicios.idcatservicio", "=", $idServicio)
                ->firstOrFail();
        }

        $servicio->srcImage = $this->isImageHere($servicio);
        $servicio->hospitales = $this->hospitalByServicio($idServicio);
        $alertas = DB::table('catalertas')->get();
        $servicio->modalAgenda=view('agenda.agenda-servicio-modal')->with('isDoctor',$isDoctor)->with('servicio',$servicio)->with('alertas',$alertas);
        return $servicio;
    }

    public function perfilservicio($idcatHospital,$idServicio){
        $servicio=servicioModel::join('tblhospitalesservicios as b', 'b.idcatservicio', '=', 'catservicios.idcatservicio')
                                 ->join('cathospital as c', 'c.idcatHospital', '=', 'b.idcathospital')
                                 ->where("catservicios.idcatservicio","=",$idServicio)
                                 ->where("c.idcatHospital","=",$idcatHospital)
                                 ->firstOrFail();

        return $servicio;
    }

    static function isImageHere($servicio){

        $fileSystem = new Filesystem();
        $arrayImg= Array();

        if($servicio->catservicioimage==""){
            $arrayImg['srcImage']='/img/default_company_logo.png';
        }else if(!$fileSystem->exists("upload/servicio/".$servicio->catservicioimage)){
            $arrayImg['srcImage']='/img/default_company_logo.png';
        }else{
            $arrayImg['srcImage']="/upload/servicio/".$servicio->catservicioimage;
        }
//        var_dump($hospital->catHospitalBannerImg);exit;
        if($servicio->catservicioimagebanner==""){
            $arrayImg['srcImageBanner']='/img/bannerServ.jpg';
        }else if(!$fileSystem->exists("upload/servicio/".$servicio->catservicioimagebanner)){
            $arrayImg['srcImageBanner']='/img/bannerServ.jpg';
        }else{
            $arrayImg['srcImageBanner']="/upload/servicio/".$servicio->catservicioimagebanner;
        }

        return $arrayImg;

    }

    public function hospitalByServicio($idServicio){

        $servicios=DB::table('catservicios')->
        join('tblhospitalesservicios', 'tblhospitalesservicios.idcatservicio', '=', 'catservicios.idcatservicio')->
        join('cathospital', 'cathospital.idcatHospital', '=', 'tblhospitalesservicios.idcathospital')->
        //join('catunidadservicio', 'catunidadservicio.idcatunidadservicio', '=', 'tblhospitalesservicios.idcatunidadservicio')->
        where('tblhospitalesservicios.idcatservicio','=', $idServicio)->
        groupBy('tblhospitalesservicios.idcathospital')->
        select('catservicios.idcatservicio','cathospital.idcatHospital','catservicios.catservicioname','tblhospitalesservicios.catserviciodescription','cathospital.idcatHospital','cathospital.catHospitalName'/*,'catunidadservicio.catunidadservicio'*/)->
        get();

        return $servicios;
    }
}

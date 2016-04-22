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
        $hospitales=$this->all();
        return json_encode($hospitales);
    }

    public function listarServicios(){

        $datos=$this->obtenerTodosLosServicios();
        $arrayHospitales=json_decode($datos,2);
        $fileSystem = new Filesystem();

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
        }

        return $arrayHospitales;
    }

    public function obtenerServicio($idServicio){
        $servicio=$this->find($idServicio);
        $servicio->srcImage = $this->isImageHere($servicio);
        $servicio->hospitales = $this->hospitalByServicio($idServicio);
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
            $arrayImg['srcImageBanner']='';
        }else if(!$fileSystem->exists("upload/servicio/".$servicio->catservicioimagebanner)){
            $arrayImg['srcImageBanner']='';
        }else{
            $arrayImg['srcImageBanner']="/upload/servicio/".$servicio->catservicioimagebanner;
        }

        return $arrayImg;

    }

    public function hospitalByServicio($idServicio){

        $servicios=DB::table('catservicios')->
        join('tblhospitalesservicios', 'tblhospitalesservicios.idcatservicio', '=', 'catservicios.idcatservicio')->
        join('cathospital', 'cathospital.idcatHospital', '=', 'tblhospitalesservicios.idcathospital')->
        join('catunidadservicio', 'catunidadservicio.idcatunidadservicio', '=', 'tblhospitalesservicios.idcatunidadservicio')->
        where('tblhospitalesservicios.idcatservicio','=', $idServicio)->
        groupBy('tblhospitalesservicios.idcathospital')->
        select('catservicios.idcatservicio','catservicios.catservicioname','catservicios.catserviciodescription','cathospital.idcatHospital','cathospital.catHospitalName','catunidadservicio.catunidadservicio')->
        get();

        return $servicios;
    }
}

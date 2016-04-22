<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Input;
use DB;
use Response;
class hospitalModel extends Model
{
    protected $table = "cathospital";
    protected $primaryKey = "idcatHospital";
    protected $fillable = ['catHospitalName','idcatStatus'];
    protected $guarded = ['idcatHospital'];
    public $timestamps = false;

    public function obtenerTodosLosHospitales(){
        $hospitales=$this->all();
        return json_encode($hospitales);
    }

    public function listarHospitales(){

        $datos=$this->obtenerTodosLosHospitales();
        $arrayHospitales=json_decode($datos,2);
        $fileSystem = new Filesystem();

        foreach($arrayHospitales as $ind=>$aHospitales){
            if(!isset($aHospitales['catHospitalProfileImg'])){
                $arrayHospitales[$ind]['srcImage']='/img/default_company_logo.png';
            }else if($aHospitales['catHospitalProfileImg']==""){
                $arrayHospitales[$ind]['srcImage']='/img/default_company_logo.png';
            }else if(!$fileSystem->exists("upload/hospitales/".$aHospitales['catHospitalProfileImg'])){
                $arrayHospitales[$ind]['srcImage']='/img/default_company_logo.png';
            }else{
                $arrayHospitales[$ind]['srcImage']="/upload/hospitales/".$aHospitales['catHospitalProfileImg'];
            }
        }

        return $arrayHospitales;
    }

    public function obtenerHospital($idHospital){
        $hospital=$this->find($idHospital);
        $hospital->srcImage = $this->isImageHere($hospital);
        $hospital->services = $this->servicioByHospital($idHospital);
        return $hospital;
    }

    static function isImageHere($hospital){

        $fileSystem = new Filesystem();
        $arrayImg= Array();

        if($hospital->catHospitalProfileImg==""){
            $arrayImg['srcImage']='/img/default_company_logo.png';
        }else if(!$fileSystem->exists("upload/hospitales/".$hospital->catHospitalProfileImg)){
            $arrayImg['srcImage']='/img/default_company_logo.png';
        }else{
            $arrayImg['srcImage']="/upload/hospitales/".$hospital->catHospitalProfileImg;
        }
//        var_dump($hospital->catHospitalBannerImg);exit;
        if($hospital->catHospitalBannerImg==""){
            $arrayImg['srcImageBanner']='';
        }else if(!$fileSystem->exists("upload/hospitales/".$hospital->catHospitalBannerImg)){
            $arrayImg['srcImageBanner']='';
        }else{
            $arrayImg['srcImageBanner']="/upload/hospitales/".$hospital->catHospitalBannerImg;
        }

        return $arrayImg;

    }

    public function servicioByHospital($idHospital){

        $servicios=DB::table('catservicios')->
                        join('tblhospitalesservicios', 'tblhospitalesservicios.idcatservicio', '=', 'catservicios.idcatservicio')->
                        join('cathospital', 'cathospital.idcatHospital', '=', 'tblhospitalesservicios.idcathospital')->
                        where('tblhospitalesservicios.idcathospital','=', $idHospital)->
                        select('catservicios.idcatservicio','catservicios.catservicioname','catservicios.catserviciodescription','cathospital.catHospitalName',DB::raw('SUBSTRING_INDEX(catservicios.catservicioname, ".", -1) AS catservicionameFormat'))->
                        get();

        return $servicios;
    }

}

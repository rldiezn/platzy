<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Input;
use DB;
use Response;
class serviciosModel extends Model
{
    protected $table = "catservicios";
    protected $primaryKey = "idcatServicio";
    public $timestamps = false;

    public function obtenerTodosLosHospitales(){
        $servicios=$this->all();
        return json_encode($servicios);
    }

    public function listarHospitales(){

        $datos=$this->obtenerTodosLosHospitales();
        $arrayHospitales=json_decode($datos,2);
        $fileSystem = new Filesystem();

        foreach($arrayHospitales as $ind=>$aHospitales){
            if(!isset($aHospitales['tblLinkedInDrImg'])){
                $arrayHospitales[$ind]['srcImage']='/img/contacto_foto.jpg';
            }else if($aHospitales['tblLinkedInDrImg']==""){
                $arrayHospitales[$ind]['srcImage']='/img/contacto_foto.jpg';
            }else if(!$fileSystem->exists("upload/doctores/$aHospitales[idtblDr]/profile_img/".$aHospitales['tblLinkedInDrImg'])){
                $arrayHospitales[$ind]['srcImage']='/img/contacto_foto.jpg';
            }else{
                $arrayHospitales[$ind]['srcImage']="/upload/doctores/$aHospitales[idtblDr]/profile_img/".$aHospitales['tblLinkedInDrImg'];
            }
        }

        return $arrayHospitales;
    }

}

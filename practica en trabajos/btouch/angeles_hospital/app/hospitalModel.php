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
        $hospitales=$this->orderBy("catHospitalName","ASC")->get();
        return json_encode($hospitales);
    }

    public function obtenerTodosLosHospitalesPagination(){
        $hospitales=hospitalModel::paginate(10);
        return $hospitales;
    }

    public function obtenerTodosLosHospitalesLimit($rows=10,$limit = 0){
        $hospitales=hospitalModel::orderby("catHospitalName","asc")->take($rows)->skip($limit)->get();
        return json_encode($hospitales);
    }

    public function listarHospitales(){

//        $datos=$this->obtenerTodosLosHospitalesLimit();
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
    
    public function listarHospitalesLimit($request){
        $fileSystem = new Filesystem();
        $hospitalRows=$this->obtenerTodosLosHospitalesLimit($request->rows,$request->limit);
        $hospitalRowsFuture=$this->obtenerTodosLosHospitalesLimit($request->rows,($request->limit+$request->rows));
        $hospitalRows=json_decode($hospitalRows,2);
        $hospitalRowsFuture=json_decode($hospitalRowsFuture,2);
        $disabled=(count($hospitalRowsFuture)>0)?0:1;
        if(count($hospitalRows)>0){
            foreach($hospitalRows as $ind=>$aHospitales){
                if(!isset($aHospitales['catHospitalProfileImg'])){
                    $hospitalRows[$ind]['srcImage']='/img/default_company_logo.png';
                }else if($aHospitales['catHospitalProfileImg']==""){
                    $hospitalRows[$ind]['srcImage']='/img/default_company_logo.png';
                }else if(!$fileSystem->exists("upload/hospitales/".$aHospitales['catHospitalProfileImg'])){
                    $hospitalRows[$ind]['srcImage']='/img/default_company_logo.png';
                }else{
                    $hospitalRows[$ind]['srcImage']="/upload/hospitales/".$aHospitales['catHospitalProfileImg'];
                }
            }

            $view=view('hospital.rows-hospital',['hospitales'=>$hospitalRows])->render();
            $estado="1";
            $msg="Celdas cargadas correctamente";
        }else{
            $view="";
            $estado="0";
            $msg="No hay mas registros disponibles";
        }

        return json_encode(array("rows"=>$view,"estado"=>$estado,"msg"=>$msg,"disabled"=>$disabled));

    }

    public function obtenerHospital($idHospital){
        $doctorM=new doctorModel();
        $hospital=$this->find($idHospital);
        $hospital->srcImage = $this->isImageHere($hospital);
        $hospital->services = $this->servicioByHospital($idHospital);
//        $hospital->doctors = json_decode($doctorM->directorioMedico($idHospital),2);//TODO
        $hospital->doctors = json_decode($doctorM->listarDoctoresLimit(50,0,$hospital->catSiglas),2);//TODO
//        echo '<pre>';print_r($hospital->doctors);exit;
        $hospital->products = $this->productoByHospital($idHospital);
        $hospital->especialidades = $this->especialidadByHospital($idHospital);
//        echo '<pre>';print_r($hospital->doctors);exit;
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
                        select('catservicios.idcatservicio','cathospital.idcatHospital','catservicios.catservicioname','tblhospitalesservicios.catserviciodescription','cathospital.catHospitalName',DB::raw('SUBSTRING_INDEX(catservicios.catservicioname, ".", -1) AS catservicionameFormat'))->
                        get();

        return $servicios;
    }
    public function productoByHospital($idHospital){

        $servicios=DB::table('catproductos')->
                        join('tblhospitalesproductos', 'tblhospitalesproductos.idcatproductos', '=', 'catproductos.idcatproductos')->
                        join('cathospital', 'cathospital.idcatHospital', '=', 'tblhospitalesproductos.idcathospital')->
                        where('tblhospitalesproductos.idcathospital','=', $idHospital)->
//                        select('catproductos.idcatservicio','cathospital.idcatHospital','catservicios.catservicioname','tblhospitalesservicios.catserviciodescription','cathospital.catHospitalName',DB::raw('SUBSTRING_INDEX(catservicios.catservicioname, ".", -1) AS catservicionameFormat'))->
                        get();

        return $servicios;
    }

    public function especialidadByHospital($idHospital){

        $servicios=DB::table('catespecialidad')->
                        join('tblhospitalespecialidades', 'tblhospitalespecialidades.idcatespecialidad', '=', 'catespecialidad.idcatespecialidad')->
                        join('cathospital', 'cathospital.idcatHospital', '=', 'tblhospitalespecialidades.idcathospital')->
                        where('tblhospitalespecialidades.idcathospital','=', $idHospital)/*->
                        select('catespecialidad.idcatespecialidad','catespecialidad.catespecialidad','cathospital.catHospitalName')*/
                        ->get();

        return $servicios;
    }

    public function especialidad($idHospital, $idEspecialidad){

        $especialidad=DB::table('catespecialidad')
                        ->join('tblhospitalespecialidades', 'tblhospitalespecialidades.idcatespecialidad', '=', 'catespecialidad.idcatespecialidad')
                        ->join('cathospital', 'cathospital.idcatHospital', '=', 'tblhospitalespecialidades.idcathospital')
                        ->where('tblhospitalespecialidades.idcathospital','=', $idHospital)
                        ->where('catespecialidad.idcatespecialidad', '=', $idEspecialidad)
                        ->get();

        return $especialidad;
    }

}

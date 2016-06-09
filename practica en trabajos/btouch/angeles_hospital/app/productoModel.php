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

class productoModel extends Model
{
    protected $table = "catproductos";
    protected $primaryKey = "idcatproductos";
    protected $fillable = ['productosname','productodescripcion','productoimg','productoimgbanner'];
    protected $guarded = ['idcatproductos'];
    public $timestamps = false;

    public function obtenerTodosLosProductos(){
        $productos=$this->all();
        return json_encode($productos);
    }

    public function obtenerTodosLosProductosLimit($rows=50,$limit=0){
        $productos=productoModel::orderby("productoname","asc")->take($rows)->skip($limit)->get();
        return json_encode($productos);
    }

    public function listarProductos(){

        $datos=$this->obtenerTodosLosProductosLimit();
        $arrayProductos=json_decode($datos,2);
        $fileSystem = new Filesystem();

        foreach($arrayProductos as $ind=>$aProducto){
            if(!isset($aProducto['productoimg'])){
                $arrayProductos[$ind]['srcImage']='/img/default_company_logo.png';
            }else if($aProducto['catservicioimage']==""){
                $arrayProductos[$ind]['srcImage']='/img/default_company_logo.png';
            }else if(!$fileSystem->exists("upload/servicio/".$aProducto['productoimg'])){
                $arrayProductos[$ind]['srcImage']='/img/default_company_logo.png';
            }else{
                $arrayProductos[$ind]['srcImage']="/upload/producto/".$aProducto['productoimg'];
            }
            $arrayProductos[$ind]['productoHospitales']=$this->hospitalByProducto($aProducto['idcatproductos']);
        }

        return $arrayProductos;
    }

    public function listarProductosLimit($request){

        $datos=$this->obtenerTodosLosProductosLimit($request->rows,$request->limit);
        $datos2=$this->obtenerTodosLosProductosLimit($request->rows,($request->limit+$request->rows));
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
                $arrayServicio[$ind]['servicioHospitales']=$this->hospitalByProducto($aHospitales['idcatproductos']);
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

    public function obtenerProducto($idcatHospital,$idProducto){
        $prodcuto=productoModel::join('tblhospitalesproductos as b', 'b.idcatproductos', '=', 'catproductos.idcatproductos')
                                 ->join('cathospital as c', 'c.idcatHospital', '=', 'b.idcathospital')
                                 ->where("catproductos.idcatproductos","=",$idProducto)
                                 ->where("c.idcatHospital","=",$idcatHospital)
                                 ->firstOrFail();


        $prodcuto->srcImage = $this->isImageHere($prodcuto);
        return $prodcuto;
    }

    static function isImageHere($producto){

        $fileSystem = new Filesystem();
        $arrayImg= Array();

        if($producto->productoimg==""){
            $arrayImg['srcImage']='/img/default_company_logo.png';
        }else if(!$fileSystem->exists("upload/servicio/".$producto->productoimg)){
            $arrayImg['srcImage']='/img/default_company_logo.png';
        }else{
            $arrayImg['srcImage']="/upload/servicio/".$producto->productoimg;
        }

        if($producto->productoimgbanner==""){
            $arrayImg['srcImageBanner']='/img/bannerServ.jpg';
        }else if(!$fileSystem->exists("upload/servicio/".$producto->productoimgbanner)){
            $arrayImg['srcImageBanner']='/img/bannerServ.jpg';
        }else{
            $arrayImg['srcImageBanner']="/upload/servicio/".$producto->productoimgbanner;
        }

        return $arrayImg;

    }

    public function hospitalByProducto($idServicio){

        $servicios=DB::table('catproductos')->
        join('tblhospitalesproductos', 'tblhospitalesproductos.idcatproductos', '=', 'catproductos.idcatproductos')->
        join('cathospital', 'cathospital.idcatHospital', '=', 'tblhospitalesproductos.idcathospital')->
        where('tblhospitalesproductos.idcatproductos','=', $idServicio)->
        groupBy('tblhospitalesproductos.idcathospital')->
        select('catproductos.idcatproductos','cathospital.idcatHospital','catproductos.productoname','cathospital.idcatHospital','cathospital.catHospitalName')->
        get();

        return $servicios;
    }
}

<?php
/*
 * Btouch Inc
 * Ricardo Diez
 * Angeles Digital
 * */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
use DB;
use Response;

class servicioModel extends Model
{
    protected $table = "catservicios";
    protected $primaryKey = "idcatservicio";
    protected $fillable = ['catservicioname','catMetaDato'];
    protected $guarded = ['idcatservicio'];
    public $timestamps = false;

    public function obtenerTodosLosServicios(){
        $servicios=servicioModel::orderby("catservicioname","asc")
        ->join('tblhospitalesservicios', 'tblhospitalesservicios.idcatservicio', '=', 'catservicios.idcatservicio')
        ->groupBy('tblhospitalesservicios.idcatservicio')
        ->get();
        
        return json_encode($servicios);
    }

    public function obtenerTodosLosServiciosLimit($rows=50,$limit=0,$idcatHospital=false){
        if($idcatHospital!=false){
            $servicios=servicioModel::orderby("catservicioname","asc")
                ->join('tblhospitalesservicios', 'tblhospitalesservicios.idcatservicio', '=', 'catservicios.idcatservicio')
                ->where('tblhospitalesservicios.idcathospital','=',$idcatHospital)
                ->groupBy('tblhospitalesservicios.idcatservicio')
                ->take($rows)
                ->skip($limit)
                ->get();

        }else{
            $servicios=servicioModel::orderby("catservicioname","asc")
                ->join('tblhospitalesservicios', 'tblhospitalesservicios.idcatservicio', '=', 'catservicios.idcatservicio')
                ->groupBy('tblhospitalesservicios.idcatservicio')
                ->take($rows)
                ->skip($limit)
                ->get();
        }

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
        if(isset($request->hospital)){
            $datos=$this->obtenerTodosLosServiciosLimit($request->rows,$request->limit,$request->hospital);
            $datos2=$this->obtenerTodosLosServiciosLimit($request->rows,($request->limit+$request->rows),$request->hospital);
        }else{
            $datos=$this->obtenerTodosLosServiciosLimit($request->rows,$request->limit);
            $datos2=$this->obtenerTodosLosServiciosLimit($request->rows,($request->limit+$request->rows));

        }

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
            if(isset($request->hospital)) {
                $view = view('servicio.rows-servicio', ['servicios' => $arrayServicio, 'idcatHospital' => $request->hospital])->render();
            }else{
                $view = view('servicio.rows-servicio', ['servicios' => $arrayServicio, 'idcatHospital' => false])->render();
            }
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
        $hospitalModel = new hospitalModel();
        $isDoctor= $menu->isDoctor();

        if($idcatHospital!=false) {
            $servicio = servicioModel::join('tblhospitalesservicios as b', 'b.idcatservicio', '=', 'catservicios.idcatservicio')
                ->join('cathospital as c', 'c.idcatHospital', '=', 'b.idcathospital')
                ->where("catservicios.idcatservicio", "=", $idServicio)
                ->where("c.idcatHospital", "=", $idcatHospital)
                ->firstOrFail();
            $servicio->cuadroMedico = $this->obtenerCuadroMedico($idcatHospital,$idServicio);
        }else{
            $servicio = servicioModel::join('tblhospitalesservicios as b', 'b.idcatservicio', '=', 'catservicios.idcatservicio')
                ->join('cathospital as c', 'c.idcatHospital', '=', 'b.idcathospital')
                ->where("catservicios.idcatservicio", "=", $idServicio)
                ->firstOrFail();
            $servicio->cuadroMedico = false;
        }

        $hospitales=$hospitalModel->listarHospitales();
        $servicio->srcImage = $this->isImageHere($servicio);
        $servicio->hospitales = $this->hospitalByServicio($idServicio);
        foreach ($servicio->hospitales as $ind=>$hs){
            $hospitales[$hs->idcatHospital]['checked'] = "checked";
            $hospitales[$hs->idcatHospital]['catservicioimage'] = $hs->catservicioimage;
            $hospitales[$hs->idcatHospital]['catservicioimagebanner'] = $hs->catservicioimagebanner;
            $hospitales[$hs->idcatHospital]['tbltelefonoservicio'] = $hs->tbltelefonoservicio;
            $hospitales[$hs->idcatHospital]['tblextservicio'] = $hs->tblextservicio;
            $hospitales[$hs->idcatHospital]['tblresponsableservicio'] = $hs->tblresponsableservicio;
            $hospitales[$hs->idcatHospital]['tblhorarioservicio'] = $hs->tblhorarioservicio;
        }
        $servicio->listaHospitales =$hospitales;
//        echo '<pre>';print_r($servicio->listaHospitales);exit;
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
        select('catservicios.idcatservicio','cathospital.idcatHospital','catservicios.catservicioname','tblhospitalesservicios.catserviciodescription','cathospital.idcatHospital','cathospital.catHospitalName','cathospital.catHospitalAddress','cathospital.catHospitalProfileImg','cathospital.catHospitalBannerImg'
              ,'tblhospitalesservicios.catservicioimage','tblhospitalesservicios.catservicioimagebanner','tblhospitalesservicios.tbltelefonoservicio','tblhospitalesservicios.tblextservicio','tblhospitalesservicios.tblresponsableservicio','tblhospitalesservicios.tblhorarioservicio')->
        get();

        foreach($servicios as $ind=>$s){
            $servicios[$ind]->srcImageHospital=hospitalModel::isImageHere($s);
        }

        return $servicios;
    }

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


    public function obtenerCuadroMedico($idHospital,$idServicio){
        $cuadroMedico = DB::table('tblhospitalesservicios')
                    ->where('tblhospitalesservicios.idcathospital','=',$idHospital)
                    ->where('tblhospitalesservicios.idcatservicio','=',$idServicio)
                    ->get();

        return $cuadroMedico;
    }

    public function editarImgProfile($request){

//        $profile_image_patient = Input::file('tblpacienteimgprofile');
        $profile_image_hospital = $request->catservicioimage;

        if(!$this->makeFolders()){
            return false;
        }
        //borrar archivos
        $this->deleteFiles($request->idcatHospital,$profile_image_hospital,$request->oldImgProfile);
        //subir archivos

        $files=$this->uploadFiles($request->idcatservicio,$profile_image_hospital);
        if($files==false){
            return false;
        }
//        $servicio = $this->find($request->idcatservicio);

//        $servicio->catservicioimage=$files['img_profile_name'];

        if(!$servicio=DB::table('tblhospitalesservicios')->where('idcathospital', $request->idcatHospital)->where('idcatservicio', $request->idcatservicio)->update(array('catservicioimage' => $files['img_profile_name']))){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar su imagen de perfil','datos'=>$servicio));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Su imagen de perfil se ha editado satisfactoriamente','datos'=>$servicio));
        }

    }

    public function makeFolders(){
        $fileSystem = new Filesystem();
        if(!$fileSystem->exists("upload/servicio")){
            if(!$fileSystem->makeDirectory("upload/servicio","0755")){
                return false;
            }
        }

        return true;
    }

    public function deleteFiles($idServicio,$img_profile,$img_profile_old){
        $fileSystem = new Filesystem();
        $countProfileImg=count($img_profile);
        //creo la extructura de carpetas para el doctor

        //for profile_img
        if($countProfileImg > 0){
            if($fileSystem->exists("upload/servicio")){
                if(!$fileSystem->delete("upload/servicio/$img_profile_old")){
                    return false;
                }
            }
        }

        return true;

    }

    public function uploadFiles($idServicio,$img_profile){
        $fileSystem = new Filesystem();
        $countProfileImg=count($img_profile);
        //creo la extructura de carpetas para el doctor
        //for profile_img
        if(!empty($img_profile)) {

            $destinationPath =public_path()."/upload/servicio/";

            $file = str_replace('data:image/png;base64,', '', $img_profile);
            $img = str_replace(' ', '+', $file);
            $data = base64_decode($img);
            $filename = date('ymdhis') . '_croppedImage' . ".png";
            $file = $destinationPath . $filename;
            $success = file_put_contents($file, $data);

            // THEN RESIZE IT
            $returnData = "upload/servicio/" . $filename;
            $image = Image::make(file_get_contents(URL::asset($returnData)));
            $image = $image->resize(300,300)->save($destinationPath . $filename);

            if(!$success){
                return false;
            }
        }else{
            $filename="";
        }

        return array('img_profile_name'=>$filename);

    }

    public function editarNombre($request){

        $servicio = $this->find($request->idcatservicio);

        $servicio->catservicioname=strtoupper($request->formDataJson['catservicioname']);

        if(!$servicio->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el nombre del servicio','datos'=>$servicio));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Su nombre se ha editado satisfactoriamente','datos'=>$servicio));
        }

    }

    public function editarDireccion($request){

        if(!$servicio=DB::table('tblhospitalesservicios')->where('idcathospital', $request->idcathospital)->where('idcatservicio', $request->idcatservicio)->update(array('catserviciodescription' => $request->formDataJson['catserviciodescription']))){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar la descripcion del servicio','datos'=>$request->formDataJson['catserviciodescription']));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Su descripcion se ha editado satisfactoriamente','datos'=>$request->formDataJson['catserviciodescription']));
        }

    }

    public function editarCuadroMedico($request){

        if(!$servicio=DB::table('tblhospitalesservicios')
            ->where('idcathospital', $request->idcathospital)
            ->where('idcatservicio', $request->idcatservicio)
            ->update(array('tblresponsableservicio' => $request->formDataJson['tblresponsableservicio'],
                           'tblhorarioservicio' => $request->formDataJson['tblhorarioservicio'],
                           'tbltelefonoservicio' => $request->formDataJson['tbltelefonoservicio'],
                           'tblextservicio' => $request->formDataJson['tblextservicio'],
            ))){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar la descripcion del servicio','datos'=>$request->formDataJson['tblresponsableservicio']));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Su descripcion se ha editado satisfactoriamente','datos'=>$request->formDataJson['tblresponsableservicio']));
        }

    }

    public function editarHospitalesServicio($request){

//        echo '<pre>';print_r($request->formDataJson);exit;

        foreach($request->formDataJson['idcathospital'][$request->formDataJson['idcatservicio']] as $ind=>$idHospital){
                $arrFormat[$idHospital][$request->formDataJson['idcatservicio']]['idcatservicio']=$request->formDataJson['idcatservicio'];
                $arrFormat[$idHospital][$request->formDataJson['idcatservicio']]['idcathospital']=$idHospital;
                $arrFormat[$idHospital][$request->formDataJson['idcatservicio']]['servicio']=$request->formDataJson['catservicioname'];
                $arrFormat[$idHospital][$request->formDataJson['idcatservicio']]['catserviciodescription']=$request->formDataJson['catserviciodescription'];
                $arrFormat[$idHospital][$request->formDataJson['idcatservicio']]['hospital']=$request->formDataJson['catSiglas'][$request->formDataJson['idcatservicio']][$idHospital];
                $arrFormat[$idHospital][$request->formDataJson['idcatservicio']]['catservicioimage']=$request->formDataJson['catservicioimage'][$request->formDataJson['idcatservicio']][$idHospital];
                $arrFormat[$idHospital][$request->formDataJson['idcatservicio']]['catservicioimagebanner']=$request->formDataJson['catservicioimagebanner'][$request->formDataJson['idcatservicio']][$idHospital];
                $arrFormat[$idHospital][$request->formDataJson['idcatservicio']]['tbltelefonoservicio']=$request->formDataJson['tbltelefonoservicio'][$request->formDataJson['idcatservicio']][$idHospital];
                $arrFormat[$idHospital][$request->formDataJson['idcatservicio']]['tblresponsableservicio']=$request->formDataJson['tblresponsableservicio'][$request->formDataJson['idcatservicio']][$idHospital];
                $arrFormat[$idHospital][$request->formDataJson['idcatservicio']]['tblhorarioservicio']=$request->formDataJson['tblhorarioservicio'][$request->formDataJson['idcatservicio']][$idHospital];
        }

        foreach ($arrFormat as $indA=>$ia){
            foreach ($ia as $indB=>$iB) {
                $insert[]=$ia[$indB];
            }
        }
//        echo '<pre>';print_r($insert);exit;
        if(!DB::table('tblhospitalesservicios')->where('idcatservicio', '=', $request->formDataJson['idcatservicio'])->delete()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar la información del servicio','datos'=>$insert));
        }else{
            if(!DB::table('tblhospitalesservicios')->insert($insert)){
                return Response::json(array('estado'=>'0','msg'=>'Error al Editar la información del servicio','datos'=>$insert));
            }else{
                return Response::json(array('estado'=>'1','msg'=>'Su información se ha editado satisfactoriamente','datos'=>$insert));
            }
        }


    }

    public function nuevoServicio($request){

        $this->catservicioname =$request->formDataJson['catservicioname'];
        $this->save();
        $id_servicio=$this->idcatservicio;
        $insert=[];
        foreach($request->formDataJson['idcathospital'] as $ind=>$h){
            $insert[]=["idcathospital"=>$h,
                       "idcatservicio"=>$id_servicio,
                       "servicio"=>$request->formDataJson['catservicioname'],
                       "catserviciodescription"=>$request->formDataJson['catserviciodescription'],
                       "hospital"=>$request->formDataJson['hospital'][$h]
            ];
        }

        if(!DB::table('tblhospitalesservicios')->insert($insert)){
            return json_encode(array('estado'=>'0','msg'=>'Error al registrar el hospital','datos'=>$this));
        }else{
            return json_encode(array('estado'=>'1','msg'=>'El registro se ha realizado satisfactoriamente','datos'=>$this));
        }

    }

}

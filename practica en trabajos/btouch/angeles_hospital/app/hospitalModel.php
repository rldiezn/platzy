<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\URL;
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
            }else if(!$fileSystem->exists("upload/hospitales/FACHADASG/FACHADASCH/".$aHospitales['catHospitalProfileImg'])){
                $arrayHospitales[$ind]['srcImage']='/img/default_company_logo.png';
            }else{
                $arrayHospitales[$ind]['srcImage']="/upload/hospitales/FACHADASG/FACHADASCH/".$aHospitales['catHospitalProfileImg'];
            }
        }
        $arrayHospitalesFormat="";
        foreach($arrayHospitales as $ind=>$aHospitales){
            $arrayHospitalesFormat[$aHospitales['idcatHospital']]=$aHospitales;
        }

        return $arrayHospitalesFormat;
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
        $servicioM=new servicioModel();
        $hospital=$this->find($idHospital);
        $hospital->srcImage = $this->isImageHere($hospital);
        $hospital->services = $this->servicioByHospital($idHospital);
//        $hospital->doctors = json_decode($doctorM->directorioMedico($idHospital),2);//TODO
        $hospital->doctors = json_decode($doctorM->listarDoctoresLimit(50,0,$hospital->catSiglas),2);//TODO
        $request =  (object)[];//declaro un objeto vacio
        $request->rows=50;
        $request->limit=0;
        $request->hospital=$idHospital;
        $hospital->servicios = json_decode($servicioM->listarServiciosLimit($request),2);
//        echo '<pre>';print_r($hospital->servicios['disabled']);exit;
        $hospital->products = $this->productoByHospital($idHospital);
        $hospital->especialidades = $this->especialidadByHospital($idHospital);
        return $hospital;
    }

    static function isImageHere($hospital){

        $fileSystem = new Filesystem();
        $arrayImg= Array();

        if($hospital->catHospitalProfileImg==""){
            $arrayImg['srcImage']='/img/default_company_logo.png';
        }else if(!$fileSystem->exists("upload/hospitales/FACHADASG/FACHADASCH/".$hospital->catHospitalProfileImg)){
            $arrayImg['srcImage']='/img/default_company_logo.png';
        }else{
            $arrayImg['srcImage']="/upload/hospitales/FACHADASG/FACHADASCH/".$hospital->catHospitalProfileImg;
        }
//        var_dump($hospital->catHospitalBannerImg);exit;
        if($hospital->catHospitalBannerImg==""){
            $arrayImg['srcImageBanner']='';
        }else if(!$fileSystem->exists("upload/hospitales/FACHADASG/".$hospital->catHospitalBannerImg)){
            $arrayImg['srcImageBanner']='';
        }else{
            $arrayImg['srcImageBanner']="/upload/hospitales/FACHADASG/".$hospital->catHospitalBannerImg;
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

    public function editarNombre($request){

        $hospital = $this->find($request->idcatHospital);

        $hospital->catHospitalName=strtoupper($request->formDataJson['catHospitalName']);

        if(!$hospital->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el nombre del hospital','datos'=>$hospital));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Su nombre se ha editado satisfactoriamente','datos'=>$hospital));
        }

    }

    public function editarDireccion($request){

        $hospital = $this->find($request->idcatHospital);

        $hospital->catHospitalAddress=$request->formDataJson['catHospitalAddress'];

        if(!$hospital->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar la direccion del hospital','datos'=>$hospital));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'La dirección se ha editado satisfactoriamente','datos'=>$hospital));
        }

    }

    public function editarTlfnUrgencias($request){

        $hospital = $this->find($request->idcatHospital);

        $hospital->catHospitalUrgencias=$request->formDataJson['catHospitalUrgencias'];

        if(!$hospital->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el número de urgenias del hospital','datos'=>$hospital));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'El número de urgencia se ha editado satisfactoriamente','datos'=>$hospital));
        }

    }

    public function editarTlfn($request){

        $hospital = $this->find($request->idcatHospital);

        $hospital->catHospitalTelefono=$request->formDataJson['catHospitalTelefono'];

        if(!$hospital->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el número de télefono del hospital','datos'=>$hospital));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'El número de télefono se ha editado satisfactoriamente','datos'=>$hospital));
        }

    }

    public function editarDescripcion($request){

        $hospital = $this->find($request->idcatHospital);

        $hospital->catHospitalDescription=$request->formDataJson['catHospitalDescription'];

        if(!$hospital->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar la descripción del hospital','datos'=>$hospital));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'La descripción se ha editado satisfactoriamente','datos'=>$hospital));
        }

    }

    public function editarGeolacalizacion($request){

        $hospital = $this->find($request->idcatHospital);

        $hospital->catHospitalLatitude=$request->formDataJson['catHospitalLatitude'];
        $hospital->catHospitalLongitude=$request->formDataJson['catHospitalLongitude'];

        if(!$hospital->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar la geolacalización del hospital','datos'=>$hospital));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'La geolacalización se ha editado satisfactoriamente','datos'=>$hospital));
        }

    }

    public function editarImgProfile($request){

//        $profile_image_patient = Input::file('tblpacienteimgprofile');
        $profile_image_hospital = $request->catHospitalProfileImg;

        if(!$this->makeFolders()){
            return false;
        }
        //borrar archivos
        $this->deleteFiles($request->idcatHospital,$profile_image_hospital,$request->oldImgProfile);
        //subir archivos

        $files=$this->uploadFiles($request->idcatHospital,$profile_image_hospital);
        if($files==false){
            return false;
        }

        $hospital = $this->find($request->idcatHospital);

        $hospital->catHospitalProfileImg=$files['img_profile_name'];

        if(!$hospital->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar su imagen de perfil','datos'=>$hospital));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Su imagen de perfil se ha editado satisfactoriamente','datos'=>$hospital));
        }

    }

    public function makeFolders(){
        $fileSystem = new Filesystem();
        if(!$fileSystem->exists("upload/hospitales")){
            if(!$fileSystem->makeDirectory("upload/hospitales","0755")){
                return false;
            }
        }
        if(!$fileSystem->exists("upload/hospitales/FACHADASG")){
            if(!$fileSystem->makeDirectory("upload/hospitales/FACHADASG","0755")){
                return false;
            }
        }
        if(!$fileSystem->exists("upload/hospitales/FACHADASG/FACHADASCH")){
            if(!$fileSystem->makeDirectory("upload/hospitales/FACHADASG/FACHADASCH","0755")){
                return false;
            }
        }

        return true;
    }

    public function deleteFiles($idPaciente,$img_profile,$img_profile_old){
        $fileSystem = new Filesystem();
        $countProfileImg=count($img_profile);
        //creo la extructura de carpetas para el doctor

        //for profile_img
        if($countProfileImg > 0){
            if($fileSystem->exists("upload/hospitales/FACHADASG/FACHADASCH")){
                if(!$fileSystem->delete("upload/hospitales/FACHADASG/FACHADASCH/$img_profile_old")){
                    return false;
                }
            }
        }

        return true;

    }

    public function uploadFiles($idPaciente,$img_profile){
        $fileSystem = new Filesystem();
        $countProfileImg=count($img_profile);
        //creo la extructura de carpetas para el doctor
        //for profile_img
        if(!empty($img_profile)) {

            $destinationPath =public_path()."/upload/hospitales/FACHADASG/FACHADASCH/";

            $file = str_replace('data:image/png;base64,', '', $img_profile);
            $img = str_replace(' ', '+', $file);
            $data = base64_decode($img);
            $filename = date('ymdhis') . '_croppedImage' . ".png";
            $file = $destinationPath . $filename;
            $success = file_put_contents($file, $data);

            // THEN RESIZE IT
            $returnData = "upload/hospitales/FACHADASG/FACHADASCH/" . $filename;
            $image = Image::make(file_get_contents(URL::asset($returnData)));
            $image = $image->resize(300,300)->save($destinationPath . $filename);

            if(!$success){
                return false;
            }
        }else{
            $filename="";
        }
        /*if($countProfileImg > 0){
            if($fileSystem->exists("upload/pacientes/$idPaciente/profile_img/")){
                $name=date('Ymdhis').'.'.$img_profile->getClientOriginalExtension();
                if(!$img_profile->move("upload/pacientes/$idPaciente/profile_img",$name)){
                    return false;
                }
            }
        }else{
            $name="";
        }*/

        return array('img_profile_name'=>$filename);

    }

    public function nuevoHospital($request){

        $this->catSiglas =$request->idtblDr;
        $this->catHospitalName =$request->formDataJson['catHospitalName'];
        $this->catSiglas =$request->formDataJson['catSiglas'];
        $this->catHospitalAddress =$request->formDataJson['catHospitalAddress'];
        $this->catHospitalDescription = $request->formDataJson['catHospitalDescription'];
        $this->catHospitalTelefono =$request->formDataJson['catHospitalTelefono'];
        $this->catHospitalUrgencias =$request->formDataJson['catHospitalUrgencias'];
        $this->catHospitalLatitude =$request->formDataJson['catHospitalLatitude'];
        $this->catHospitalLongitude =$request->formDataJson['catHospitalLongitude'];
        $this->idcatstatus = '5';


        if(!$this->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al registrar el hospital','datos'=>$this));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'El registro se ha realizado satisfactoriamente','datos'=>$this));
        }

    }

}

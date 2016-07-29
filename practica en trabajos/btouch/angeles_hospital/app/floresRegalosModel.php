<?php
/*
 * Btouch Inc
 * Ricardo Diez
 * Angeles Digital
 * */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Filesystem\Filesystem;
use App\dispModel;
use App\menuModel;

class floresRegalosModel extends Model
{
    protected $table = "catfloresregalos";
    protected $primaryKey = "idfloresregalos";
    protected $fillable = ['nombrefr','precio','descripcion','condiciones_envio','img_principal'];
    protected $guarded = ['idfloresregalos'];
    public $timestamps = false;
    
    public function guardar($request){

        $respuesta = new dispModel();
        if($respuesta->dispositivo($request)){
            $this->nombrefr = $request->nombrefr;
            $this->precio = $request->precio;
            $this->descripcion = $request->descripcion;
            $this->condiciones_envio = $request->condiciones_envio;

            if(!$this->save()){
                return Response::json(array('estado'=>'0','msg'=>'Error al registrar al asistente'));
            }else{
                return Response::json(array('estado'=>'1','msg'=>'Asistente registrado satisfactoriamente'));
            }
        }else{
            $this->nombrefr = $request->formDataJson['nombrefr'];
            $this->precio = $request->formDataJson['precio'];
            $this->descripcion = $request->formDataJson['descripcion'];
            $this->condiciones_envio = $request->formDataJson['condiciones_envio'];
            $this->img_principal = $request->formDataJson['img_principal'];

            if(!$this->save()){
                return json_encode(array('estado'=>'0','msg'=>'Error al registrar al asistente'));
            }else{
                return json_encode(array('estado'=>'1','msg'=>'Asistente registrado satisfactoriamente'));
            }
        }

    }

    public function editar($request){

        $respuesta = new dispModel();
        if($respuesta->dispositivo($request)){
            $asistente = $this->find($request->idtblasistente);

            $asistente->tblasistenteNombre =$request->tblasistenteNombre;
            $asistente->tblasistenteEmail =$request->tblasistenteEmail;
            $asistente->idasistente =$request->idasistente;

            if(!$asistente->save()){
                return Response::json(array('estado'=>'0','msg'=>'Error al Editar el asistente'));
            }else{
                return Response::json(array('estado'=>'1','msg'=>'Asistente se ha editado satisfactoriamente'));
            }
        }else{
            $asistente = $this->find($request->idtblasistente);

            $asistente->tblasistenteNombre =$request->tblasistenteNombre;
            $asistente->tblasistenteEmail =$request->tblasistenteEmail;
            $asistente->tblasistenteDoctores = $request->tblasistenteDoctores;
            $asistente->idasistente =$request->idasistente;

            if(!$asistente->save()){
                return Response::json(array('estado'=>'0','msg'=>'Error al Editar el asistente'));
            }else{
                return Response::json(array('estado'=>'1','msg'=>'Asistente se ha editado satisfactoriamente'));
            }
        }


    }

    public function editarCustom($request){

        $respuesta = new dispModel();
        if($respuesta->dispositivo($request)){
            $asistente = $this->find($request->idtblasistente);

            $asistente->tblasistenteNombre =$request->tblasistenteNombre;
            $asistente->tblasistenteEmail =$request->tblasistenteEmail;
            $asistente->idasistente =$request->idasistente;

            if(!$asistente->save()){
                return Response::json(array('estado'=>'0','msg'=>'Error al Editar el asistente'));
            }else{
                return Response::json(array('estado'=>'1','msg'=>'Asistente se ha editado satisfactoriamente'));
            }
        }else{
            $asistente = $this->find($request->formDataJson['idfloresregalos']);

            if(isset($request->formDataJson['nombrefr'])){
                $asistente->nombrefr =$request->formDataJson['nombrefr'];
            }
            if(isset($request->formDataJson['precio'])){
                $asistente->precio =$request->formDataJson['precio'];
            }
            if(isset($request->formDataJson['descripcion'])){
                $asistente->descripcion =$request->formDataJson['descripcion'];
            }
            if(isset($request->formDataJson['condiciones_envio'])){
                $asistente->condiciones_envio =$request->formDataJson['condiciones_envio'];
            }
            if(isset($request->formDataJson['img_principal'])){
                $asistente->img_principal =$request->formDataJson['img_principal'];
            }

            if(!$asistente->save()){
                return Response::json(array('estado'=>'0','msg'=>'Error al Editar el item','datos'=>$asistente));
            }else{
                return Response::json(array('estado'=>'1','msg'=>'El Item se ha editado satisfactoriamente','datos'=>$asistente));
            }
        }


    }

    public function obtener($idFlores){


        $menu = new menuModel();
        $isDoctor = $menu->isDoctor();
        $flores = $this->find($idFlores);
        $flores->srcImage= $this->isImageHere($flores);
        return view('flores.edit-perfil-floresregalos',['flores'=>$flores,'isDoctor'=>$isDoctor]);
            


    }

    public function obtenerTodos($request){
        $respuesta = new dispModel();
        if($respuesta->dispositivo($request)){
            $asistentes= floresRegalosModel::all();
            if($asistentes){
                return Response::json(array('success'=>'1','data'=>$asistentes,'msg'=>'Registros obtenidos con exito.'));
            }else{
                return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
            }
        }else{
            $menu = new menuModel();
            $isDoctor = $menu->isDoctor();
            $flores= floresRegalosModel::all();
            foreach($flores as $ind=>$f){
                $flores[$ind]->srcImage= $this->isImageHere($flores[$ind]);
            }

            return view('flores.show-all-floresregalos',['flores'=>$flores,'isDoctor'=>$isDoctor]);

        }

    }

    public function editarMainImg($request){

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

    public function makeFolders($idFr){
        $fileSystem = new Filesystem();
        if(!$fileSystem->exists("upload/flores_regalos")){
            if(!$fileSystem->makeDirectory("upload/flores_regalos","0755")){
                return false;
            }
        }

        if(!$fileSystem->exists("upload/flores_regalos/$idFr")){
            if(!$fileSystem->makeDirectory("upload/flores_regalos/$idFr","0755")){
                return false;
            }
        }

        return true;
    }

    public function deleteFiles($idFr,$img_profile,$img_profile_old){
        $fileSystem = new Filesystem();
        $countProfileImg=count($img_profile);
        //creo la extructura de carpetas para el doctor

        //for profile_img
        if($countProfileImg > 0){
            if($fileSystem->exists("upload/flores_regalos")){
                if(!$fileSystem->delete("upload/flores_regalos/$idFr/$img_profile_old")){
                    return false;
                }
            }
        }

        return true;

    }

    public function uploadFiles($idFr,$img_profile){
        $fileSystem = new Filesystem();
        $countProfileImg=count($img_profile);
        //creo la extructura de carpetas para el doctor
        //for profile_img
        if(!empty($img_profile)) {

            $destinationPath =public_path()."/upload/flores_regalos/$idFr/";

            $file = str_replace('data:image/png;base64,', '', $img_profile);
            $img = str_replace(' ', '+', $file);
            $data = base64_decode($img);
            $filename = date('ymdhis') . '_croppedImage' . ".png";
            $file = $destinationPath . $filename;
            $success = file_put_contents($file, $data);

            // THEN RESIZE IT
            $returnData = "upload/flores_regalos/$idFr/" . $filename;
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

    static function isImageHere($floresRegalo){

        $fileSystem = new Filesystem();
        $arrayImg= Array();
        /*if($floresRegalo['img_principal']==""){
            $arrayImg['srcImage']='/img/default_company_logo.png';
        }else if(!$fileSystem->exists("upload/flores_regalos/".$floresRegalo['idfloresregalos']."/".$floresRegalo['img_principal'])){
            $arrayImg['srcImage']='/img/default_company_logo.png';
        }else{
            $arrayImg['srcImage']="/upload/flores_regalos/".$floresRegalo['idfloresregalos']."/".$floresRegalo['img_principal'];
        }*/
        if($floresRegalo['img_principal']==""){
            $arrayImg['srcImage']='/img/default_company_logo.png';
        }else{
            $arrayImg['srcImage']=$floresRegalo['img_principal'];
        }

        return $arrayImg;

    }

    public function cargarCSV($request){

        echo '<pre>';print_r($request->all());exit;

        $respuesta = new dispModel();
        if($respuesta->dispositivo($request)){
            $asistentes= floresRegalosModel::all();
            if($asistentes){
                return Response::json(array('success'=>'1','data'=>$asistentes,'msg'=>'Registros obtenidos con exito.'));
            }else{
                return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
            }
        }else{
            $menu = new menuModel();
            $isDoctor = $menu->isDoctor();
            $flores= floresRegalosModel::all();
            foreach($flores as $ind=>$f){
                $flores[$ind]->srcImage= $this->isImageHere($flores[$ind]);
            }

            return view('flores.show-all-floresregalos',['flores'=>$flores,'isDoctor'=>$isDoctor]);

        }


    }
    
}

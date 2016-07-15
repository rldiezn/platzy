<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\URL;
use DB;

class socialinModel extends Model
{
    protected $table = "tblsocialin";
    protected $primaryKey = "idtblsocialin";
    protected $fillable = ['idtblusers','tblsocialinprofhead','tblsocialinaddress','tblsocialincountry','tblsocialinsummary','tblsocialinimgprofile','idcatstatus'];
    protected $guarded = ['idtblsocialin'];
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo('App\user','idtblusers','id');//model,local_key,parent_key
    }


    public function guardarSocialin($request){

        $this->idtblusers =$request->idtblusers;
        $this->tblsocialinprofhead =$request->tblsocialinprofhead;
        $this->tblsocialinaddress =$request->tblsocialinaddress;
        $this->tblsocialinsummary =$request->tblsocialinsummary;
        $this->tblsocialinimgprofile =$request->tblsocialinimgprofile;
        $this->idcatstatus = '';

        if(!$this->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al guardar el linkedin'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Linkedin guardado satisfactoriamente'));
        }
    }

    public function editarSocialin($request){

        DB::table('user')->where('id', $request->idtblusers)->update(array('name' => $request->name, 'paterno' => $request->paterno, 'materno' => $request->materno));

        $linkedin = $this->find($request->idtblsocialin);

        $linkedin->idtblusers =$request->idtblusers;
        $linkedin->tblsocialinprofhead =$request->tblsocialinprofhead;
        $linkedin->tblsocialinaddress =$request->tblsocialinaddress;
        $linkedin->tblsocialinsummary =$request->tblsocialinsummary;

        if(!$linkedin->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el linkedin'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Linkedin se ha editado satisfactoriamente'));
        }
    }

    public function eliminarSocialin($request){
        $linkedin = $this->find($request->idtblsocialin);
        $linkedin->idcatstatus = 4;
        if(!$linkedin->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al eliminar el experiencia'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'experiencia eliminado satisfactoriamente'));
        }
    }

    public function obtenerSocialin($request){
        $linkedin= DB::table('tblsocialin')
            ->join('user', 'tblsocialin.idtblusers', '=', 'user.id')
            ->where("tblsocialin.idtblusers", "=", $request->idtblusers)
            ->get();
        if($linkedin){
            return Response::json(array('success'=>'1','data'=>$linkedin,'msg'=>'Registros obtenidos con exito.'));
        }else{
            return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
        }

    }

    public function editarDireccion($request){

        $linkedin = $this->find($request->formDataJson['idtblsocialin']);

        $linkedin->tblsocialinaddress=$request->formDataJson['tblsocialinaddress'];
        $linkedin->tblsocialincountry=$request->formDataJson['tblsocialincountry'];
        $linkedin->tblsocialinprofhead=$request->formDataJson['tblsocialinprofhead'];

        if(!$linkedin->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el Dirección','datos'=>$linkedin));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Su dirección se ha editado satisfactoriamente','datos'=>$linkedin));
        }

    }

    public function editarExtracto($request){

        $linkedin = $this->find($request->idtblsocialin);

        $linkedin->tblsocialinsummary=$request->formDataJson['tblsocialinsummary'];

        if(!$linkedin->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el Extracto','datos'=>$linkedin));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Su extracto se ha editado satisfactoriamente','datos'=>$linkedin));
        }

    }

    public function editarImgProfile($request){

//        $profile_image_doctor = Input::file('tblLinkedInDrImg');
        $profile_image_doctor = $request->tblLinkedInDrImg;
        $CVmedico = Input::file('tblLinkedInDrCV');
        $bannerImg = Input::file('tblLinkedInDrBannerImg');

        if(!$this->makeFolders($request->idtblDr)){
            return false;
        }
        //borrar archivos
        $this->deleteFiles($request->idtblDr,$profile_image_doctor,$CVmedico,$bannerImg,$request->oldImgProfile,$request->oldCV,$request->oldBannerImg);
        //subir archivos

        $files=$this->uploadFiles($request->idtblDr,$profile_image_doctor,$CVmedico,$bannerImg);
        if($files==false){
            return false;
        }


        $linkedin = $this->find($request->idtblLinkedInDr);

        $linkedin->tblLinkedInDrImg=$files['img_profile_name'];

        if(!$linkedin->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el Extracto','datos'=>$linkedin));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Su extracto se ha editado satisfactoriamente','datos'=>$files['img_profile_name']));
        }

    }

    public function makeFolders($idUser){
        $fileSystem = new Filesystem();
        if(!$fileSystem->exists("upload/users")){
            if(!$fileSystem->makeDirectory("upload/users","0755")){
                return false;
            }
        }
        if(!$fileSystem->exists("upload/users/$idUser")){
            if(!$fileSystem->makeDirectory("upload/users/$idUser","0755")){
                return false;
            }
        }
        if(!$fileSystem->exists("upload/users/$idUser/profile_img")){
            if(!$fileSystem->makeDirectory("upload/users/$idUser/profile_img","0755")){
                return false;
            }
        }

        return true;
    }

    public function uploadFiles($idUser,$img_profile,$cv,$bannerImg){
        $fileSystem = new Filesystem();
        $countProfileImg=count($img_profile);
        $countCV= count($cv);
        $countBanner= count($bannerImg);
        //creo la extructura de carpetas para el doctor
        //for profile_img

        if(!empty($img_profile)) {

            $destinationPath =public_path()."/upload/users/$idUser/profile_img/";

            $file = str_replace('data:image/png;base64,', '', $img_profile);
            $img = str_replace(' ', '+', $file);
            $data = base64_decode($img);
            $filename = date('ymdhis') . '_croppedImage' . ".png";
            $file = $destinationPath . $filename;
            $success = file_put_contents($file, $data);

            // THEN RESIZE IT
            $returnData = "upload/users/$idUser/profile_img/" . $filename;
            $image = Image::make(file_get_contents(URL::asset($returnData)));
            $image = $image->resize(300,300)->save($destinationPath . $filename);

            if(!$success){
                return false;
            }
        }else{
            $filename="";
        }

        //for cv
        if($countCV > 0) {
            if ($fileSystem->exists("upload/users/$idUser/cv/")) {
                $nameCV = date('Ymdhis') . '.' . $cv->getClientOriginalExtension();
                if (!$cv->move("upload/users/$idUser/cv", $nameCV)) {
                    return false;
                }
            }
        }else{
            $nameCV="";
        }

        //for banner_img
        if($countBanner > 0) {
            if ($fileSystem->exists("upload/users/$idUser/banner_img/")) {
                $nameBanner = date('Ymdhis') . '.' . $bannerImg->getClientOriginalExtension();
                if (!$bannerImg->move("upload/users/$idUser/banner_img", $nameBanner)) {
                    return false;
                }
            }
        }else{
            $nameBanner="";
        }

        return array('img_profile_name'=>$filename,'cv_name'=>$nameCV,'banner_name'=>$nameBanner);

    }

    public function deleteFiles($idUser,$img_profile,$cv,$bannerImg,$img_profile_old,$cv_old,$bannerImg_old){
        $fileSystem = new Filesystem();
        $countProfileImg=count($img_profile);
        $countCV= count($cv);
        $countBanner= count($bannerImg);
        //creo la extructura de carpetas para el doctor

        //for profile_img
        if($countProfileImg > 0){
            if($fileSystem->exists("upload/users/$idUser/profile_img/")){
                if(!$fileSystem->delete("upload/users/$idUser/profile_img/$img_profile_old")){
                    return false;
                }
            }
        }

        //for cv
        if($countCV > 0) {
            if ($fileSystem->exists("upload/users/$idUser/cv/")) {
                if(!$fileSystem->delete("upload/users/$idUser/cv/$cv_old")){
                    return false;
                }
            }
        }

        //for banner_img
        if($countBanner > 0) {
            if ($fileSystem->exists("upload/users/$idUser/banner_img/")) {
                if(!$fileSystem->delete("upload/users/$idUser/banner_img/$bannerImg_old")){
                    return false;
                }
            }
        }

        return true;

    }
}

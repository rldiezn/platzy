<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\URL;
use DB;

class linkedinModel extends Model
{
    protected $table = "tbllinkedindr";
    protected $primaryKey = "idtblLinkedInDr";
    protected $fillable = ['tblDoctorName','idtblDr','tblLinkedInDrProfHead','tblLinkedInDrAddress','tblLinkedInDrCountry','idcatHospital','tblLinkedInDrSummary','tblLinkedInDrImg','tblLinkedInDrCV','tblLinkedInDrBannerImg','tblLinkedInDrBannerImg','idcatstatus'];
    protected $guarded = ['idtblLinkedInDr'];
    public $timestamps = false;


    public function doctor()
    {
        return $this->belongsTo('App\doctorModel','idtblDr','idtblDr');//model,local_key,parent_key
    }


    public function guardarLinkedin($request){

        $this->idtblDr =$request->idtblDr;
        $this->tblLinkedInDrProfHead =$request->tblLinkedInDrProfHead;
        $this->tblLinkedInDrAddress =$request->tblLinkedInDrAddress;
        $this->idcatHospital =$request->idcatHospital;
        $this->tblLinkedInDrSummary =$request->tblLinkedInDrSummary;
        $this->tblLinkedInDrImg =$request->tblLinkedInDrImg;
        $this->tblLinkedInDrCV =$request->tblLinkedInDrCV;
        $this->tblLinkedInDrBannerImg =$request->tblLinkedInDrBannerImg;
        $this->idcatstatus = '5';

        if(!$this->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al guardar el linkedin'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Linkedin guardado satisfactoriamente'));
        }
    }

    public function editarLinkedin($request){

        DB::table('tbldr')->where('idtblDr', $request->idtblDr)->update(array('tblDoctorName' => $request->tblDoctorName, 'tblDoctorPaterno' => $request->tblDoctorPaterno));

        $linkedin = $this->find($request->idtblLinkedInDr);

        $linkedin->idtblDr =$request->idtblDr;
        $linkedin->tblLinkedInDrProfHead =$request->tblLinkedInDrProfHead;
        $linkedin->tblLinkedInDrAddress =$request->tblLinkedInDrAddress;
        $linkedin->tblLinkedInDrSummary =$request->tblLinkedInDrSummary;

        if(!$linkedin->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el linkedin'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Linkedin se ha editado satisfactoriamente'));
        }
    }

    public function eliminarLinkedin($request){
        /*$linkedin=['idcatstatus'=>'4'];
        if(!linkedinModel::where('idtblLinkedInDr', '=', $request->idtblLinkedInDr)
            ->where('idtblDr', '=', $request->idtblDr)
            ->update($linkedin)){*/
        $linkedin = $this->find($request->idtblLinkedInDr);
        $linkedin->idcatstatus = 4;
        if(!$linkedin->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al eliminar el experiencia'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'experiencia eliminado satisfactoriamente'));
        }
    }

    public function obtenerLinkedin($request){
        $linkedin= DB::table('tbllinkedindr')
            ->join('tbldr', 'tbllinkedindr.idtblDr', '=', 'tbldr.idtblDr')
            ->join('cathospital', 'tbldr.cathospital', '=', 'cathospital.catSiglas')
            ->where("tbllinkedindr.idtblDr", "=", $request->idtblDr)
            ->select("tbldr.*", "tbllinkedindr.*", "cathospital.*")
            ->get();
        if($linkedin){
            return Response::json(array('success'=>'1','data'=>$linkedin,'msg'=>'Registros obtenidos con exito.'));
        }else{
            return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
        }

    }

    public function editarDireccion($request){

        $linkedin = $this->find($request->formDataJson['idtblLinkedInDr']);

        $linkedin->tblLinkedInDrAddress=$request->formDataJson['tblLinkedInDrAddress'];
        $linkedin->tblLinkedInDrCountry=$request->formDataJson['tblLinkedInDrCountry'];
        $linkedin->tblLinkedInDrProfHead=$request->formDataJson['tblLinkedInDrProfHead'];

        if(!$linkedin->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el Dirección','datos'=>$linkedin));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Su dirección se ha editado satisfactoriamente','datos'=>$linkedin));
        }

    }

    public function editarExtracto($request){

        $linkedin = $this->find($request->idtblLinkedInDr);

        $linkedin->tblLinkedInDrSummary=$request->formDataJson['tblLinkedInDrSummary'];

        if(!$linkedin->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el Extracto','datos'=>$linkedin));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Su extracto se ha editado satisfactoriamente','datos'=>$linkedin));
        }

    }

    public function editarCV($request){

        $profile_image_doctor = Input::file('tblLinkedInDrImg');
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

        $linkedin->tblLinkedInDrCV=$files['cv_name'];

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

    public function editarImgBanner($request){

        $profile_image_doctor = Input::file('tblLinkedInDrImg');
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

        $linkedin->tblLinkedInDrBannerImg=$files['banner_name'];

        if(!$linkedin->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el Extracto','datos'=>$linkedin));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Su extracto se ha editado satisfactoriamente','datos'=>$linkedin));
        }

    }

    public function makeFolders($idDoctor){
        $fileSystem = new Filesystem();
        if(!$fileSystem->exists("upload/doctores")){
            if(!$fileSystem->makeDirectory("upload/doctores","0755")){
                return false;
            }
        }
        if(!$fileSystem->exists("upload/doctores/$idDoctor")){
            if(!$fileSystem->makeDirectory("upload/doctores/$idDoctor","0755")){
                return false;
            }
        }
        if(!$fileSystem->exists("upload/doctores/$idDoctor/profile_img")){
            if(!$fileSystem->makeDirectory("upload/doctores/$idDoctor/profile_img","0755")){
                return false;
            }
        }
        if(!$fileSystem->exists("upload/doctores/$idDoctor/cv")){
            if(!$fileSystem->makeDirectory("upload/doctores/$idDoctor/cv","0755")){
                return false;
            }
        }
        if(!$fileSystem->exists("upload/doctores/$idDoctor/banner_img")){
            if(!$fileSystem->makeDirectory("upload/doctores/$idDoctor/banner_img","0755")){
                return false;
            }
        }

        return true;
    }

    public function uploadFiles($idDoctor,$img_profile,$cv,$bannerImg){
        $fileSystem = new Filesystem();
        $countProfileImg=count($img_profile);
        $countCV= count($cv);
        $countBanner= count($bannerImg);
        //creo la extructura de carpetas para el doctor
        //for profile_img

        if(!empty($img_profile)) {

            $destinationPath =public_path()."/upload/doctores/$idDoctor/profile_img/";

            $file = str_replace('data:image/png;base64,', '', $img_profile);
            $img = str_replace(' ', '+', $file);
            $data = base64_decode($img);
            $filename = date('ymdhis') . '_croppedImage' . ".png";
            $file = $destinationPath . $filename;
            $success = file_put_contents($file, $data);

            // THEN RESIZE IT
            $returnData = "upload/doctores/$idDoctor/profile_img/" . $filename;
            $image = Image::make(file_get_contents(URL::asset($returnData)));
            $image = $image->resize(300,300)->save($destinationPath . $filename);

            if(!$success){
                return false;
            }
        }else{
            $filename="";
        }

        /*if($countProfileImg > 0){
            if($fileSystem->exists("upload/doctores/$idDoctor/profile_img/")){
                $name=date('Ymdhis').'.'.$img_profile->getClientOriginalExtension();

                if(stripos($name, '?')) {
                    $filename = explode('?', $name);

                    $name = $filename[0];
                }

                if(!$img_profile->move("upload/doctores/$idDoctor/profile_img",$name)){
                if(file_put_contents($file, $data)){
                    return false;
                }
            }
        }else{
            $name="";
        }*/

        //for cv
        if($countCV > 0) {
            if ($fileSystem->exists("upload/doctores/$idDoctor/cv/")) {
                $nameCV = date('Ymdhis') . '.' . $cv->getClientOriginalExtension();
                if (!$cv->move("upload/doctores/$idDoctor/cv", $nameCV)) {
                    return false;
                }
            }
        }else{
            $nameCV="";
        }

        //for banner_img
        if($countBanner > 0) {
            if ($fileSystem->exists("upload/doctores/$idDoctor/banner_img/")) {
                $nameBanner = date('Ymdhis') . '.' . $bannerImg->getClientOriginalExtension();
                if (!$bannerImg->move("upload/doctores/$idDoctor/banner_img", $nameBanner)) {
                    return false;
                }
            }
        }else{
            $nameBanner="";
        }

        return array('img_profile_name'=>$filename,'cv_name'=>$nameCV,'banner_name'=>$nameBanner);

    }

    public function deleteFiles($idDoctor,$img_profile,$cv,$bannerImg,$img_profile_old,$cv_old,$bannerImg_old){
        $fileSystem = new Filesystem();
        $countProfileImg=count($img_profile);
        $countCV= count($cv);
        $countBanner= count($bannerImg);
        //creo la extructura de carpetas para el doctor

        //for profile_img
        if($countProfileImg > 0){
            if($fileSystem->exists("upload/doctores/$idDoctor/profile_img/")){
                if(!$fileSystem->delete("upload/doctores/$idDoctor/profile_img/$img_profile_old")){
                    return false;
                }
            }
        }

        //for cv
        if($countCV > 0) {
            if ($fileSystem->exists("upload/doctores/$idDoctor/cv/")) {
                if(!$fileSystem->delete("upload/doctores/$idDoctor/cv/$cv_old")){
                    return false;
                }
            }
        }

        //for banner_img
        if($countBanner > 0) {
            if ($fileSystem->exists("upload/doctores/$idDoctor/banner_img/")) {
                if(!$fileSystem->delete("upload/doctores/$idDoctor/banner_img/$bannerImg_old")){
                    return false;
                }
            }
        }

        return true;

    }

    public function obtenerPerfil($request){
        $linkedin= DB::table('tlbpaciente')
            ->join('tblcontactopaciente', 'tlbpaciente.idtblpaciente', '=', 'tblcontactopaciente.idtblpaciente')
            ->where("tlbpaciente.idtblpaciente", "=", $request->idtblpaciente)
            ->get();
        if($linkedin){
            return Response::json(array('success'=>'1','data'=>$linkedin,'msg'=>'Registros obtenidos con exito.'));
        }else{
            return Response::json(array('success'=>'0','data'=>'','msg'=>'No hay registro asociados'));
        }

    }

    public function editarPerfil($request){

        $linkedin = DB::table('tlbpaciente')->where('idtblpaciente', $request->idtblpaciente)
        ->update(['tblpacientename' => $request->tblpacientename, 'tblpacientepaterno' => $request->tblpacientepaterno,
                  'tblpacientematerno' => $request->tblpacientematerno, 'tblpacienteemail' => $request->tblpacienteemail,
                  'tblpacienterfc' => $request->tblpacienterfc, 'idcatstatus' => $request->idcatstatus]);

        if($linkedin){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el linkedin'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Linkedin se ha editado satisfactoriamente'));
        }
    }

    public function editarDireccionM($request){

        $linkedin = DB::table('tblcontactopaciente')->where('idtblpaciente', $request->idtblpaciente)
        ->update(['tblpacienteaddress' => $request->tblpacienteaddress, 'tbltelefonocel' => $request->tbltelefonocel,
                  'tbltelefonootro' => $request->tbltelefonootro]);

        if($linkedin){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el linkedin'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Linkedin se ha editado satisfactoriamente'));
        }
    }

    public function editarDireccionFiscal($request){

        $linkedin = DB::table('tblcontactopaciente')->where('idtblpaciente', $request->idtblpaciente)
        ->update(['tblpacientefiscal' => $request->tblpacientefiscal]);

        if($linkedin){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el linkedin'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Linkedin se ha editado satisfactoriamente'));
        }
    }
}

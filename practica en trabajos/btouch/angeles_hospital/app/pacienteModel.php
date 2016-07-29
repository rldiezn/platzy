<?php
/*
 * Btouch Inc
 * Ricardo Diez
 * Angeles Digital
 * */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
use Response;

class pacienteModel extends Model
{
    protected $table = "tlbpaciente";
    protected $primaryKey = "idtblpaciente";
    protected $fillable = ['idtblusers','tblpacientename','tblpacientepaterno','tblpacientematerno','tblpacienteemail','tblpacienterfc','idcatstatus','tblpacientefechanacimiento','tblpacienteimgprofile'];
    protected $guarded = ['idtblpaciente'];
    public $timestamps = false;

    public function contactoPaciente()
    {
        return $this->hasOne('App\contactoPacienteModel','idtblpaciente','idtblpaciente');//model,foreign_key,local_key
    }

    public function getPaciente($idPaciente){

        $paciente = DB::table('tlbpaciente as a')
            ->join('users as b', 'b.id', '=', 'a.idtblusers')
            ->leftJoin('tblcontactopaciente as c', 'c.idtblpaciente', '=', 'a.idtblpaciente')
            ->where('a.idtblpaciente', '=', $idPaciente)
            ->get();

        if($paciente != false){
            return $paciente;
        }else{
            return false;
        }

    }

    static function isImageHere($paciente){

        $fileSystem = new Filesystem();
        $arrayImg= Array();
        if($paciente[0]->tblpacienteimgprofile==""){
            $arrayImg['srcImage']='/img/contacto_foto.jpg';
        }else if(!$fileSystem->exists("upload/pacientes/".$paciente[0]->idtblpaciente."/profile_img/".$paciente[0]->tblpacienteimgprofile)){
            $arrayImg['srcImage']='/img/contacto_foto.jpg';
        }else{
            $arrayImg['srcImage']="/upload/pacientes/".$paciente[0]->idtblpaciente."/profile_img/".$paciente[0]->tblpacienteimgprofile;
        }

        return $arrayImg;

    }

    static function isImageHereGroup($paciente){

        $fileSystem = new Filesystem();
        $arrayImg= Array();
        if($paciente->tblpacienteimgprofile==""){
            $arrayImg['srcImage']='/img/contacto_foto.jpg';
        }else if(!$fileSystem->exists("upload/pacientes/".$paciente->idtblpaciente."/profile_img/".$paciente->tblpacienteimgprofile)){
            $arrayImg['srcImage']='/img/contacto_foto.jpg';
        }else{
            $arrayImg['srcImage']="/upload/pacientes/".$paciente->idtblpaciente."/profile_img/".$paciente->tblpacienteimgprofile;
        }

        return $arrayImg;

    }

    public function makeFolders($idPaciente){
        $fileSystem = new Filesystem();
        if(!$fileSystem->exists("upload/pacientes")){
            if(!$fileSystem->makeDirectory("upload/pacientes","0755")){
                return false;
            }
        }
        if(!$fileSystem->exists("upload/pacientes/$idPaciente")){
            if(!$fileSystem->makeDirectory("upload/pacientes/$idPaciente","0755")){
                return false;
            }
        }
        if(!$fileSystem->exists("upload/pacientes/$idPaciente/profile_img")){
            if(!$fileSystem->makeDirectory("upload/pacientes/$idPaciente/profile_img","0755")){
                return false;
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

            $destinationPath =public_path()."/upload/pacientes/$idPaciente/profile_img/";

            $file = str_replace('data:image/png;base64,', '', $img_profile);
            $img = str_replace(' ', '+', $file);
            $data = base64_decode($img);
            $filename = date('ymdhis') . '_croppedImage' . ".png";
            $file = $destinationPath . $filename;
            $success = file_put_contents($file, $data);

            // THEN RESIZE IT
            $returnData = "upload/pacientes/$idPaciente/profile_img/" . $filename;
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

    public function deleteFiles($idPaciente,$img_profile,$img_profile_old){
        $fileSystem = new Filesystem();
        $countProfileImg=count($img_profile);
        //creo la extructura de carpetas para el doctor

        //for profile_img
        if($countProfileImg > 0){
            if($fileSystem->exists("upload/pacientes/$idPaciente/profile_img/")){
                if(!$fileSystem->delete("upload/pacientes/$idPaciente/profile_img/$img_profile_old")){
                    return false;
                }
            }
        }

        return true;

    }

    public function editarNombre($request){

        $paciente = $this->find($request->idtblpaciente);

        $paciente->tblpacientename=strtoupper($request->formDataJson['tblpacientename']);
        $paciente->tblpacientepaterno=strtoupper($request->formDataJson['tblpacientepaterno']);
        $paciente->tblpacientematerno=strtoupper($request->formDataJson['tblpacientematerno']);

        if(!$paciente->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el experiencia','datos'=>$paciente));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Su nombre se ha editado satisfactoriamente','datos'=>$paciente));
        }


    }

    public function editarInfo($request){

        $paciente = $this->find($request->idtblpaciente);
        $paciente->tblpacienteemail=$request->formDataJson['tblpacienteemail'];
        $paciente->tblpacienterfc=$request->formDataJson['tblpacienterfc'];

        if(!$paciente->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar el experiencia','datos'=>$paciente));
        }else{
            if(DB::table('tblcontactopaciente')->
               where('idtblcontacto', $request->idtblcontacto)->
               where('idtblpaciente', $request->idtblpaciente)->
               update(['tbltelefonocel' => $request->formDataJson['tbltelefonocel'],'tbltelefonootro' => $request->formDataJson['tbltelefonootro']])){
                return Response::json(array('estado'=>'1','msg'=>'Su información se ha editado satisfactoriamente.','datos'=>$paciente));
            }else{
                return Response::json(array('estado'=>'0','msg'=>'Error al Editar la información','datos'=>$paciente));
            }
            ;

        }

    }

    public function editarDireccionParticular($request){
        DB::table('tblcontactopaciente')->
        where('idtblcontacto', $request->idtblcontacto)->
        where('idtblpaciente', $request->idtblpaciente)->
        update(['tblpacienteaddress' => $request->formDataJson['tblpacienteaddress'].' ',
            'tbltelefonocel' => $request->formDataJson['tbltelefonocel'].' ',
            'tbltelefonootro' => $request->formDataJson['tbltelefonootro'].' ']);

        if(DB::table('tblcontactopaciente')->
        where('idtblcontacto', $request->idtblcontacto)->
        where('idtblpaciente', $request->idtblpaciente)->
        update(['tblpacienteaddress' => trim($request->formDataJson['tblpacienteaddress']),
                'tbltelefonocel' => trim($request->formDataJson['tbltelefonocel']),
                'tbltelefonootro' => trim($request->formDataJson['tbltelefonootro'])])){

            $paciente = $this->find($request->idtblpaciente);
            $paciente->tblpacienterfc=$request->formDataJson['tblpacienterfc'];
            if(!$paciente->save()){
//            if(!DB::table('tblpaciente')->where('idtblpaciente', $request->idtblpaciente)->update(['tblpacienterfc' => $request->formDataJson['tblpacienterfc']])){
                return Response::json(array('estado'=>'0','msg'=>'Error al Editar la información','datos'=> $request->formDataJson['tblpacienterfc']));
            }else{
                return Response::json(array('estado'=>'1','msg'=>'Su información se ha editado satisfactoriamente.','datos'=> $request->formDataJson['tblpacienterfc']));
            }

        }else{
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar la información','datos'=> $request->formDataJson['tblpacienteaddress']));
        }

    }

    public function editarDireccionFiscal($request){

        if(DB::table('tblcontactopaciente')->
        where('idtblcontacto', $request->idtblcontacto)->
        where('idtblpaciente', $request->idtblpaciente)->
        update(['tblpacientefiscal' => $request->formDataJson['tblpacientefiscal']])){
            return Response::json(array('estado'=>'1','msg'=>'Su información se ha editado satisfactoriamente.','datos'=> $request->formDataJson['tblpacientefiscal']));
        }else{
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar la información','datos'=> $request->formDataJson['tblpacientefiscal']));
        }

    }

    public function eliminarDireccionFiscal($request){

        if(DB::table('tblcontactopaciente')->
        where('idtblcontacto', $request->idtblcontacto)->
        where('idtblpaciente', $request->idtblpaciente)->
        update(['tblpacientefiscal' => ""])){
            return Response::json(array('estado'=>'1','msg'=>'Su información se ha editado satisfactoriamente.','datos'=> $request->formDataJson['tblpacientefiscal']));
        }else{
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar la información','datos'=> $request->formDataJson['tblpacientefiscal']));
        }

    }

    public function editarImgProfile($request){

//        $profile_image_patient = Input::file('tblpacienteimgprofile');
        $profile_image_patient = $request->tblpacienteimgprofile;

        if(!$this->makeFolders($request->idtblpaciente)){
            return false;
        }
        //borrar archivos
        $this->deleteFiles($request->idtblpaciente,$profile_image_patient,$request->oldImgProfile);
        //subir archivos

        $files=$this->uploadFiles($request->idtblpaciente,$profile_image_patient);
        if($files==false){
            return false;
        }

        $paciente = $this->find($request->idtblpaciente);

        $paciente->tblpacienteimgprofile=$files['img_profile_name'];

        if(!$paciente->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al Editar su imagen de perfil','datos'=>$paciente));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Su imagen de perfil se ha editado satisfactoriamente','datos'=>$paciente));
        }

    }

    public function guardarMeritocracia($request){

        if(DB::table('tblmeritocraciadoctor')
            ->where('idtblcitas', '=',  $request->idtblcitas)
            ->update([
                    'calidad' => $request->calidad,
                    'conocimiento' => $request->conocimiento,
                    'empatia' => $request->empatia,
                    'seguimiento' => $request->seguimiento,
                    'otro' => $request->otro
                ])
        ){
            return Response::json(array('estado'=>'1','msg'=>'Su opinión se ha enviado satisfactoriamente.','datos'=> $request));
        }else{
            return Response::json(array('estado'=>'0','msg'=>'Error al enviar su opinión','datos'=> $request));
        }

    }

}

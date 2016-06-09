<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\dispModel;
use App\menuModel;
use Response;
use Crypt;

class agdoctorModel extends Model
{

    protected $table = "tblcitas";
    protected $primaryKey = "idtblcitas";
    protected $fillable = ['idtblDr',
        'idtblpaciente',
        'idcatHospital',
        'idtblaletascitas',
        'nombre_paciente',
        'parentesco',
        'fecha_reserva',
        'hora_reserva',
        'hora_fin',
        'padecimiento',
        'idcatStatus',
        'sintoma',
        'diagnostico',
        'tratamiento',
        'solicitante_es_paciente'];
    protected $guarded = ['idtblcitas'];
    public $timestamps = false;

    /*

        Funciones para obtener listado de pacientes del médico

    */

    public function listarPacientes($request, $idDoctor = false) {

        $respuesta = new dispModel();

        $status = $respuesta->status('Autorizado');

        if($respuesta->dispositivo($request)){
            $pacientes = $this->obtenerPacientes($request->idtblDr, $status);
        } else {
            //$menu = new menuModel();
            $pacientes = view('agenda')->with('Labores', $this->obtenerPacientes($idDoctor, $status));
                                             //->with('isDoctor', $menu->isDoctor());
        }

        return $status;

    }

    public function obtenerPacientes($idtblDr, $idcatStatus) {

        $pacientes = DB::table('tblcitas')
                    ->join('tlbpaciente', 'tblcitas.idtblpaciente', '=', 'tlbpaciente.idtblpaciente')
                    ->where([['tblcitas.idtblDr', $idtblDr], ['tblcitas.idcatStatus', $idcatStatus]])
                    ->get();

        return $pacientes;

    }

    /*

        Funciones para obtener expediente por paciente

    */

    public function expedientePaciente($request, $idPaciente = false) {

        $respuesta = new dispModel();

        $status = $respuesta->status('Autorizado');

        if($respuesta->dispositivo($request)){
            $expediente = $this->obtenerExpediente($request->idtblpaciente, $status);
        } else {
            //$menu = new menuModel();
            $expediente = view('agenda')->with('Labores', $this->obtenerExpediente($idPaciente, $status));
                                             //->with('isDoctor', $menu->isDoctor());
        }

        return $expediente;

    }

    public function obtenerExpediente($idtblpaciente, $idcatStatus) {

        $expediente = DB::table('tblcitas')
                    ->join('tlbpaciente', 'tblcitas.idtblpaciente', '=', 'tlbpaciente.idtblpaciente')
                    ->where([['tblcitas.idtblpaciente', $idtblpaciente], ['tblcitas.idcatStatus', $idcatStatus]])
                    ->get();

        return $expediente;

    }

    /*

        Funciones para obtener el detalle de cada cita

    */
    /*
    public function detalleCita($request, $idCita = false) {

        $respuesta = new dispModel();

        $status = $respuesta->status('Autorizado');

        if($respuesta->dispositivo($request)){
            $cita = $this->obtenerDetalle($request->idtblcitas, $status);
        } else {
            //$menu = new menuModel();
            $cita = view('agenda')->with('Labores', $this->obtenerDetalle($idCita, $status));
                                             //->with('isDoctor', $menu->isDoctor());
        }

        return $cita;

    }*/

    public function obtenerDetalle($idtblcitas, $idcatStatus) {

        $cita = DB::table('tblcitas')
                    ->join('tlbpaciente', 'tblcitas.idtblpaciente', '=', 'tlbpaciente.idtblpaciente')
                    ->where([['tblcitas.idtblcitas', $idtblcitas], ['tblcitas.idcatStatus', $idcatStatus]])
                    ->get();

        return $cita;

    }

    public function horarios($request, $idDoctor = false) {

        $respuesta = new dispModel();

        if($respuesta->dispositivo($request)){
            $horarios = $this->obtenerHorarios($request->idtblDr);
        } else {
            $menu = new menuModel();
            $isDoctor = $menu->isDoctor();
            $alertas = DB::table('catalertas')->get();
            $modalAgenda=($isDoctor['isDoctor'])?view('agenda.agenda-doctor-modal')->with('isDoctor',$isDoctor)->with('alertas',$alertas):view('agenda.agenda-patient-modal')->with('isDoctor',$isDoctor)->with('alertas',$alertas);
            $modalShowResumen=($isDoctor['isDoctor'])?view('agenda.doctor-show-resumen-modal')->with('isDoctor',$isDoctor):view('agenda.patient-show-resumen-modal')->with('isDoctor',$isDoctor);
            $horarios = view('agenda.agenda')->with('Labores', $this->obtenerHorarios($idDoctor))
                ->with('isDoctor', $menu->isDoctor())
                ->with('modalShowResumen', $modalShowResumen)
                ->with('modalAgenda', $modalAgenda);
        }

        return $horarios;

    }

    public function horariosCalendario($request, $idDoctor = false) {

        $respuesta = new dispModel();

        if($respuesta->dispositivo($request)){
            $horarios = $this->obtenerHorarios($request->idtblDr);
        } else {
            $menu = new menuModel();
            $isDoctor = $menu->isDoctor();
            $modalAgenda=($isDoctor['isDoctor'])?view('agenda.agenda-doctor-modal')->with('isDoctor',$isDoctor):view('agenda.agenda-patient-modal')->with('isDoctor',$isDoctor);
            $modalShowResumen=($isDoctor['isDoctor'])?view('agenda.doctor-show-resumen-modal')->with('isDoctor',$isDoctor):view('agenda.patient-show-resumen-modal')->with('isDoctor',$isDoctor);
            $horarios = view('agenda.agenda_copy')->with('Labores', $this->obtenerHorarios($idDoctor))
                ->with('isDoctor', $menu->isDoctor())
                ->with('modalShowResumen', $modalShowResumen)
                ->with('modalAgenda', $modalAgenda);
        }

        return $horarios;

    }

    public function obtenerHorarios($idtblDr) {

        $horarios = DB::table('tblhorariosdoctor')
            ->join('tbldr', 'tbldr.idtblDr', '=', 'tblhorariosdoctor.idtblDr')
            ->where('tblhorariosdoctor.idtblDr','=',$idtblDr)
            ->get();

        return $horarios;

    }

    public function historialCitas($request, $idtblpaciente = false) {

        $respuesta = new dispModel();

        if($respuesta->dispositivo($request)){
            $citas = $this->listarCitasPaciente($request->idtblpaciente);
        } else {
            $menu = new menuModel();
            $isDoctor = $menu->isDoctor();
//            $c = $this->listarCitasPaciente($isDoctor['usuario']['id_usuario'],$idtblpaciente);
            $c = $this->listarCitasPaciente($idtblpaciente);
            $flagYear = 0;
            if(!$c){
                $c=false;
            }else{
                foreach ($c as $ind_p=>$p){
                    $src=pacienteModel::isImageHereGroup($p);
                    $c[$ind_p]->srcImage=$src['srcImage'];
                    if($flagYear!=$p->anio_reserva){
                        $flagYear=$p->anio_reserva;
                        $c[$ind_p]->changeYear=1;
                    }else{
                        $c[$ind_p]->changeYear=0;
                    }
                }
            }


            $citas = view('paciente.historico-citas')
                ->with('citas', $c)
                ->with('isDoctor', $isDoctor);
        }

        return $citas;

    }

    public function citasByDoctor($request, $idtblpaciente = false) {

        $respuesta = new dispModel();

        if($respuesta->dispositivo($request)){
            $citas = $this->listarCitasPaciente($request->idtblDr);
        } else {
            $menu = new menuModel();
            $isDoctor = $menu->isDoctor();
            $c = $this->listarCitasPaciente($isDoctor['usuario']['id_usuario'],$idtblpaciente);
            $flagYear = 0;
            if(!$c){
                $c=false;
            }else{
                foreach ($c as $ind_p=>$p){
                    $src=pacienteModel::isImageHereGroup($p);
                    $c[$ind_p]->srcImage=$src['srcImage'];
                    if($flagYear!=$p->anio_reserva){
                        $flagYear=$p->anio_reserva;
                        $c[$ind_p]->changeYear=1;
                    }else{
                        $c[$ind_p]->changeYear=0;
                    }
                }
            }


            $citas = view('paciente.historico-citas')
                ->with('citas', $c)
                ->with('isDoctor', $isDoctor);
        }

        return $citas;

    }

    public function detalleCitas($request, $idtblcitas=false) {

    $respuesta = new dispModel();

    if($respuesta->dispositivo($request)){
        $request->idtblcitas=explode("-", $request->idtblcitas);
        if($request->idtblcitas[0]=="servicio") {
            $detalleCita = $this->detalleCitaServicio($request->idtblcitas[1]);
        }else{
            $detalleCita = $this->detalleCita($request->idtblcitas[1]);
        }
    } else {
        $idtblcitas=explode("-", $idtblcitas);
        if($idtblcitas[0]=="servicio"){
            $menu = new menuModel();
            $isDoctor = $menu->isDoctor();
            $c = $this->detalleCitaServicio($idtblcitas[1]);
            foreach ($c as $ind_p=>$p){
                $src=pacienteModel::isImageHereGroup($p);
                $c[$ind_p]->srcImage=$src['srcImage'];
            }
        }else{
            $menu = new menuModel();
            $isDoctor = $menu->isDoctor();
            $c = $this->detalleCita($idtblcitas[1]);
            foreach ($c as $ind_p=>$p){
                $src=pacienteModel::isImageHereGroup($p);
                $c[$ind_p]->srcImage=$src['srcImage'];
            }
        }


        $detalleCita = view('paciente.detalle-cita')
            ->with('detalleCita', $c)
            ->with('isDoctor', $isDoctor);
    }

    return $detalleCita;

}

    public function historialPacientes($request, $idDoctor = false) {

        $respuesta = new dispModel();

        if($respuesta->dispositivo($request)){
            $pacientes = $this->listarPacientesDoctor($request->idtblDr);
        } else {
            $menu = new menuModel();
            $isDoctor = $menu->isDoctor();
            $pacientes = $this->listarPacientesDoctor($isDoctor['usuario']['id_usuario']);
            foreach ($pacientes as $ind_p=>$p){
                $src=pacienteModel::isImageHereGroup($p);
                $pacientes[$ind_p]->srcImage=$src['srcImage'];
            }
            $pacientes = view('paciente.historico-pacientes')
                ->with('pacientes', $pacientes)
                ->with('isDoctor', $isDoctor);

        }

        return $pacientes;

    }

    public function listarPacientesDoctor($idDoctor){
        $pacientes = DB::table('tblcitas as a')
            ->join('tlbpaciente as b', 'b.idtblpaciente', '=', 'a.idtblpaciente')
            ->join('tbldr as c', 'c.idtblDr', '=', 'a.idtblDr')
            ->join('cathospital as d', 'd.idcatHospital', '=', 'a.idcatHospital')
            ->where('a.idtblDr','=',$idDoctor)
            ->where('a.idcatStatus','=',4)
            ->groupBy('a.idtblpaciente')
            ->orderBy(DB::raw('CONCAT(b.tblpacientename,b.tblpacientepaterno,b.tblpacientematerno)'),'asc')
            ->select('*',DB::raw('TIMESTAMPDIFF(YEAR,b.tblpacientefechanacimiento,CURDATE()) AS edad'),DB::raw('CONCAT(b.tblpacientename," ",b.tblpacientepaterno," ",b.tblpacientematerno) as nombre_paciente'), DB::raw('CONCAT("doctor-",a.idtblcitas) AS idtblcitas'))
            ->get();

        return $pacientes;
    }

    public function listarCitasDoctor($idDoctor){
        $pacientes = DB::table('tblcitas as a')
            ->join('tlbpaciente as b', 'b.idtblpaciente', '=', 'a.idtblpaciente')
            ->join('tbldr as c', 'c.idtblDr', '=', 'a.idtblDr')
            ->join('cathospital as d', 'd.idcatHospital', '=', 'a.idcatHospital')
            ->where('a.idtblDr','=',$idDoctor)
            ->where('a.idcatStatus','=',4)
            ->groupBy('a.idtblpaciente')
            ->orderBy(DB::raw('CONCAT(b.tblpacientename,b.tblpacientepaterno,b.tblpacientematerno)'),'asc')
            ->select('*',DB::raw('TIMESTAMPDIFF(YEAR,b.tblpacientefechanacimiento,CURDATE()) AS edad'),DB::raw('CONCAT(b.tblpacientename," ",b.tblpacientepaterno," ",b.tblpacientematerno) as nombre_paciente'), DB::raw('CONCAT("doctor-",a.idtblcitas) AS idtblcitas'))
            ->get();

        return $pacientes;
    }

    public function listarCitasPaciente($idtblpaciente){
        DB::statement("SET lc_time_names = 'es_ES'");
        $citaswithdoctor = DB::table('tblcitas as a')
            ->join('tlbpaciente as b', 'b.idtblpaciente', '=', 'a.idtblpaciente')
            ->join('tbldr as c', 'c.idtblDr', '=', 'a.idtblDr')
            ->join('cathospital AS d', 'd.idcatHospital', '=', 'a.idcatHospital')
            ->where('a.idtblpaciente','=',$idtblpaciente)
            ->where('a.idcatStatus','=',4)
            ->select('a.*','b.*','d.*','a.idtblcitas as idtblcitas',DB::raw('CONCAT("doctor-",a.idtblcitas) AS idtblcitas'),DB::raw('YEAR(a.fecha_reserva) AS anio_reserva'),DB::raw('DATE_FORMAT(a.fecha_reserva,\'%d %M\') AS fecha_format'),DB::raw('TIMESTAMPDIFF(YEAR,b.tblpacientefechanacimiento,CURDATE()) AS edad'),DB::raw('CONCAT(b.tblpacientename," ",b.tblpacientepaterno," ",b.tblpacientematerno) as nombre_paciente'),DB::raw('CONCAT(c.tblDoctorName," ",c.tblDoctorPaterno," ",c.tblDoctorMaterno) as nombre_doctor'))
            ;
        $citaswithservice = DB::table('tblcitasservicio as a')
            ->join('tlbpaciente as b', 'b.idtblpaciente', '=', 'a.idtblpaciente')
            ->join('catservicios as c', 'c.idcatservicio', '=', 'a.idcatservicio')
            ->join('cathospital AS d', 'd.idcatHospital', '=', 'a.idcatHospital')
            ->where('a.idtblpaciente','=',$idtblpaciente)
            ->where('a.idcatStatus','=',4)
            ->union($citaswithdoctor)
            ->orderBy('fecha_reserva','desc')
            ->select('a.*','b.*','d.*','a.idtblcitasservicio as idtblcitas',DB::raw('CONCAT("servicio-",a.idtblcitasservicio) AS idtblcitas'),DB::raw('YEAR(a.fecha_reserva) AS anio_reserva'),DB::raw('DATE_FORMAT(a.fecha_reserva,\'%d %M\') AS fecha_format'),DB::raw('TIMESTAMPDIFF(YEAR,b.tblpacientefechanacimiento,CURDATE()) AS edad'),DB::raw('CONCAT(b.tblpacientename," ",b.tblpacientepaterno," ",b.tblpacientematerno) as nombre_paciente'),DB::raw('CONCAT(c.catservicioname) as nombre_doctor'))
            ->get();

        return $citaswithservice;
    }

    public function detalleCita($idtblcitas){
        DB::statement("SET lc_time_names = 'es_ES'");
        $pacientes = DB::table('tblcitas as a')
            ->join('tlbpaciente as b', 'b.idtblpaciente', '=', 'a.idtblpaciente')
            ->join('tbldr as c', 'c.idtblDr', '=', 'a.idtblDr')
            ->join('cathospital AS d', 'd.idcatHospital', '=', 'a.idcatHospital')
            ->join('tbllinkedindr AS e', 'e.idtblDr', '=', 'a.idtblDr')
            ->where('a.idtblcitas','=',$idtblcitas)
//            ->where('a.idtblpaciente','=',$idtblpaciente)
            ->where('a.idcatStatus','=',4)
            ->select('*',DB::raw('YEAR(a.fecha_reserva) AS anio_reserva'),DB::raw('DATE_FORMAT(a.fecha_reserva,\'%d %M\') AS fecha_format'),DB::raw('TIMESTAMPDIFF(YEAR,b.tblpacientefechanacimiento,CURDATE()) AS edad'),DB::raw('CONCAT(b.tblpacientename," ",b.tblpacientepaterno," ",b.tblpacientematerno) as nombre_paciente'),DB::raw('CONCAT(c.tblDoctorName," ",c.tblDoctorPaterno," ",c.tblDoctorMaterno) as nombre_doctor'))
            ->get();

        return $pacientes;
    }

    public function detalleCitaServicio($idtblcitas){
        DB::statement("SET lc_time_names = 'es_ES'");
        $pacientes = DB::table('tblcitasservicio as a')
            ->join('tlbpaciente as b', 'b.idtblpaciente', '=', 'a.idtblpaciente')
            ->join('catservicios as c', 'c.idcatservicio', '=', 'a.idcatservicio')
            ->join('cathospital AS d', 'd.idcatHospital', '=', 'a.idcatHospital')
            ->where('a.idtblcitasservicio','=',$idtblcitas)
            ->where('a.idcatStatus','=',4)
            ->select('*',DB::raw('YEAR(a.fecha_reserva) AS anio_reserva'),DB::raw('DATE_FORMAT(a.fecha_reserva,\'%d %M\') AS fecha_format'),DB::raw('TIMESTAMPDIFF(YEAR,b.tblpacientefechanacimiento,CURDATE()) AS edad'),DB::raw('CONCAT(b.tblpacientename," ",b.tblpacientepaterno," ",b.tblpacientematerno) as nombre_paciente'),DB::raw('CONCAT(c.catservicioname) as nombre_doctor'))
            ->get();

        return $pacientes;
    }

    public function guardarCita($request){

        $this->idtblDr =$request->idtblDr;
        $this->idtblpaciente =$request->idtblpaciente;
        $this->idcatHospital =$request->idcatHospital;
        $this->idtblaletascitas = $request->idtblaletascitas;
        $this->nombre_paciente =$request->nombre_paciente;
        $this->parentesco =$request->parentesco;
//        $this->fecha_reserva =$request->fecha_reserva;
//        $this->hora_reserva =$request->hora_reserva;
//        $this->hora_fin =$request->hora_fin;
        $this->padecimiento =$request->padecimiento;
        $this->sintoma =$request->sintoma;
        $this->solicitante_es_paciente =(isset($request->solicitante_es_paciente))?$request->solicitante_es_paciente:0;
        $this->idcatstatus = '4';

        if(!$this->save()){
            return Response::json(array('estado'=>'0','msg'=>'Error al solicitar la cita'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Solicitud de cita enviada con exito.'));
        }

    }

    public function guardarCitaServicio($request){

        if(!DB::table('tblcitasservicio')->insert(['idcatservicio' => $request->idcatservicio,
                'idtblpaciente' => $request->idtblpaciente,
                'idcatHospital' => $request->idcatHospital,
                'idtblaletascitas' => $request->idtblaletascitas,
                'nombre_paciente' => $request->nombre_paciente,
                'fecha_reserva' => $request->fecha_reserva,
                'hora_reserva' => $request->hora_reserva,
                'hora_fin' => $request->hora_fin,
                'padecimiento' => $request->padecimiento,
                'sintoma' => $request->sintoma,
                'solicitante_es_paciente' => $request->solicitante_es_paciente,
                'idcatstatus' => '',
            ]
        )){
            return Response::json(array('estado'=>'0','msg'=>'Error al solicitar la cita'));
        }else{
            return Response::json(array('estado'=>'1','msg'=>'Solicitud de cita enviada con exito.'));
        }

    }

    public function agendarCita($request) {

        $respuesta = new dispModel();
//        echo '<pre>';print_r($request->all());exit;
        if($respuesta->dispositivo($request)){
            if(empty($request->idcatservicio)){
                $detalleCita = $this->guardarCita($request);
            }else{
                $detalleCita = $this->guardarCitaServicio($request);
            }
        } else {
            if(empty($request->idcatservicio)){
                $detalleCita = $this->guardarCita($request);
            }else{
                $detalleCita = $this->guardarCitaServicio($request);
            }
        }

        return $detalleCita;

    }

    public function editarCita($request) {

        $horarios = DB::table('tblhorariosdoctor')
            ->where('idtblDr','=',$request->idtblDr)
            ->get();

        return $horarios;

    }

    public function cancelarCita($request) {

        $horarios = DB::table('tblhorariosdoctor')
            ->where('idtblDr','=',$request->idtblDr)
            ->get();

        return $horarios;

    }

    public function confirmarCita($request) {

        $horarios = DB::table('tblhorariosdoctor')
            ->where('idtblDr','=',$request->idtblDr)
            ->get();

        return $horarios;

    }

    public function pagarCita($request) {

        $horarios = DB::table('tblhorariosdoctor')
            ->where('idtblDr','=',$request->idtblDr)
            ->get();

        return $horarios;

    }

    public function reagendarCita($request) {

        $horarios = DB::table('tblhorariosdoctor')
            ->where('idtblDr','=',$request->idtblDr)
            ->get();

        return $horarios;

    }


    public function obtenerCitasCalendar($idtblDr){
//        echo "Hola mama dominare fullcalendar!!";
        $citas=$this->listarPacientesDoctor($idtblDr);
        $events=array();
        if(count($citas) > 0){
            foreach ($citas as $ind=>$c){
                $c->idtblcitas=explode("-",$c->idtblcitas);
                $events[$ind]["id"]=$c->idtblcitas[1];
                $events[$ind]["title"]=$c->nombre_paciente;
                $events[$ind]["description"]=$c->sintoma;
                $events[$ind]["start"]=$c->fecha_reserva.'T'.$c->hora_reserva;
                $events[$ind]["end"]=$c->fecha_reserva.'T'.$c->hora_fin;
                $events[$ind]["editable"]=false;
                $events[$ind]["borderColor"]="#E62117";
                $events[$ind]["className"]="idtblcitas-".$c->idtblcitas[1];
//                $events[$ind]["textColor"]="#E62117";
            }
            $response=json_encode(array('estado'=>'1','events'=>$events,'msg'=>'Good'));
//            $response=json_encode($events);
        }else{
            $response=json_encode(array('estado'=>'1','events'=>'{}','msg'=>'Bad'));
//            $response=json_encode(array('events'=>'{}'));
        }
        return $response;

    }

}
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
                ->with('nombre_paciente', (isset($c[0]->nombre_paciente))?$c[0]->nombre_paciente:'')
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
            //->groupBy('a.idtblpaciente')
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
            ->join('tbllinkedindr as e', 'e.idtblDr', '=', 'a.idtblDr')
            ->where('a.idtblpaciente','=',$idtblpaciente)
            //->where('a.idcatStatusCita','=', 5)
            ->orderBy('a.fecha_reserva','desc')
            ->select('*',DB::raw('CONCAT("doctor-",a.idtblcitas) AS idtblcitas'),DB::raw('YEAR(a.fecha_reserva) AS anio_reserva'),DB::raw('DATE_FORMAT(a.fecha_reserva,\'%d %M\') AS fecha_format'),DB::raw('DATE_FORMAT(a.hora_reserva,\'%h:%i %p\') AS hora_init_format'),DB::raw('DATE_FORMAT(a.hora_fin,\'%h:%i %p\') AS hora_fin_format'),DB::raw('TIMESTAMPDIFF(YEAR,b.tblpacientefechanacimiento,CURDATE()) AS edad'),DB::raw('CONCAT(b.tblpacientename," ",b.tblpacientepaterno," ",b.tblpacientematerno) as nombre_paciente'),DB::raw('CONCAT(c.tblDoctorName," ",c.tblDoctorPaterno," ",c.tblDoctorMaterno) as nombre_doctor'))
            ->get();
        $citaswithservice = DB::table('tblcitasservicio as a')
            ->join('tlbpaciente as b', 'b.idtblpaciente', '=', 'a.idtblpaciente')
            ->join('catservicios as c', 'c.idcatservicio', '=', 'a.idcatservicio')
            ->join('cathospital AS d', 'd.idcatHospital', '=', 'a.idcatHospital')
            ->where('a.idtblpaciente','=',$idtblpaciente)
            //->where('a.idcatStatus','=', 5)
            //->union($citaswithdoctor)
            ->orderBy('fecha_reserva','desc')
            ->select('*',DB::raw('CONCAT("servicio-",a.idtblcitasservicio) AS idtblcitas'),DB::raw('YEAR(a.fecha_reserva) AS anio_reserva'),DB::raw('DATE_FORMAT(a.fecha_reserva,\'%d %M\') AS fecha_format'),DB::raw('DATE_FORMAT(a.hora_reserva,\'%h:%i %p\') AS hora_init_format'),DB::raw('DATE_FORMAT(a.hora_fin,\'%h:%i %p\') AS hora_fin_format'),DB::raw('TIMESTAMPDIFF(YEAR,b.tblpacientefechanacimiento,CURDATE()) AS edad'),DB::raw('CONCAT(b.tblpacientename," ",b.tblpacientepaterno," ",b.tblpacientematerno) as nombre_paciente'),DB::raw('CONCAT(c.catservicioname) as nombre_doctor'))
            ->get();

        $citasDoc = sizeof($citaswithdoctor);

        foreach ($citaswithservice as $citawithservice) {
            $citaswithdoctor[$citasDoc] = $citawithservice;
            ++$citasDoc;
        }

        return $citaswithdoctor;
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
            ->join('tblimagenologia AS e', function($join)
                        {
                            $join->on('e.tblCorreo', '=', 'b.tblpacienteemail');
                            //$join->on('d.catHospitalName', 'LIKE', DB::raw('CONCAT("%", e.tblHospital, "%")'));
                         })
            ->where('a.idtblcitasservicio','=',$idtblcitas)
            //->where('a.idcatStatus','=',5)
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
        $this->idcatstatusCita = '4';
        $this->imagecita = $request->imagecita;

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
                //'fecha_reserva' => $request->fecha_reserva,
                //'hora_reserva' => $request->hora_reserva,
                //'hora_fin' => $request->hora_fin,
                'padecimiento' => $request->padecimiento,
                'sintoma' => $request->sintoma,
                'solicitante_es_paciente' => (isset($request->solicitante_es_paciente))?$request->solicitante_es_paciente:0,
                'idcatStatusCita' => '1',
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

        $confirmaCita = DB::table('tblcitas')
                    ->where('idtblcitas', '=', $request->idtblcita)
                    ->update([
                        'fecha_reserva' => $request->fecha_reserva,
                        'hora_reserva' => $request->hora_reserva,
                        'idcatStatusCita' => "5"
                    ]);

        $eliminaCita = DB::table('tblconfirmacitas')
                    ->where('idtblcita', '=', $request->idtblcita)
                    ->delete();

        return $confirmaCita;

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
                $events[$ind]["especialidad"]='Cardiología';
                $events[$ind]["place"]='Hospital Ángeles Clínica Londres';
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

    public function confirmaHorario($idCita){
        $pacientes = DB::table('tblconfirmacitas')
                    ->where('idtblcita', '=', $idCita)
                    ->get();

        return $pacientes;
    }

    public function enviarHorarios($request){

        date_default_timezone_set('America/Mexico_City');

        $enviarHorarios = DB::table('tblconfirmacitas')
                            ->insert([
                                'idtblcita' => $request->idtblcita,
                                'fecha_reserva1' => $request->fecha_reserva1,
                                'hora_reserva1' => date("H:i:s", strtotime($request->hora_reserva1)),
                                'fecha_reserva2' => $request->fecha_reserva2,
                                'hora_reserva2' => date("H:i:s", strtotime($request->hora_reserva2)),
                                'fecha_reserva3' => $request->fecha_reserva3,
                                'hora_reserva3' => date("H:i:s", strtotime($request->hora_reserva3))
                            ]);

        $actualizarStatus = DB::table('tblcitas')
                    ->where('idtblcitas', '=', $request->idtblcita)
                    ->update([
                        'idcatStatusCita' => "3"
                    ]);

        return $enviarHorarios;
    }

    public function obtenerCalificacion($idtblCita){

        $idtblCita=explode("-", $idtblCita);
        if($idtblCita[0]=="servicio") {
            $idCita = $idtblCita[1];
        }else{
            $idCita = $idtblCita[1];
        }

        $calificacionCita = DB::table('tblmeritocraciadoctor')
                    ->where('idtblcitas', '=', $idCita)
                    ->get();

        return $calificacionCita;
    }

    public function cerrarCita($request){

        $calificacionCita = DB::table('tblcitas')
                    ->where('idtblcitas', '=', $request->idtblCita)
                    ->update([
                        'diagnostico' => $request->diagnostico,
                        'tratamiento' => $request->tratamiento
                    ]);

        return $calificacionCita;
    }

    public function configurarAgenda($request, $idDoctor = false) {

        $respuesta = new dispModel();

        if($respuesta->dispositivo($request)){
            $horarios = $this->obtenerHorarios($request->idtblDr);
        } else {
            $menu = new menuModel();
            $isDoctor = $menu->isDoctor();
            $alertas = DB::table('catalertas')->get();
            $modalAgenda=($isDoctor['isDoctor'])?view('agenda.agenda-doctor-modal')->with('isDoctor',$isDoctor)->with('alertas',$alertas):view('agenda.agenda-patient-modal')->with('isDoctor',$isDoctor)->with('alertas',$alertas);
            $modalShowResumen=($isDoctor['isDoctor'])?view('agenda.doctor-show-resumen-modal')->with('isDoctor',$isDoctor):view('agenda.patient-show-resumen-modal')->with('isDoctor',$isDoctor);
            $horarios = view('agenda.configurar-agenda')->with('Labores', $this->obtenerHorarios($idDoctor))
                ->with('isDoctor', $menu->isDoctor())
                ->with('modalShowResumen', $modalShowResumen)
                ->with('modalAgenda', $modalAgenda);
        }

        return $horarios;

    }

    public function citasPaciente($request, $idtblpaciente = false) {

        $respuesta = new dispModel();

        if($respuesta->dispositivo($request)){
            $citas = $this->listarCitasPaciente($request->idtblpaciente);
        } else {
            $menu = new menuModel();
            $isDoctor = $menu->isDoctor();
//            $c = $this->listarCitasPaciente($isDoctor['usuario']['id_usuario'],$idtblpaciente);
            $c = $this->listarCitasPaciente($idtblpaciente);
            $d = $this->listarCitasPacienteSolitadas($idtblpaciente);
            $e = $this->listarCitasPacientePorAprobar($idtblpaciente);
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
            if(!$d){
                $d=false;
            }else{
                foreach ($d as $ind_p=>$p){
                    $src=pacienteModel::isImageHereGroup($p);
                    $d[$ind_p]->srcImage=$src['srcImage'];
                    if($flagYear!=$p->anio_reserva){
                        $flagYear=$p->anio_reserva;
                        $d[$ind_p]->changeYear=1;
                    }else{
                        $d[$ind_p]->changeYear=0;
                    }
                }
            }
            if(!$e){
                $e=false;
            }else{
                foreach ($e as $ind_p=>$p){
                    $src=pacienteModel::isImageHereGroup($p);
                    $e[$ind_p]->srcImage=$src['srcImage'];
                    if($flagYear!=$p->anio_reserva){
                        $flagYear=$p->anio_reserva;
                        $e[$ind_p]->changeYear=1;
                    }else{
                        $e[$ind_p]->changeYear=0;
                    }
                }
            }


            $citas = view('paciente.mis-citas')
                ->with('citas', $c)
                ->with('citasSolictadas', $d)
                ->with('citasPorAprobar', $e)
                ->with('isDoctor', $isDoctor);
        }

        return $citas;

    }


    public function listarCitasPacienteSolitadas($idtblpaciente){
        DB::statement("SET lc_time_names = 'es_ES'");
        $citaswithdoctor = DB::table('tblcitas as a')
            ->join('tlbpaciente as b', 'b.idtblpaciente', '=', 'a.idtblpaciente')
            ->join('tbldr as c', 'c.idtblDr', '=', 'a.idtblDr')
            ->join('cathospital AS d', 'd.idcatHospital', '=', 'a.idcatHospital')
            ->join('tbllinkedindr as e', 'e.idtblDr', '=', 'a.idtblDr')
            ->where('a.idtblpaciente','=',$idtblpaciente)
            ->where('a.idcatStatusCita','=', 3)
            ->orderBy('a.fecha_reserva','desc')
            ->select('*',DB::raw('CONCAT("doctor-",a.idtblcitas) AS idtblcitas'),DB::raw('YEAR(a.fecha_reserva) AS anio_reserva'),DB::raw('DATE_FORMAT(a.fecha_reserva,\'%d %M\') AS fecha_format'),DB::raw('DATE_FORMAT(a.hora_reserva,\'%h:%i %p\') AS hora_init_format'),DB::raw('DATE_FORMAT(a.hora_fin,\'%h:%i %p\') AS hora_fin_format'),DB::raw('TIMESTAMPDIFF(YEAR,b.tblpacientefechanacimiento,CURDATE()) AS edad'),DB::raw('CONCAT(b.tblpacientename," ",b.tblpacientepaterno," ",b.tblpacientematerno) as nombre_paciente'),DB::raw('CONCAT(c.tblDoctorName," ",c.tblDoctorPaterno," ",c.tblDoctorMaterno) as nombre_doctor'))
            ->get();
        $citaswithservice = DB::table('tblcitasservicio as a')
            ->join('tlbpaciente as b', 'b.idtblpaciente', '=', 'a.idtblpaciente')
            ->join('catservicios as c', 'c.idcatservicio', '=', 'a.idcatservicio')
            ->join('cathospital AS d', 'd.idcatHospital', '=', 'a.idcatHospital')
            ->where('a.idtblpaciente','=',$idtblpaciente)
            ->where('a.idcatStatus','=', 3)
            //->union($citaswithdoctor)
            ->orderBy('fecha_reserva','desc')
            ->select('*',DB::raw('CONCAT("servicio-",a.idtblcitasservicio) AS idtblcitas'),DB::raw('YEAR(a.fecha_reserva) AS anio_reserva'),DB::raw('DATE_FORMAT(a.fecha_reserva,\'%d %M\') AS fecha_format'),DB::raw('DATE_FORMAT(a.hora_reserva,\'%h:%i %p\') AS hora_init_format'),DB::raw('DATE_FORMAT(a.hora_fin,\'%h:%i %p\') AS hora_fin_format'),DB::raw('TIMESTAMPDIFF(YEAR,b.tblpacientefechanacimiento,CURDATE()) AS edad'),DB::raw('CONCAT(b.tblpacientename," ",b.tblpacientepaterno," ",b.tblpacientematerno) as nombre_paciente'),DB::raw('CONCAT(c.catservicioname) as nombre_doctor'))
            ->get();

        $citasDoc = sizeof($citaswithdoctor);

        foreach ($citaswithservice as $citawithservice) {
            $citaswithdoctor[$citasDoc] = $citawithservice;
            ++$citasDoc;
        }

        return $citaswithdoctor;
    }


    public function listarCitasPacientePorAprobar($idtblpaciente){
        DB::statement("SET lc_time_names = 'es_ES'");
        $citaswithdoctor = DB::table('tblcitas as a')
            ->join('tlbpaciente as b', 'b.idtblpaciente', '=', 'a.idtblpaciente')
            ->join('tbldr as c', 'c.idtblDr', '=', 'a.idtblDr')
            ->join('cathospital AS d', 'd.idcatHospital', '=', 'a.idcatHospital')
            ->join('tbllinkedindr as e', 'e.idtblDr', '=', 'a.idtblDr')
            ->where('a.idtblpaciente','=',$idtblpaciente)
            ->where('a.idcatStatusCita','=', 4)
            ->orderBy('a.fecha_reserva','desc')
            ->select('*',DB::raw('CONCAT("doctor-",a.idtblcitas) AS idtblcitas'),DB::raw('YEAR(a.fecha_reserva) AS anio_reserva'),DB::raw('DATE_FORMAT(a.fecha_reserva,\'%d %M\') AS fecha_format'),DB::raw('DATE_FORMAT(a.hora_reserva,\'%h:%i %p\') AS hora_init_format'),DB::raw('DATE_FORMAT(a.hora_fin,\'%h:%i %p\') AS hora_fin_format'),DB::raw('TIMESTAMPDIFF(YEAR,b.tblpacientefechanacimiento,CURDATE()) AS edad'),DB::raw('CONCAT(b.tblpacientename," ",b.tblpacientepaterno," ",b.tblpacientematerno) as nombre_paciente'),DB::raw('CONCAT(c.tblDoctorName," ",c.tblDoctorPaterno," ",c.tblDoctorMaterno) as nombre_doctor'))
            ->get();
        $citaswithservice = DB::table('tblcitasservicio as a')
            ->join('tlbpaciente as b', 'b.idtblpaciente', '=', 'a.idtblpaciente')
            ->join('catservicios as c', 'c.idcatservicio', '=', 'a.idcatservicio')
            ->join('cathospital AS d', 'd.idcatHospital', '=', 'a.idcatHospital')
            ->where('a.idtblpaciente','=',$idtblpaciente)
            ->where('a.idcatStatus','=', 4)
            //->union($citaswithdoctor)
            ->orderBy('fecha_reserva','desc')
            ->select('*',DB::raw('CONCAT("servicio-",a.idtblcitasservicio) AS idtblcitas'),DB::raw('YEAR(a.fecha_reserva) AS anio_reserva'),DB::raw('DATE_FORMAT(a.fecha_reserva,\'%d %M\') AS fecha_format'),DB::raw('DATE_FORMAT(a.hora_reserva,\'%h:%i %p\') AS hora_init_format'),DB::raw('DATE_FORMAT(a.hora_fin,\'%h:%i %p\') AS hora_fin_format'),DB::raw('TIMESTAMPDIFF(YEAR,b.tblpacientefechanacimiento,CURDATE()) AS edad'),DB::raw('CONCAT(b.tblpacientename," ",b.tblpacientepaterno," ",b.tblpacientematerno) as nombre_paciente'),DB::raw('CONCAT(c.catservicioname) as nombre_doctor'))
            ->get();

        $citasDoc = sizeof($citaswithdoctor);

        foreach ($citaswithservice as $citawithservice) {
            $citaswithdoctor[$citasDoc] = $citawithservice;
            ++$citasDoc;
        }

        return $citaswithdoctor;
    }

}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use DB;
use Response;
use App\dispModel;
use App\menuModel;
use Illuminate\Http\Request;

class laboresModel extends Model
{

    public function horarios($request, $id = false) {

        $respuesta = new dispModel();

        if($respuesta->dispositivo($request)){
            $horarios = $this->obtenerHorarios($request->idtblDr);
        } else {
            $menu = new menuModel();
            $horarios = view('agenda.agenda')->with('Labores', $this->obtenerHorarios($id))
                                             ->with('isDoctor', $menu->isDoctor());
        }

        return $horarios;

    }

    public function obtenerHorarios($idtblDr) {

        $horarios = DB::table('tblhorariosdoctor')
                ->where('idtblDr','=',$idtblDr)
                ->get();

        return $horarios;

    }

    public function historialCitas($request) {

        $horarios = DB::table('tblhorariosdoctor')
                ->where('idtblDr','=',$request->idtblDr)
                ->get();

        return $horarios;

    }

    public function agendarCita($request) {

        $horarios = DB::table('tblhorariosdoctor')
                ->where('idtblDr','=',$request->idtblDr)
                ->get();

        return $horarios;

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

}
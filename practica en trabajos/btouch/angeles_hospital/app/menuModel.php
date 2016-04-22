<?php
/*
 * Btouch Inc
 * Ricardo Diez
 * Angeles Digital
 * */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use App\User;
use App\doctorModel;
use App\pacienteModel;

class menuModel extends Model
{


    public function __construct()
    {
        $this->curretRoute = Route::getCurrentRoute()->getPath();
        $this->groupRoutesLogin= ['login','register','password/email','password/reset'];
        if(isset(Auth::user()->id)){
            $this->user = new User();
            $this->datos=$this->user->isADoctor(Auth::user()->id);
        }else{
            return redirect()->route('login');
        }

    }

    public function generateMenu(){
        $menu = [];
        $menu['Inicio' ]=['url' => '/'];
        if (Auth::check())
        {

            if($this->datos['issetUser']){
                if($this->datos['isDoctor']){
                    $menu['Mi Perfi' ]=['submenu' => ['Ver Perfil'     => ['url' => "doctor/verPerfil/".$this->datos['datos'][0]['idtblDr']],
                                                      'Editar mi perfil'   => ['url' => 'doctor/editarPerfil/'.$this->datos['datos'][0]['idtblDr']]
                                                        ]
                    ];
                    $menu['Mi Agenda' ]=[];
                }else{
                    $menu['Grupo Angeles' ]=['submenu'=>['Listado de Doctores'     => ['url' => 'doctor/listadoDoctores'],
                        'Listado de Hospitales'   => ['url' => 'hospital/listadoHospitales'],
                        'Listado de Servicios'    => ['url' => 'servicio/listadoServicios'],
                    ] ];
                }

            }else{
                //TODO si el usuario no existe
            }


            $arrayMenu=[
                'main_menu'=>$menu,
                'login_menu'=>$this->generateMenuLogin(),
            ];

            return $arrayMenu;

        }else{
            return redirect()->route('login');
        }


    }

    public function generateMenuLogin(){
        $menu = [];
        if (Auth::check()) {

            $usuario="Usuario invitado";
            if($this->datos['issetUser']){
                if($this->datos['isDoctor']){
                    $doctor=doctorModel::where('idtbluser', Auth::user()->id)->get();
                    $usuario =  $doctor[0]['tblDoctorName'].' '.$doctor[0]['tblDoctorPaterno'];
                    $menu[$usuario] = ['submenu' => ['Grupo Angeles' => ['url' => ''],
                                                    'Hospitales' => ['url' => 'hospital/listadoHospitales'],
                                                    'Doctores' => ['url' => 'doctor/listadoDoctores'],
                                                    'Servicios' => ['url' => 'servicio/listadoServicios'],
                                                    'Cambiar Contrase&ntilde;a' => ['url' => 'password/email'],
                                                    'Cerrar Sesi&oacute;n' => ['url' => 'logout'],
                    ]
                    ];
                }else{
                    $paciente=pacienteModel::where('idtblusers', Auth::user()->id)->get();
                    $usuario = $paciente[0]['tblpacientename'].' '.$paciente[0]['tblpacientepaterno'];
                    $menu[$usuario] = ['submenu' => ['Mi Perfil' => ['url' => "paciente/verPerfil/".$this->datos['datos'][0]['idtblpaciente']],
                                                     'Cambiar Contrase&ntilde;a' => ['url' => 'password/email'],
                                                     'Cerrar Sesi&oacute;n' => ['url' => 'logout']
                    ]
                    ];
                }

            }else{
                //TODO si el usuario no existe
            }
        }else{
            return redirect()->route('login');
        }


        return $menu;
    }

    public function isLoginRoute(){

        if(in_array($this->curretRoute, $this->groupRoutesLogin)){
            return true;
        }else{
            return false;
        }

    }

    public function isDoctor(){

        if (Auth::check()) {
            if ($this->datos['issetUser']) {
                if($this->datos['isDoctor']){
                    $doctor=doctorModel::where('idtbluser', Auth::user()->id)->get();
                    $idUsuario =  $doctor[0]['idtblDr'];
                    $usuario =  $doctor[0]['tblDoctorName'].' '.$doctor[0]['tblDoctorPaterno'];
                    $array['isDoctor']=true;
                    $array['usuario']=['id_usuario'=>$idUsuario,'usuario'=>$usuario];
                    $array['menu']='template.header-doctor';
                    $array['sub-menu']='template.sub-header-doctor';
                    return $array;
                }else{
                    $paciente=pacienteModel::where('idtblusers', Auth::user()->id)->get();
                    $idUsuario =  $paciente[0]['idtblpaciente'];
                    $usuario = $paciente[0]['tblpacientename'].' '.$paciente[0]['tblpacientepaterno'];
                    $array['isDoctor']=false;
                    $array['usuario']=['id_usuario'=>$idUsuario,'usuario'=>$usuario];
                    $array['menu']='template.header-paciente';
                    $array['sub-menu']='template.sub-header-paciente';
                    return $array;
                }
            } else {
                //TODO si el usuario no existe
            }
        }else{
            return redirect()->route('login');
        }

    }

}

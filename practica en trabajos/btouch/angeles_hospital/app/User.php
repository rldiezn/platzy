<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\doctorModel;
use App\pacienteModel;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isADoctor($idUSer){
        $array=array();
        $array['isLogin']=false;

        if(Auth::check()){
            $array['isDoctor']="";
            $array['isLogin']=true;
            $array['issetUser'] ="";
            $array['datos']="";
            $doctor=doctorModel::where('idtbluser','=',$idUSer)->get();

            if(count($doctor) > 0){
                $array['isDoctor'] =true;
                $array['issetUser'] =true;
                $array['datos']=$doctor;

            }else{
                $paciente=pacienteModel::where('idtblusers','=',$idUSer)->get();
                if(count($paciente) > 0){
                    $array['isDoctor'] =false;
                    $array['issetUser'] =true;
                    $array['datos']=$paciente;
                }else{
                    $array['isDoctor'] =false;
                    $array['issetUser'] =false;
                    $array['datos']=false;
                }
            }

            return $array;

        }else{
            return $array;
        }

    }

}

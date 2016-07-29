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
            $array['role'] ="";
            $array['datos']="";
            $doctor=doctorModel::where('idtbluser','=',$idUSer)->get();

            if(count($doctor) > 0){
                $array['isDoctor'] =true;
                $array['issetUser'] =true;
                $array['role'] ='doctor';
                $array['datos']=$doctor;

            }else{
                $paciente=pacienteModel::where('idtblusers','=',$idUSer)->get();
                if(count($paciente) > 0){
                    $array['isDoctor'] =false;
                    $array['issetUser'] =true;
                    $array['role'] ='paciente';
                    $array['datos']=$paciente;
                }else{
                    if($admin=$this->isAdmin($idUSer)){
                        $array['isDoctor'] =false;
                        $array['issetUser'] =true;
                        $array['role'] ='admin';
                        $array['datos']=$admin;
                    }else if($distributor=$this->isADistributor($idUSer)){
                        $array['isDoctor'] =false;
                        $array['issetUser'] =true;
                        $array['role'] ='distributor';
                        $array['datos']=$distributor;
                    }else{
                        $array['isDoctor'] =false;
                        $array['issetUser'] =false;
                        $array['role'] =false;
                        $array['datos']=false;
                    }

                }
            }
//            echo '<pre>';print_r($array);exit;
            return $array;

        }else{
            return $array;
        }

    }

    public function isAdmin($idUSer){

        if(Auth::check()){
            $admin=User::where('id','=',$idUSer)->get();
            if($admin[0]->role=="admin"){
                return $admin;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function isADistributor($idUSer){

        if(Auth::check()){
            $distributor=User::where('id','=',$idUSer)->get();
            if($distributor[0]->role=="distributor"){
                return $distributor;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }



}

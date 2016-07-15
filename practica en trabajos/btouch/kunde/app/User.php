<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'paterno', 'materno', 'email', 'password','puesto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function socialin()
    {
        return $this->hasOne('App\socialinModel','idtblusers','id');//model,foreign_key,local_key
    }
    public function experience()
    {
        return $this->hasMany('App\experienceModel','idtblusers','id');//model,foreign_key,local_key
    }
    public function education()
    {
        return $this->hasMany('App\educationModel','idtblusers','id');//model,foreign_key,local_key
    }
    /*public function course()
    {
        return $this->hasMany('App\courseModel','idtblDr','idtblDr');//model,foreign_key,local_key
    }*/


}

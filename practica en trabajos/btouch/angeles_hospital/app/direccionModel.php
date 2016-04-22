<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class direccionModel extends Model
{
    protected $table = "tblcontactopaciente";
    protected $primaryKey = "idtblcontacto";
    protected $guarded = ['idtblpaciente'];
    public $timestamps = false;
}

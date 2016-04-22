<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactoPacienteModel extends Model
{
    protected $table = "tblcontactopaciente";
    protected $primaryKey = "idtblcontacto";
    protected $fillable = ['idtblpaciente','tblpacienteaddress','tblpacientefiscal','tbltelefonocel','tbltelefonootro'];
    protected $guarded = ['idtblcontacto'];
    public $timestamps = false;

    public function paciente()
    {
        return $this->belongsTo('App\pacienteModel','idtblpaciente','idtblpaciente');//model,local_key,parent_key
    }


}

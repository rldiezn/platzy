<?php

namespace angelesHospital;

use Illuminate\Database\Eloquent\Model;

class linkedinModel extends Model
{
    protected $table = "tbllinkedindr";
    protected $primaryKey = "idtblLinkedInDr";
    protected $fillable = ['tblDoctorName','idtblDr','tblLinkedInDrProfHead','tblLinkedInDrCountry','idcatHospital','tblLinkedInDrSummary','tblLinkedInDrImg','tblLinkedInDrCV'];
    protected $guarded = ['idtblLinkedInDr'];
    public $timestamps = false;


    public function doctor()
    {
        return $this->belongsTo('angelesHospital\doctorModel','idtblDr','idtblDr');//model,local_key,parent_key
    }
}

<?php

namespace angelesHospital;

use Illuminate\Database\Eloquent\Model;

class experienceModel extends Model
{
    protected $table = "tblexperience";
    protected $primaryKey = "idtblExperience";
    protected $fillable = ['idtblDr','tblExperienceCompany','tblExperienceJobTitle','tblExperienceStartDate','tblExperienceEndDate','tblExperienceDescriptionJob','tblExperienceLocationJob','idcatStatus','tblExperienceCurrent'];
    protected $guarded = ['idtblExperience'];
    public $timestamps = false;


    public function doctor()
    {
        return $this->belongsTo('angelesHospital\doctorModel','idtblDr','idtblDr');//model,local_key,parent_key
    }
}

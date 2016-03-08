<?php

namespace angelesHospital;

use Illuminate\Database\Eloquent\Model;

class educationModel extends Model
{
    protected $table = "tbleducation";
    protected $primaryKey = "idtblEducation";
    protected $fillable = ['idtblDr','tblEducationSchool','tblEducationStartDate','tblEducationEndDate','tblEducationDegree','tblEducationFieldOfStudy','tblEducationGrade','tblEducationDescription','tblEducationCurrent'];
    protected $guarded = ['idtblEducation'];
    public $timestamps = false;


    public function doctor()
    {
        return $this->belongsTo('angelesHospital\doctorModel','idtblDr','idtblDr');//model,local_key,parent_key
    }
}

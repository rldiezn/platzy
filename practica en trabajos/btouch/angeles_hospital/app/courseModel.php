<?php

namespace angelesHospital;

use Illuminate\Database\Eloquent\Model;

class courseModel extends Model
{

    protected $table = "tblcourses";
    protected $primaryKey = "idtblCourses";
    protected $fillable = ['idtblDr','tblCoursesName','tblCoursesInstitution','idtblExperience','tblCoursesDateInit','tblCoursesDateEnd','tblCoursesDescription','tblCoursesCurrent'];
    protected $guarded = ['idtblCourses'];
    public $timestamps = false;


    public function doctor()
    {
        return $this->belongsTo('angelesHospital\doctorModel','idtblDr','idtblDr');//model,local_key,parent_key
    }
}

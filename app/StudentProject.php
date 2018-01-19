<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentProject extends Model
{
    //
	public $table="student_projects";
    public function StudentUser()
    {
        return $this->belongsTo('App\StudentUser');
    }

    public function ProjectImages()
    {
    	return $this->hasMany('App\ProjectImage');
    }
}

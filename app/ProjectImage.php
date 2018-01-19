<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    //
    public function StudentProject()
    {
    	return $this->belongsTo('App\StudentProject');
    }
}

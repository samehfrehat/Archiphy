<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class StudentUser extends Model implements  \Illuminate\Contracts\Auth\Authenticatable
{
    //
    use Authenticatable;

    public $table="student_users";  //to insure table name in database

    public function StudentProject()
    {
    		return $this->hasOne('App\StudentProject');
    }
}

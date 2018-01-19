<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class DoctorUser extends Model  implements  \Illuminate\Contracts\Auth\Authenticatable
{
    //
    use Authenticatable;
    public $table="doctor_users";  //to insure table name in database
    
}

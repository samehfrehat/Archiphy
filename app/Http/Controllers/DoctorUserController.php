<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DoctorUserController extends Controller
{
    //
    public function getHome() // get user home page
   {
   		return view('doctors.home');   		
   }
   
}



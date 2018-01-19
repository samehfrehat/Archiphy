<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{   

   public function getUserLogin() // get view Login
   {
      if(Auth::guest())
      {
         return view('guests.login');
      }
      else
      {
         return redirect()->back();
      }
   }

//*****************************************************************************************************************************

   public function userLogin(Request $request) // Post login , auth user
   {
   		$this->validate($request,[
   			'email'=>'required|email',
   			'password'=>'required|min:8'
   			]);

   	if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']]))
		{
         return redirect()->route('projectshome');			
		}     
      else if(Auth::guard('doctor')->attempt(['email'=>$request['email'],'password'=>$request['password']]))
      {
         return redirect()->route('doctorhome');
      }
      else
      {
          return redirect()->back()->with(['fail'=>'e-mail/password is not correct']);          
      }
     
   }

   //*****************************************************************************************************************************

    public function Logout() // Logout the current user
   {
         Auth::guard('doctor')->logout();
         Auth::guard('web')->logout();
         return redirect()->route('login');
   }

}


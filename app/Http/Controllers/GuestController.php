<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\StudentUser;
use App\StudentNumber;

class GuestController extends Controller
{   
 	
 	 public function getindex() // get user home page
   {
      if(Auth::guest())
      {
   		return view('guests.home');
      }
      else
      {
         return redirect()->back();
      }
   }

   //*****************************************************************************************************************************

   public function getRegNewUser() //get the view users reg
   {
      if(Auth::guest())
         {
            return view('guests.usersReg');
         }
      else
         {
            return redirect()->back();
          }      
   }

   //*****************************************************************************************************************************

    public function regNewUser(Request $request) //post the request users reg
   {
         $this->validate($request,[
               'student_number'=>'required|digits_between:7,10|numeric|unique:student_users',
               'first_name'=>'required|alpha|max:50',
               'last_name'=>'required|alpha|max:50',
               'email'=>'required|max:100|email|unique:student_users',
               'password'=>'required|min:8',
               're_password'=>'required|min:8|same:password',
               //'phone_number'=>'min:8|digits_between:8,30|numeric',
               'address'=>'max:200'             
            ]);


            $isStudent = StudentNumber::where('student_number', '=', $request['student_number'])->first();//we can use the method ->exists() , first() bring us the first value if there is many values 
         if ($isStudent !== null) 
            {
               // user doesn't exist         
               $newUser = new StudentUser();
                  $newUser->student_number = $request['student_number'];
                  $newUser->first_name = $request['first_name'];
                  $newUser->last_name = $request['last_name'];
                  $newUser->email = $request['email'];
                  $newUser->password = bcrypt($request['password']);
                  $newUser->phone_number = $request['phone_number'];
                  $newUser->address = $request['address'];
                  $newUser->major = $request['specialization_group'];
                  $newUser->gender = $request['gender_group'];
                  $newUser->save();
                  return redirect()->route('reg')->with(['success' => 'User Created Succefuly']);                
            }
         else
               return redirect()->back()->with(['fail'=>'YOU ARE NOT A Student , WE DID NOT RECOGNIZE YOUR NUMBER']);

   }
}



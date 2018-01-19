<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\StudentUser;
use App\StudentProject;
use App\ProjectImage;
use File;
use Image; //http://image.intervention.io


class StudentUserController extends Controller
{
    //
   
   public function getProjectsHome(Request $request) // get user home with projects and search projects
   {
      if($request['search'])
      {
         $search=$request['search'];
         $projects = StudentProject::where('title','like','%'.$search.'%')
         ->orWhere('abstract','like','%'.$search.'%')
         ->orWhere('aims_objectives','like','%'.$search.'%')
         ->orWhere('declaration','like','%'.$search.'%')
         ->orderBy('created_at','desc')->paginate(12);
         return view('users.projects',['projects'=>$projects]);  
      }
      else
      {
         $projects = StudentProject::orderBy('created_at','desc')->paginate(12);
         return view('users.projects',['projects'=>$projects]);  
      }
       
   }

   //*****************************************************************************************************************************

    public function getUserProfile($id) // get view user profile
   {
      $user = StudentUser::where('id',$id)->first();
         return view('users.profile',['user'=>$user]);   
   }

    //*****************************************************************************************************************************

   public function postProfilePicture(Request $request,$id)
   {
     
      if(!$request->file('profilepic'))
                     return redirect()->back()->with(['fail' => 'Please Select an Image']);
      
      $user = StudentUser::where('id',$id)->first();          
         
         try{
             $image = $request->file('profilepic');
               $filename =time() . '.' . $image->getClientOriginalExtension();//->encode('png')
               $location = public_path('images/UserProfileImage/' . $filename);
               Image::make($image)->save($location);
                  if($user->image)         
                      File::delete('images/UserProfileImage/' . $user->image);     
                        $user->image = $filename;                  
                        $user->save();
            return redirect()->back()->with(['success' => 'Image Uploaded Succefuly']);  
         }  
         catch (\Exception $e) 
         {
             //return $e->getMessage();
               return redirect()->back()->with(['fail' => 'Image is too large or extension not supported, Please upload another one']); 
         }
                   
   }

   //*****************************************************************************************************************************

   public function getProject($id = null)
   {
      if(!is_null($id))
      {
         $project = StudentProject::where('id',$id)->first();
         return view('projects.project',['project'=>$project]);   
      }
      
      else
         return redirect()->back();

   }

   //*****************************************************************************************************************************

   public function getEditProject()
   {
      if(Auth::user()->StudentProject)
      {
         $project = StudentProject::where('student_user_id',Auth::user()->id)->first();
   		return view('users.editproject',['project'=>$project]);
      }
      else
         return redirect()->back();

   }
   
   //*****************************************************************************************************************************

   public function createNewProject(Request $request)
   {
      $this->validate($request,[
               'projecttitle'=>'required|max:2500',                                          
            ]);

      $newProject = new StudentProject();
            $newProject->title = $request['projecttitle'];
            $newProject->student_user_id= Auth::user()->id;
            $newProject->save();
            return redirect()->route('projectshome')->with(['success' => 'Project Created Succefuly']);  
   }

   //*****************************************************************************************************************************

   public function postEditProject(Request $request)
   {
   		$this->validate($request,[
               'title'=>'max:255',
   				'declaration'=>'max:2500',
   				'abstract'=>'max:2500', 
               'objectives'=>'max:2500'                  				 				
   			]);

   		$isProject = StudentProject::where('student_user_id',Auth::user()->id)->first();

   		if($isProject)
         {
               if($request->has('save1'))
               {
                  if(!$request['declaration'])
                        return redirect()->back()->with(['fail' => 'Please Enter a Declaration']);  
      			   $isProject->declaration = $request['declaration'];   			   
      		    	$isProject->save();
                  return redirect()->back()->with(['success' => 'declaration Edited Succefuly']);   
               }
               else if($request->has('attachimage'))
               {
                     if(!$request->file('uploadimage'))
                        return redirect()->back()->with(['fail' => 'Please Select an Image']);                     
                      try {
                                $image = $request->file('uploadimage');
                              $filename =time() . '.' . $image->getClientOriginalExtension();//->encode('png')
                               $location = public_path('images/ProjectImages/' . $filename);

                              Image::make($image)->resize(919,621)->save($location);

                              $newImage = new ProjectImage();
                                 $newImage->image = $filename;
                                 $newImage->student_project_id= Auth::user()->StudentProject->id;
                                 $newImage->save();                 
                        return redirect()->back()->with(['success' => 'Image Uploaded Succefuly']);  
                        
                        }
                        catch (\Exception $e) {
                            //return $e->getMessage();
                           return redirect()->back()->with(['fail' => 'Image is too large or extension not supported, Please upload another one']); 
                        }
                        
               }

               else if($request->has('save111'))
               {
                  if(!$request['title'])
                        return redirect()->back()->with(['fail' => 'Please Enter a Title']);
                   $isProject->title = $request['title'];             
                  $isProject->save();
                  return redirect()->back()->with(['success' => 'title Edited Succefuly']);  
               }


               else if($request->has('save0'))
               {
                  
                     if(!$request->file('mainimage'))
                        return redirect()->back()->with(['fail' => 'Please Select an Image']);                                           
                            
                  try{
                      $image = $request->file('mainimage');
                  $filename =time() . '.' . $image->getClientOriginalExtension();//->encode('png')
                  $location = public_path('images/ProjectImages/' . $filename);

                  Image::make($image)->resize(919,621)->save($location);
                   if($isProject->image)                           
                              File::delete('images/ProjectImages/' . $isProject->image); 

                  $isProject->image= $filename;
                  $isProject->save();
                  return redirect()->back()->with(['success' => 'Image Uploaded Succefuly']); 
                  }  
                   catch (\Exception $e) {
                            //return $e->getMessage();
                           return redirect()->back()->with(['fail' => 'Image is too large or extension not supported, Please upload another one']); 
                        } 
                 
               }
               else if($request->has('save2'))
               {
                  if(!$request['abstract'])
                        return redirect()->back()->with(['fail' => 'Please Enter an Abstract']);
                  $isProject->abstract = $request['abstract'];             
                  $isProject->save();
                  return redirect()->back()->with(['success' => 'abstract Edited Succefuly']);  
               }            
                else if($request->has('save5'))
               {
                  if(!$request['objectives'])
                        return redirect()->back()->with(['fail' => 'Please Enter an Objectives']);
                  $isProject->aims_objectives = $request['objectives'];          
                  $isProject->save();
                  return redirect()->back()->with(['success' => 'Aims and Objectives Edited Succefuly']);  
               }
      			else
                  return redirect()->back()->with(['fail' => 'Ops ! Something Went Wrong ...']);  
   		}
         else
                  return redirect()->back()->with(['fail' => 'Ops ! Something Went Wrong ...']); 
   	  	
   }

  
   //*****************************************************************************************************************************

  

}



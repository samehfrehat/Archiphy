<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
		
		Route::get('/',"GuestController@getindex")->name('home');

		Route::get('/home',"GuestController@getindex")->name('home');

		Route::get('/login', "LoginController@getUserLogin")->name('login');

		Route::get('/registration', "GuestController@getRegNewUser")->name('reg');

		Route::post('/registration', "GuestController@regNewUser");

		Route::post('/login', "LoginController@userLogin");		

		Route::get('/logout',"LoginController@Logout")->name('logout'); // log user out of system


Route::group(['middleware' => 'auth'], function () {

		Route::get('/projects', "StudentUserController@getProjectsHome")->name('projectshome'); //projects list or search a project
		Route::get('/projects/{id}', "StudentUserController@getProject")->name('showproject'); //show project 
		Route::post('/projects', "StudentUserController@createNewProject"); // create new project 

		Route::get('/editproject', "StudentUserController@getEditProject")->name('editproject'); // fill project information (decumentation)
		Route::post('/editproject', "StudentUserController@postEditProject"); // update project information		
		
		Route::get('/profile/{id}', "StudentUserController@getUserProfile")->name('profile'); // user profile
		Route::post('/profile/{id}', "StudentUserController@postProfilePicture");// post profile picture		
});

Route::group(['middleware' => 'auth:doctor'], function () {

		Route::get('/doctor', "DoctorUserController@getHome")->name('doctorhome'); //projects list or search a project		
		
});





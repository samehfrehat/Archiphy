@extends('layouts.master')

@section('title')
<link rel="shortcut icon" href="{{URL::asset('/images/aaupicon2.ico')}}" />
<title>Login</title>    
@endsection

@section('content')
	<div class="container">
     <label class="panel-login">
                <div class="login_result"></div>    <!-- its just an empty space -->
            </label>
                <div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color: #3c3d41;">
                                <div class="col-md-4"></div>
                                <div class="row-fluid user-row ">
                                    <img src="{{URL::asset('/images/aaup3.png')}}" class="img-circle" alt="Conxole Admin" style=" width:100%;height:250px;"/>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form accept-charset="UTF-8" role="form" class="form-signin" method="post">
                                    {{ csrf_field() }}
                                    <fieldset>

                                            <label class="panel-login">
                                                <div class="login_result"></div>    <!-- its just an empty space -->
                                            </label>

                                                <!-- enter Email Form-->
                                            <div class="form-group {{ $errors->has('email') ? ' has-error' : ''}}">
                                                <label class="control-label" for="name">E-mail</label>
                                                <input input class="form-control" placeholder="Please Enter Your E-mail" id="email" name="email" type="text" value="{{Request::old('email')}}">
                                            </div>
                                                <!-- enter password Form-->
                                            <div class="form-group {{ $errors->has('password') ? ' has-error' : ''}}">
                                                <label class="control-label" for="password">Password</label>
                                                <input input class="form-control" placeholder="Please Enter Your Passowrd" id="password" name="password" type="password">
                                            </div>
                                            <div class="checkbox"><label><input type="checkbox" name="remember" id="remember"> Remember Me</label>
                                            </div>

                                             </br>	
                                                <!-- submit button form-->																				
                                            <button  class="btn btn-primary col-md-12" type="submit" id="login">Login</button>
                                            <div class="row">
                                                <a href="#" class="btn btn-link">Forgotten Password?</a>OR<a href="{{ url('registration') }}" class="btn btn-link">Create an account</a> 
                                            </div>
                                            
                                    </fieldset>
                                </form>
                            </div>
                            
                            @if(count($errors) > 0)
                                         <section>
                                            <ul>
                                                 <div class="alert alert-danger" role="alert">
                                                 @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                                </div>
                                            </ul>   
                                         </section>
                                   @endif

  


                            @if( Session::has('fail') )
                                <section>     
                                    <ul>
                                        <div class="alert alert-danger" role="alert">
                                             <li>{{ Session::get('fail') }}</li>
                                        </div>
                                    </ul>   
                                </section>
                            @endif  
                        </div>
                    </div>
                </div>
            </div>
@endsection

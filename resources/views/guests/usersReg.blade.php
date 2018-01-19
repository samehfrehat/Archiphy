@extends('layouts.master')

@section('title')
<link rel="shortcut icon" href="{{URL::asset('/images/aaupicon2.ico')}}" />
<title>Registration</title>    
@endsection

@section('content')

<form class="form-horizontal" method="post">
{{ csrf_field() }}

           <label class="panel-login">
                <div class="login_result"></div>    <!-- its just an empty space -->
            </label>

                 <div class="col-md-5"></div>
                 <div class="col-md-7">
                  <img src="{{URL::asset('/images/composer.png')}}" class="img-responsive" style="text-align: center;"/>                 
                 </div>
              
            
            <div class="form-group">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                     @if(count($errors) > 0)
                                         <section>
                                            <ul>
                                                 <div class="alert alert-danger col-md-8" role="alert">
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
                                        <div class="alert alert-danger col-md-8" role="alert">
                                             <li>{{ Session::get('fail') }}</li>
                                        </div>
                                    </ul>   
                                </section>
                                @elseif( Session::has('success') )
                                <section>     
                                    <ul>
                                        <div class="alert alert-success col-md-8" role="alert">
                                             <li>{{ Session::get('success') }}</li>
                                        </div>
                                    </ul>   
                                </section>
                            @endif 
                </div>
            </div>
                            
                <!-- Text input-->
            <div class="form-group  {{ $errors->has('student_number') ? ' has-error' : ''}}">
              <label class="col-md-4 control-label" for="studentid">Student ID</label>  
              <div class="col-md-4">
                  <input id="student_number" name="student_number" type="text" placeholder="Enter your student ID" class="form-control input-md" value="{{Request::old('student_id')}}">                
              </div>
            </div>
            <!-- Text input-->
            <div class="form-group {{ $errors->has('first_name') ? ' has-error' : ''}}">
              <label class="col-md-4 control-label" for="name">First Name</label>  
              <div class="col-md-4">
                  <input id="first_name" name="first_name" type="text" placeholder="Enter your first name" class="form-control input-md" value="{{Request::old('first_name')}}" >
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group {{ $errors->has('last_name') ? ' has-error' : ''}}">
              <label class="col-md-4 control-label" for="name">Last Name</label>  
              <div class="col-md-4">
                  <input id="last_name" name="last_name" type="text" placeholder="Enter your last name" class="form-control input-md" value="{{Request::old('last_name')}}">
                
              </div>
            </div>


            <!-- Text input-->
            <div class="form-group {{ $errors->has('email') ? ' has-error' : ''}}">
              <label class="col-md-4 control-label" for="email">E-mail</label>  
              <div class="col-md-4">
                 <input id="email" name="email" type="text" placeholder="Enter your email id" class="form-control input-md" value="{{Request::old('email')}}">
                
              </div>
            </div>

            <!-- Password input-->
            <div class="form-group {{ $errors->has('password') ? ' has-error' : ''}}">
              <label class="col-md-4 control-label" for="password">Password</label>
              <div class="col-md-4">
                <input id="password" name="password" type="password" placeholder="Enter a password (8 characters minimum)" class="form-control input-md">
                
              </div>
            </div>

            <!-- Password input-->
            <div class="form-group {{ $errors->has('re_password') ? ' has-error' : ''}}">
              <label class="col-md-4 control-label" for="password">Re-Password</label>
              <div class="col-md-4">
                <input id="re_password" name="re_password" type="password" placeholder="Re-Enter the password" class="form-control input-md">                
              </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="specialization">Your Specialization</label>
              <div class="col-md-4">
                <select id="specialization_group" name="specialization_group" class="form-control">
                  <option value="CIT">Computer Information Technology</option>  
                  <option value="CS">Computer Science</option>
                  <option value="MMT">Multimedia Technologies</option>   
                  <option value="CSE">Computer Science Engineering</option>   
                  <option value="TCE">Telecommunications Engineering</option>   
                  <option value="GIS">Geographic Information Systems</option>                    
                </select>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group {{ $errors->has('phone_number') ? ' has-error' : ''}}">
              <label class="col-md-4 control-label" for="phone">Phone Number</label>  
              <div class="col-md-4">
              <input id="phone_number" name="phone_number" type="text" placeholder="Enter your Phone Number (Optional)" class="form-control input-md" value="{{Request::old('phone_number')}}">         
              </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group ">
              <label class="col-md-4 control-label" for="gender">Your Gender</label>
              <div class="col-md-4">
                <select id="gender_group" name="gender_group" class="form-control">
                  <option value="Male">Male</option>  
                  <option value="Female">Female</option>                 
                </select>
              </div>
            </div>

             <!-- Text input-->
            <div class="form-group {{ $errors->has('address') ? ' has-error' : ''}}">
              <label class="col-md-4 control-label" for="address">Address</label>  
              <div class="col-md-4">
              <input id="address" name="address" type="text" placeholder="Enter your address  (Optional)" class="form-control input-md" value="{{Request::old('address')}}">
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="signup"></label>
              <div class="col-md-4">
                <button id="signup" name="signup" class="btn btn-success">Sign Up</button>
              </div>
            </div>

</form>
@endsection

@section('js')
  <script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    });
</script>   
@endsection
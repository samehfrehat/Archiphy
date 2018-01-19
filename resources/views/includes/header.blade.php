
<header>	

	@if(Auth::check() && Auth::guard('web'))
	
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#0a4d91;" >
		 <div class="container">
			 <div class="row">
		 	<!-- Brand and toggle get grouped for better mobile display -->
		            <div class="navbar-header">
		                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		                    <span class="sr-only">Toggle navigation</span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                </button>
		                <a class="navbar-brand active" href="{{ route('projectshome') }}" style="color: #ffffff;">
		                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Projects Home</a>
		            </div>
		            <!-- Collect the nav links, forms, and other content for toggling -->
		        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
		        	@if(Auth::user()->StudentProject)
		                <ul class="nav navbar-nav">
		                    <li >
		                        <a href="{{ route('editproject') }}" style="color: #ffffff;">
		                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span><strong> Edit Project</strong>
		                        </a>
		                    </li>		                   	                   
		                </ul>
		            @endif

		            <div class=" navbar-collapse " id="bs-example-navbar-collapse-1" style="float:right;">
		                <ul class="nav navbar-nav ">		                
		                    <li class="dropdown">		                    
					            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: #ffffff;">
					           		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>			
					               <strong> Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name}} </strong><span class="caret"></span></a>

					                    <ul class="dropdown-menu" role="menu" style="width: 150px; ">       
					                    	<li  role="presentation">
	                                            <div class="col-md-12">	                                            	
	                                            	@if(Auth::user()->image)
	                                                 <a href="{{ route('profile',Auth::user()->id) }}"><img src="{{ URL::asset('/images/UserProfileImage/' . Auth::user()->image) }}" class="img-circle" width="100%" height="100px" style="border:2px solid grey;" /></a>
	                                                 @else
	                                                 <a href="{{ route('profile',Auth::user()->id) }}"><img src=" {{URL::asset('/images/default-profile.png')}}" class="img-circle" width="100%" height="100px" style="border:2px solid grey;" /></a>	                                                
	                                                 @endif
	                                            </div>	
	                                        </li> 	                                       				                    	
					                   		<li role="presentation" ><a href="{{ route('profile',Auth::user()->id) }}">
					                   		<span class="glyphicon glyphicon-user" aria-hidden="true"></span><strong> Profile</strong></a></li>
					                   		@if(Auth::user()->StudentProject)
					                   		<li role="presentation"><a href="{{ route('editproject') }}">
					                   		<span class="glyphicon glyphicon-edit" aria-hidden="true"></span><strong> My Project</strong></a></li>
					                   		@endif
					                   		  <hr>
					                        <li role="presentation"><a href="{{ route('logout') }}">
					                        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span><strong> Logout</strong></a></li>	                        
					                    </ul>
					        </li>		                   	                   
		                </ul>
		            </div>

		        </div>
	            <!-- /.navbar-collapse -- >
	            </div>
	             <!-- /.row -->
		 </div>
        <!-- /.container -->

	</nav>

	@else
		
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#0a4d91;">
			<div class="container">
		            <a href="{{ route('home') }}"><img src="{{URL::asset('/images/aaup3.png')}}" style="width: 9%;"></a>
	            
		            <div style="float:right;" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
		                <ul class="nav navbar-nav">
		                    <li>
		                        <a href="{{ route('reg') }}"  style="color: #ffffff;">
		                        <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span><strong> Registration</strong>
		                        </a>
		                    </li>
		                    <li>
		                        <a href="{{ route('login') }}"  style="color: #ffffff;">
		                        <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span><strong> Login</strong>
		                        </a>
		                    </li>	
		                    	                   
		                </ul>
		            </div>
	           	        
			 </div>
		</nav>

		@endif
</header>
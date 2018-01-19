@extends('layouts.master')

@section('title')
<link rel="shortcut icon" href="{{URL::asset('/images/aaupicon2.ico')}}" />
<title>My Project</title>    
@endsection

@section('content')
   
 
   			<label class="panel-login">
                <div class="login_result"></div>    <!-- its just an empty space -->
            </label>
        <div class="form-group">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
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
            @elseif(Session::has('success'))
            <section>     
                    <ul>
                        <div class="alert alert-success" role="alert">
                            <li>{{ Session::get('success') }}</li>
                        </div>
                    </ul>   
                </section>
            @endif 
            </div>
        </div>


<div class="container"> 
	
	<label class="panel-login">
		<div class="login_result"><h2><span class="label label-info">Project Title : {{Auth::user()->StudentProject->title}}</span></h2></div>    <!-- its just an empty space --></label>

			<div class="col-md-2"></div>
				<div class="col-md-8">
					<form method="post">
						{{ csrf_field() }}
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
											 Project Title</a>
									</h4>
								 </div>
							<div id="collapse1" class="panel-collapse collapse  in">
								<div class="panel-body">
									<div class="form-group {{ $errors->has('title') ? ' has-error' : ''}}">
										<input input class="form-control" id="title" name="title" placeholder="Enter your title" value="{{ $project->title }}">
									</div>
									<button id="save111" name="save111" value="save111" class="btn btn-success" style="float: right;">Save</button>
								 </div>
							</div>
							</div>
					</form>
						</br>
				</div>


 		<div class="col-md-2"></div>
 		<div class="col-md-8">
   		<form method="post" enctype="multipart/form-data">
   		{{ csrf_field() }}
			  <div class="panel panel-primary">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapse100">
				        Main Image</a>
				      </h4>
				    </div>
				    <div id="collapse100" class="panel-collapse collapse">
				      <div class="panel-body">
				      		<label>Upload Main Image</label>
				      		<input type="file" class="filestyle" name="mainimage" value="mainimage" data-input="false" data-buttonName="btn-primary">
				      		<button id="save0" name="save0" value="save0" class="btn btn-success" style="float: right;">upload</button>
				      </div>
				    </div>
			  </div>
		</form>
		</br>
		</div>
   		<div class="col-md-2"></div>
   				
						
		<div class="col-md-2"></div>
			<div class="col-md-2"></div>
				 <div class="col-md-8">
					<form method="post">
						{{ csrf_field() }}
						  <div class="panel panel-primary">
						   		<div class="panel-heading">
						     		 <h4 class="panel-title">
						       		 <a data-toggle="collapse" data-parent="#accordion" href="#collapse11">
						       		 Declaration</a>
						    		  </h4>
							    </div>
						  		    <div id="collapse11" class="panel-collapse collapse">
							   		    <div class="panel-body">
							   		    	<div class="form-group {{ $errors->has('declaration') ? ' has-error' : ''}}">					              
								              <textarea class="form-control input-md" rows="10" id="declaration" name="declaration" placeholder="Enter your declaration"  value="{{Request::old('declaration')}}">{{ $project->declaration }}</textarea>
								            </div>
								            <button id="save1" name="save1" value="save1" class="btn btn-success" style="float: right;">Save</button>
							   		    </div>
						   		    </div>
	    					</div>
			   	</form>
		   			</br>
 		</div>
 		<div class="col-md-2"></div>	


 		<div class="col-md-2"></div>
 		<div class="col-md-8">
   		<form method="post">
   		{{ csrf_field() }}
			  <div class="panel panel-primary">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
				        Abstract</a>
				      </h4>
				    </div>
				    <div id="collapse2" class="panel-collapse collapse">
				      <div class="panel-body">
				      		<div class="form-group {{ $errors->has('abstract') ? ' has-error' : ''}}">
					              <textarea class="form-control input-md" rows="10" id="abstract" name="abstract" placeholder="Enter your abstract" value="{{Request::old('abstract')}}">{{ $project->abstract }}</textarea>
					            </div>
					            <button id="save2" name="save2" value="save2" class="btn btn-success" style="float: right;">Save</button>
				      </div>
				    </div>
			  </div>
		</form>
		</br>
		</div>
		<div class="col-md-2"></div>

 		
 		<div class="col-md-2"></div>
 		<div class="col-md-8">
		<form method="post">
	   	{{ csrf_field() }}
			  <div class="panel panel-primary">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
				        Aims and Objectives</a>
				      </h4>
				    </div>
				    <div id="collapse5" class="panel-collapse collapse">
				       <div class="panel-body">
				      			<div class="form-group {{ $errors->has('objectives') ? ' has-error' : ''}}">
					              <textarea class="form-control input-md" rows="10" id="objectives" name="objectives" placeholder="Enter your objectives" value="{{Request::old('objectives')}}">{{ $project->aims_objectives }}</textarea>
					            </div>
					            <button id="save5" name="save5" value="save5" class="btn btn-success" style="float: right;">Save</button>
				 		     </div>
				    </div>
			  </div>
		</form>
		</br>
		</div>
		<div class="col-md-2"></div> 	

		<div class="col-md-2"></div>
 		<div class="col-md-8">
   		<form method="post" enctype="multipart/form-data">
   		{{ csrf_field() }}
			  <div class="panel panel-primary">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapse44">
				        Attach Images</a>
				      </h4>
				    </div>
				    <div id="collapse44" class="panel-collapse collapse">
				      <div class="panel-body">
				      		<label>Attach Project Images</label>
				      		<input type="file" class="filestyle" name="uploadimage" value="uploadimage" data-input="false" data-buttonName="btn-primary">
				      		<button id="attachimage" name="attachimage" value="attachimage" class="btn btn-success" style="float: right;">upload</button>
				      </div>
				    </div>
			  </div>
		</form>
		</br>
		</div>
   		<div class="col-md-2"></div>

 	
 </div>
	

                                <!-- <div class="text-center pagination-centered center-block"> this is for centralized the page elements -->

   	

@endsection

@section('js')
<script type="text/javascript">
    $(":file").filestyle({input: false buttonName: "btn-primary"});
</script>
@endsection



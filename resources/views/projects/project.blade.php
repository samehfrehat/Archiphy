@extends('layouts.master')


@section('title')
<link rel="shortcut icon" href="{{URL::asset('/images/aaupicon2.ico')}}" />
<title>{{$project->title}}</title>    
@endsection

@section('content')

<div class="container" style="padding-top: 10px;">
	<div class="col-md-2">		
	</div>
	<div class="col-md-8">
			<table class="table table-bordered" >
				<thead>
					<tr>
					<td colspan="2" style="text-align: center;"><h3><span class="label label-info">{{$project->title}}</span></h2></td>
					</tr>
				</thead>
				<tbody >	
						<tr class="info">				  				
				  			  <td class="col-md-1"><strong>Declaration</strong></td>
							  <td >{{$project->declaration}}</td>
				  		</tr>			
				  		<tr >				  				
				  			  <td class="col-md-1"><strong>Abstract</strong></td>
							  <td >{{$project->abstract}}</td>			  
				  		</tr>				  		
				  		<tr class="info">
				  			<td class="col-md-1"><strong>Aims and Objectives</strong></td>
				  			<td>{{$project->aims_objectives}}</td>
				  		</tr>
				  		<tr class="danger">
				  			<td class="col-md-1"><strong>Done By</strong></td>
				  		<td>
				  				<a href="{{route('profile',$project->StudentUser->id)}}"><img src="{{ URL::asset('/images/UserProfileImage/' . $project->StudentUser->image) }}" class="img-thumbnail" width="50px" height="50px" style="" />{{$project->StudentUser->first_name}} {{$project->StudentUser->last_name}}</a>				  		
				  		</tr>
				</tbody>		
			</table>
	</div>
</div>

<div class="row" style="padding-left: 30px; padding-right: 30px; "> 

     @foreach($project->ProjectImages as $projectimage)	
     	     	
		 <div  class="col-md-3 portfolio-item"  >
		    <a href="{{URL::asset('/images/ProjectImages/' . $projectimage->image)}}" data-lightbox="roadtrip">
	 		   	<img class="img-responsive img-rounded" src="{{ URL::asset('/images/ProjectImages/' . $projectimage->image) }}" />
	 		 </a> 		   	 	
	 		   	<hr>  		              
		 </div> <!-- portfolio item end-->			         
	@endforeach   

</div>

	
@endsection



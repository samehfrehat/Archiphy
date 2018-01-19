@extends('layouts.master')

@section('title')
<link rel="shortcut icon" href="{{URL::asset('/images/aaupicon2.ico')}}" />
<title>Profile</title>
  
@endsection

@section('content')


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
<br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">        
            <div class="col-md-12 lead">{{$user->first_name}} {{$user->last_name}} Profile<hr></div>
          </div>
          <div class="row">
			<div class="col-md-4 text-center">
			@if($user->image)
              <img class="img-circle" style="width:100%;height:350px;" src="{{ URL::asset('/images/UserProfileImage/' . $user->image) }}">
              @else
              	<img class="img-circle" style="width:100%;height:350px;" src="{{URL::asset('/images/default-profile.png')}}">
              	@endif
              <hr>

            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="only-bottom-margin">User Name : {{$user->first_name}} {{$user->last_name}}</h1>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                      <h4><span class="text-muted">Email:</span> {{$user->email}}</h4>
                      <h4><span class="text-muted">Phone Number:</span> {{$user->phone_number}}</h4>
                      <h4><span class="text-muted">Address:</span> {{$user->address}}</h4>
                      <h4><span class="text-muted">Major:</span> {{$user->major}}</h4>                  
                      <h4><span class="text-muted">Gender:</span> {{$user->gender}}</h4><br><br><br><br><br><br>
                      <small class="text-muted"><strong>Joined Us at : {{$user->created_at}}</strong></small>
                    </div>
                    <div class="col-md-6">
                    <!--
                      <div class="activity-mini">
                        <i class="glyphicon glyphicon-comment text-muted"></i> 500
                      </div>
                      <div class="activity-mini">
                        <i class="glyphicon glyphicon-thumbs-up text-muted"></i> 1500
                      </div>
                      -->
                    </div>
                  </div>
                </div>
              </div>
          
              @if(Auth::user()->id === $user->id)    
              <div class="row">
              <div class="col-md-1"></div>
                <div class="col-md-10">            
                  <form method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                       <div class="form-group" style="">
                        <input type="file" class="filestyle" name="profilepic" value="profilepic" data-input="false" data-buttonName="btn-primary">
                        </div>  
                      <button id="profilepic" name="profilepic" value="profilepic" class="btn btn-success" style="">change profile picture</button>
                 </form>
                 </div>
                   <div class="col-md-1">
                  <button class="btn btn-default pull-right" style="float:right;"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
                  </div>
              </div>
              @endif
                        
          <div class="row">

            <div class="col-md-12">
              <hr>
              @if($user->StudentProject)
				         <div  class="col-md-4 portfolio-item">
				              <div class="thumbnail">
				                  <a href="{{ route('showproject',[$user->StudentProject->id]) }}">                         
				                    @if($user->StudentProject->image)
				                    <img class="img-responsive img-rounded" src="{{ URL::asset('/images/ProjectImages/' . $user->StudentProject->image) }}" alt="" style="width:100%;height:230px;"/>
				                    @else
				                    <img class="img-responsive img-rounded" src="{{ URL::asset('/images/test.jpg') }}" alt="" style="width:100%;height:220px;"/>
				                    @endif
				                   </a> 
				                   <a href="{{ route('showproject',[$user->StudentProject->id]) }}"><h4 class="abstractText2">{{ $user->StudentProject->title }}</h4></a>
				                    <p class="abstractText">{{ $user->StudentProject->abstract }}</p>
				                   
				                </div> <!--thumbnail end -->
				          </div> <!-- portfolio item end-->
				          @endif             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
     $("p.abstractText").text(function(index, currentText) {
    return currentText.substr(0, 99)+' ...';
    });     
</script>
<script type="text/javascript">  
    $(":file").filestyle({input: false buttonName: "btn-primary"});
</script>

<script type="text/javascript">
    $("h4.abstractText2").text(function(index, currentText) {
    return currentText.substr(0, 27)+' ...';
});
</script>

@endsection


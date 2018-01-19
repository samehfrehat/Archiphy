@extends('layouts.master')

@section('title')
<link rel="shortcut icon" href="{{URL::asset('/images/aaupicon2.ico')}}" />
<title>Projects</title>    
@endsection

@section('content')
	
<!-- Page Content -->
<div class="container">

    @if(!Auth::user()->StudentProject)
     <!-- Button trigger modal -->
     

            <h1><strong>Don't Have a Project ? </strong></h1>
            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
              Create New Project Now
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Creating Project</h4>
                  </div>
                      <div class="modal-body">
                             <form method="post">
                               {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('projecttitle') ? ' has-error' : ''}}">                                 
                                      <input id="projecttitle" name="projecttitle" type="text" placeholder="Enter your Project Title" class="form-control input-md" value="{{Request::old('projecttitle')}}" required>

                                  </div>
                         <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="save">Create</button>
                          </div>
                       </form>  
                       </div>
                </div>
              </div>
            </div>
        @endif

                         @if(count($errors) > 0)
                             <div class="container">
                                 <section>
                                      <ul>
                                         <div class="alert alert-danger col-md-8" role="alert">
                                             @foreach($errors->all() as $error)
                                                  <li>{{$error}}</li>
                                               @endforeach
                                           </div>
                                       </ul>   
                                    </section>
                             </div>                                       
                          @endif

                            @if( Session::has('fail') )
                            <div class="container">
                                <section>     
                                    <ul>
                                        <div class="alert alert-danger col-md-8" role="alert">
                                             <li>{{ Session::get('fail') }}</li>
                                        </div>
                                    </ul>   
                                </section>
                                </div>
                                @elseif( Session::has('success') )
                                <div class="container">
                                <section>     
                                    <ul>
                                        <div class="alert alert-success col-md-8" role="alert">
                                             <li>{{ Session::get('success') }}</li>
                                        </div>
                                    </ul>   
                                </section>
                                </div>
                            @endif 

        <!-- Page Header -->

        <div class="row">
            <label class="panel-login">
                <div class="login_result"></div>    <!-- its just an empty space -->
            </label>

              <div class="container">                
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">

                    <div class="item active">
                      <img src="{{URL::asset('/images/day1.jpg')}}" alt="Los Angeles" style="width:100%; height: 400px;">
                      <div class="carousel-caption">
                        <h3>Inside the faculty</h3>
                        <p>Engineering Day</p>
                      </div>
                    </div>

                    <div class="item">
                      <img src="{{URL::asset('/images/day2.jpg')}}" alt="Chicago" style="width:100%; height: 400px;">
                      <div class="carousel-caption">
                        <h3>The Stadium</h3>
                        <p>Engineering Day</p>
                      </div>
                    </div>

                    <div class="item">
                      <img src="{{URL::asset('/images/day3.jpg')}}" alt="Chicago" style="width:100%; height: 400px;">
                      <div class="carousel-caption">
                        <h3>Dr.Sami</h3>
                        <p>Engineering Day</p>
                      </div>
                    </div>
                  
                    <div class="item">
                      <img src="{{URL::asset('/images/day4.jpg')}}" alt="New York" style="width:100%; height: 400px;">
                      <div class="carousel-caption">
                        <h3>Information Technology and Engineering Faculty</h3>
                        <p>We love the Big Apple!</p>
                      </div>
                    </div>
                
                  </div><!-- carousel-inner end-->

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div><!-- carousel slide end-->
              </div><!-- container end-->
        </div><!-- Row end-->
        <hr>

        <div class="row">
            <nav class="navbar navbar-inverse" style="background-color:#3b3c3d; ">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    
                  </div>

                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <a href=""><img src="{{URL::asset('/images/aaup3.png')}}" style="width: 9%;"></a>
                    <ul class="nav navbar-nav"> 
                      
                    </ul>
                    <form method="get" class="navbar-form navbar-right">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search for..." required="Enter Keyword">
                      </div>
                      <button type="submit" class="btn btn-default">Go!</button>
                    </form>
                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
              </nav>
        </div>
       
  
  <div class="row">    
     @for($i=0;$i<count($projects);$i++)
         <div  class="col-md-4 portfolio-item">
              <div class="thumbnail">
                  <a href="{{ route('showproject',[$projects[$i]->id]) }}">
                    @if($projects[$i]->image)
                    <img class="img-responsive img-rounded" src="{{ URL::asset('/images/ProjectImages/' . $projects[$i]->image) }}" alt="" style="width:100%;height:230px;"/>
                    @else
                    <img class="img-responsive img-rounded" src="{{ URL::asset('/images/test.jpg') }}" alt="" style="width:100%;height:230px;"/>
                    @endif
                   </a> 
                   <a href="{{ route('showproject',[$projects[$i]->id]) }}"><h4 class="abstractText2">{{ $projects[$i]->title }}</h4></a>
                    <p class="abstractText">{{ $projects[$i]->abstract }}</p>
                   
                </div> <!--thumbnail end -->
          </div> <!-- portfolio item end-->
    @endfor
  </div>
    
        <hr>
     
        <div class="text-center">
          {!! $projects->links() !!}  <!-- / ver easy way to pagenation -->
        </div>

        <!-- /.row -->
       <!--  @if($projects->currentPage() !==1)
            <a href="{{ $projects->previousPageUrl() }}"><span class="fa fa-caret-left"></span></a>
            @endif

            @if($projects->currentPage() !== $projects->lastPage() && $projects->hasPages())
            <a href="{{ $projects->nextPageUrl() }}"><span class="fa fa-caret-right"></span></a>
            
            @endif -->
       
        
</div>
<!-- /.container -->



@endsection

@section('js')

<script type="text/javascript">
    $("p.abstractText").text(function(index, currentText) {
    return currentText.substr(0, 99)+' ...';
});
</script>

<script type="text/javascript">
    $("h4.abstractText2").text(function(index, currentText) {
    return currentText.substr(0, 27)+' ...';
});
</script>

@endsection
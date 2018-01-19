@extends('layouts.master')

@section('title')
<link rel="shortcut icon" href="{{URL::asset('/images/aaupicon2.ico')}}" />
<title>AAUProjects</title>    
@endsection

@section('content')
	  <!-- Image Background Page Header -->
    <!-- Note: The background image is set within the business-casual.css file. -->
    <header class="business-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="height: 400px; width: 100%;
    background: url('/images/banner - Copy.jpg') center center no-repeat scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;">
                    <!-- Image Background Page Header <h1 class="tagline">Arab American University Projects </h1>-->
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <hr>

        <div class="row">
            <div class="col-sm-8">
                <h1>Arab American University Projects</h1>
                <h2>What We Do ?</h2>
                <p>combines all the previous graduation projects ,and allows new students to learn and benefit from it,the students can complete these projects  that the previous students did not achieve, to produce a real product that benefits the community.</p>
                <p>main goal of this project is to benefit the society from fresh graduated students, and employ their knowledge and heartiness to the public, without forgetting providing a projects in a new, trend technologies.</p>

                <p>
                    <a class="btn btn-success btn-lg" href="{{ url('registration') }}">Sign Up Now &raquo;</a>
                </p>
            </div>
            <div class="col-sm-4">
                <h2>Contact Us</h2>
                <address>
                    <strong>AAUProjects</strong>
                    <br>FACULTY OF ENGINEERING AND INFORMATION TECHNOLOGY
                    <br>In Front Of Faculty 
                    <br>
                </address>
                <address>
                    <abbr title="Phone">Phone:</abbr>(059) 7-166-216
                    <br>
                    <abbr title="Email">E-mail:</abbr> <a href="mailto:#">samehfraihat@gmail.com</a>
                </address>
            </div>
        </div>
        <!-- /.row -->



        <hr>

        <h1>Who Are We ?</h2>
        <div class="row">
            <div class="col-sm-4">
                <img class="img-circle img-responsive img-center" src="{{URL::asset('/images/sameh1.jpg')}}" alt="">
                <h2>Sameh Frehat</h2>
                <h4>Full Stack Developer</h4>
                <p>Success is a lousy teacher. It seduces smart people into thinking they can't lose.</p>
            </div>
            <div class="col-sm-4">
                <img class="img-circle img-responsive img-center" src="{{URL::asset('/images/shaher1.jpg')}}" alt="">
                <h2>Shaher Belbisi</h2>
                <h4>Software Engineer</h4>
                <p>It's fine to celebrate success but it is more important to heed the lessons of failure.</p>
            </div>
            <div class="col-sm-4">
                <img class="img-circle img-responsive img-center" src="{{URL::asset('/images/amjad1.jpg')}}" alt="">
                <h2>Amjad Abdel-Aziz</h2>
                <h4>QA Engineer</h4>
                <p>The Internet is becoming the town square for the global village of tomorrow.</p>
            </div>
        </div>
        <!-- /.row -->



        <hr>

   

    </div>
    <!-- /.container -->
@endsection


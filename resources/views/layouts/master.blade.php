<!DOCTYPE html>
<html lang="en">

	<head>
			@yield('title')
		
			<!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.min.css')}}"> <!-- you can put (secure),insted of(to)it does not work-->	
	    <link rel="stylesheet" type="text/css" href="{{URL::to('css/footer.css')}}"> 
	    <link rel="stylesheet" type="text/css" href="{{URL::to('css/lightbox.css')}}">	   
	    <link rel="stylesheet" type="text/css" href="{{URL::to('css/lightbox.css')}}">	

		@yield('style')
	</head>

	@include('includes.header')

	<body style="background-color: #f5f8fa;padding-top: 50px; overflow-x: hidden;">

	@yield('content')
	
	@include('includes.footer')

	</body>	
		
		<script src="{{URL::to('js/jquery-3.2.1.min.js')}}"></script>	
		<script src="{{URL::to('js/bootstrap.min.js')}}"></script>
		<script src="{{URL::to('js/lightbox.js')}}"></script>
		<script src="{{URL::to('js/bootstrap-filestyle.min.js')}}"></script>

	@yield('js')
		
</html>
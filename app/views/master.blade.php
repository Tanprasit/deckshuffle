<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Deck Citadel</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css' )}}">
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	    		<span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Deck Citadel</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    	@yield('navbar')
	      	<form class="navbar-form navbar-left" role="search" method="get" action="{{asset('search')}}">
		        <div class="form-group">
		        	<input type="text" id="search-bar" class="form-control dropdown" name="search" placeholder="Search" autocomplete='off'>
		        	<div class="dropdown">
			        	<ul class="dropdown-menu">
				    	</ul>
		        	</div>
		        </div>
		        <button type="submit" id="search-button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
	    	</form>
	    	<form class="navbar-form navbar-right">
		        <div class="form-group">
		        	@if(Auth::check())
			    		<img class="img-circle user-img" src="{{asset('images/users/1.jpeg')}}">
			    		<button class="btn btn-default btn-sm">
				    		<span class="glyphicon glyphicon-globe"></span>
			    		</button>
			    		<button class="btn btn-default btn-sm">
			    		<span class="glyphicon glyphicon-envelope"></span>
			    		</button>
			    		<button class="btn btn-default btn-sm">
				    		<span class="glyphicon glyphicon-user"></span>
			    		</button>
			    		<button class="btn btn-default btn-sm">
				    		<span class="glyphicon glyphicon-shopping-cart"></span>
			    		</button>
		        		<strong>
		        			{{{ Auth::user()->username }}}
		        			{{ link_to('logout', 'Log Out' )}}
		        		</strong>
		        	@else
		        		<strong>
			        		{{ link_to('login', 'Sign In') }}
		        		</strong>
		        	@endif
		        </div>
		    </form>
	    </div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<div class="container">
	@if(Session::has('message'))
		<div class='alert alert-success'>
			{{Session::get('message')}}
		</div>
	@endif
	@if(Session::has('error'))
		<div class='alert alert-warning'>
			{{Session::get('error')}}
		</div>
	@endif
	@yield('content')
	@yield('comments')
	<!-- <button id='button'>Go!</button> -->
</div>
</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script type='text/javascript' src="{{URL::asset('js/jquery.autosize.js')}}"></script> 
<script type="text/javascript" src="{{URL::asset('js/validation.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/minisearch.js')}}"></script>
@yield('scripts')
</html>
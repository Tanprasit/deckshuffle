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
	    	@include('widgets.nav')
	      	<form class="hidden-xs navbar-form navbar-left" role="search" method="get" action="{{url('search/cards/')}}">
		        <div class="form-group">
		        	<input type="text" id="search-bar" class="form-control dropdown" name="query" placeholder="Search" autocomplete='off'>
		        	<div class="dropdown">
			        	<ul class="dropdown-menu search-dropdown-menu">
				    	</ul>
		        	</div>
		        </div>
		        <button type="submit" id="search-button" class="btn btn-default hidden-xs"><span class="glyphicon glyphicon-search"></span></button>
	    	</form>
	    	<form class="navbar-form navbar-right">
		        <div class="form-group">
		        	@if( Auth::check() )
		        		<button type="button" class="btn btn-default btn-sm" onClick="location.href='{{{ url('user/' . Auth::user()->id ) }}}'">
		        			<span class="glyphicon glyphicon-home"></span>
		        			{{{ Auth::user()->username }}}
			    		</button>
			    		<button class="btn btn-default btn-sm">
				    		<span class="glyphicon glyphicon-shopping-cart"></span> Basket
			    		</button>
		    			<button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
				    		<span class="glyphicon glyphicon-cog"></span>
				    		<span class="caret"></span>
			    		</button>
						<ul class="dropdown-menu">
			    			<li>{{ link_to('logout', 'Log Out' )}}</li>
			    		</ul>
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
	@if( Session::has('message') )
		<div class='alert alert-success'>
			{{ Session::get('message') }}
		</div>
	@endif
	@if(Session::has('error'))
		<div class='alert alert-warning'>
			{{ Session::get('error') }}
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
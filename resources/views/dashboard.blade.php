<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="{{ asset('favicon.png') }}" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PANEL</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">

	<link href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

	<link href="{{ asset('/css/chosen.min.css') }}" rel="stylesheet">

	<link href="{{ asset('/css/dataTables.bootstrap.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	@yield('maps')

</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">PANEL</a>
        </div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/') }}">Menuju WEB</a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
							<li><a href="{{ url('/auth/login') }}">Login</a></li>
							<li><a href="{{ url('/auth/register') }}">Register</a></li>
						@else
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
								</ul>
							</li>
						@endif
					</ul>
				</div>
      </div>
    </nav>

		<div class="container-fluid">
		  <div class="row">
		    <div class="col-sm-3 col-md-2 sidebar">
		      <ul class="nav nav-sidebar">

						<li class="active"><a href="{{ url('/panel') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard <span class="sr-only">(current)</span></a></li>

					@if(Auth::user()->level == 2)

						<li><a href="{{ url('/cities') }}"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Cities</a></li>
					  <li><a href="{{ url('/tags') }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Categories / Tags</a></li>

					  <li><a href="{{ url('/users') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Event Organizer</a></li>

					</ul>
		      <ul class="nav nav-sidebar">
					  <li><a href="{{ url('/events') }}"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Event</a></li>

					  <li><a href="{{ url('/events/validasi') }}"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Validasi Event Pro</a></li>

					</ul>
					<ul class="nav nav-sidebar">

						<li><a href="{{ url('/settings/1/edit') }}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings</a></li>

					@endif

					@if(Auth::user()->level == 1)

						<li><a href="{{ url('/events') }}"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Event</a></li>

					@endif
		      </ul>
		    </div>
		    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


	@yield('content')

				</div>
			</div>
		</div>

	<!-- Scripts
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
-->
	<script src="{{ asset('/js/jquery-1.11.2.min.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>


<!--
	<script type="text/javascript"
	   src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
	</script>
-->
	<script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>

	<script type="text/javascript">
	  $('#date_start').datetimepicker({
	    format: 'yyyy-MM-dd hh:mm'
	  });

		$('#date_end').datetimepicker({
	    format: 'yyyy-MM-dd hh:mm'
	  });
	</script>

	<script src="{{ asset('/js/chosen.jquery.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".chosen-select").chosen({width: "100%"});
		} );
	</script>

	<!-- data tables -->
	<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('/js/dataTables.bootstrap.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
	    $('#example').dataTable();
		} );
	</script>


</body>
</html>

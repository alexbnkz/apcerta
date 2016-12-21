
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Aposta Certa :: @yield('title')</title>

	<!-- Styles -->
	<link href="/assets/bower/materialize/dist/css/materialize.min.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,400,600" rel="stylesheet" type="text/css">
	<link href="/css/apce.css" rel="stylesheet">


	<!-- Scripts -->
	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
		]); ?>
	</script>
</head>
<body>
	<div id="app">
		
		@yield('content')
	</div>

	<!-- Scripts -->
	<script src="/assets/bower/jquery/dist/jquery.min.js"></script>
	<script src="/assets/bower/materialize/dist/js/materialize.js"></script>

	<script>
		$( document ).ready(function(){
			$(".button-collapse").sideNav();
			$(".dropdown-button").dropdown();
		});
	</script>
</body>
</html>

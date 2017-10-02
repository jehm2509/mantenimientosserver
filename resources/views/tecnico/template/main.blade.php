<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('titulo', 'Default')</title>
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	@yield('misestilos')
</head>
<body>
	@include('tecnico.template.partials.nav')
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading"><h2>@yield('titulo-div')</h2></div>
				<div class="panel-body">
					@include('flash::message')
					@yield('contenido')
				</div>
			</div>
		</div>

	<script src="{{ asset('plugins/js/jquery-3.2.1.js') }}"></script>	
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	@yield('scripts')

</body>
</html>
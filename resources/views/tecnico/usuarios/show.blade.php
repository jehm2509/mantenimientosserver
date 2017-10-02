@extends('tecnico.template.main')
@section('titulo', $usuario->nombres . ' ' . $usuario->apellidos)
@section('titulo-div', $usuario->nombres . ' ' . $usuario->apellidos)
@section('contenido')
	<div class="row">
		<div class="col-xs-6 col-md-4">
			<strong>Nombres: </strong> {{ $usuario->nombres }} <br>
			<strong>Apellidos: </strong> {{ $usuario->apellidos }} <br>
			<strong>N° Identificación: </strong> {{ $usuario->cedula }} <br>
			<strong>Area: </strong> {{ $usuario->idArea }} <br>
			<strong>Cargo: </strong> {{ $usuario->cargo }} <br>
			<strong>Telefono: </strong> {{ $usuario->telefono }} <br>
			<strong>Celular: </strong> {{ $usuario->celular}} <br>	
		</div>
	</div>
	<br>
	<a href="{{ route('usuarios.index') }}" class="btn btn-info">Volver a la lista de Usuarios</span></a>
@endsection




@extends('tecnico.template.main')
@section('titulo', 'Listado de usuarios')
@section('titulo-div', 'Listado de Usuarios')
@section('contenido')
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Documento</th>
				<th>Cargo</th>
				<th>Correo</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $usuario)
				<tr>
					<td>{{ $usuario->nombres . ' ' . $usuario->apellidos }}</td>
					<td>{{ $usuario->cedula }}</td>
					<td>{{ $usuario->cargo}}</td>
					<td>{{ $usuario->email }}</td>
					<td>
						<a href="{{ route('usuarios.show', $usuario->idUsuario) }}" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></a>
						<a href="{{ route('usuarios.edit', $usuario->idUsuario) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="{{ route('usuarios.destroy', $usuario->idUsuario) }}" class="btn btn-danger" onclick="return confirm('Realmente desea eliminar este Usuario?')"><span class="glyphicon glyphicon-erase"></span></a>
					</td>
				</tr>
			@endforeach
		</tbody>		
	</table>
	<div style="text-align: center">
	{{ $usuarios->links() }}
	</div>
@endsection
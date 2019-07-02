@extends('main')
@section('content')

<div class="container">

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarCliente">Agregar</button>

	<form method="POST" action="{{route('guardarCliente')}}">
		@csrf
		<div class="modal fade"  id="agregarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modificar Cliente</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group col-md">
							<label>Nombre</label>
							<input type="text"  name="nombre" placeholder="Ingrese el nombre" class="form-control">
						</div>
						<div class="form-group col-md">
							<label>Correo</label>
							<input type="text" placeholder="Ingrese el correo" name="correo" class="form-control">
						</div>
						<div class="form-group col-md">
							<label>Telefono</label>
							<input type="text"  placeholder="Ingrese el telefono" name="telefono" class="form-control">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</form>	



	<table class="table">
		<thead>
			<tr><th>Codigo</th>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Telefono</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>

			@foreach($clientes as $cliente)
			<tr>
				<td>{{$cliente['id']}}</td>
				<td>{{$cliente['nombre']}}</td>
				<td>{{$cliente['correo']}}</td>
				<td>{{$cliente['telefono']}}</td>
				<td>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cliente{{$cliente['id']}}">
						Editar
					</button>	
				</td>
				<td>
					<form method="POST" action="{{route('eliminarCliente',['cliente' => $cliente['id']])}}">
						@method('DELETE')
						@csrf
						<button type="submit" class="btn btn btn-primary">Eliminar</button>
					</form>	
				</td>
			</tr>
			<form method="POST" action="{{route('guardarModificacionCliente',['cliente' => $cliente['id']])}}">
				@method('PUT')
				@csrf
				<div class="modal fade"  id="cliente{{$cliente['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Modificar Cliente</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group col-md">
									<label>Nombre</label>
									<input type="text" value="{{$cliente['nombre']}}" name="nombre" class="form-control">
								</div>
								<div class="form-group col-md">
									<label>Correo</label>
									<input type="text" value="{{$cliente['correo']}}" name="correo" class="form-control">
								</div>
								<div class="form-group col-md">
									<label>Telefono</label>
									<input type="text" value="{{$cliente['telefono']}}" name="telefono" class="form-control">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</div>
					</div>
				</div>
			</form>	
			@endforeach
		</tbody>
	</table>
</div>
@endsection
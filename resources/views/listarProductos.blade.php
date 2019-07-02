@extends('main')
@section('content')

<div class="container">
	<a  href="{{route('agregarProducto')}}" class="btn btn-dark">Agregar</a>
	<a  href="{{route('listarVentas')}}" class="btn btn-dark">Ventas</a>
	<a  href="{{route('listarClientes')}}" class="btn btn-dark">Clientes</a>
	<table class="table">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Marca de Vehiculo</th>
				<th>Tipo</th>
				<th>Stock</th>
				<th>Precio por Mayor</th>
				<th>Precio</th>	
				<th>Agregar Stock</th>	
				<th>Modificar</th>							
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>

			@foreach($productos as $producto)
			<tr>
				<td>{{$producto['codigo_producto']}}</td>
				<td>{{$producto['marca_vehiculo']}}</td>
				<td>{{$producto['tipo']}}</td>
				<td>{{$producto['stock']}}</td>
				<td>{{$producto['precio_producto_mayor']}}</td>
				<td>{{$producto['precio_producto']}}</td>
				<td>					
					<!-- Modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{$producto['id']}}">
							Stock
						</button>			
				</td>
				<td><a  href="{{route('editarProducto',['producto' => $producto])}}" id="btnModificar" class="btn btn btn-primary">Modificar</a></td>
				<td>
					<form method="POST" action="{{route('eliminarProducto',['producto' => $producto['id']])}}">
						@method('DELETE')
						@csrf
						<button type="submit" class="btn btn btn-primary">Eliminar</button>
					</form>					
				</td>
			</tr>
			<form method="POST" action="{{route('guardarStock',['producto' => $producto['id']])}}">
						@method('PUT')
						@csrf
						<div class="modal fade"  id="modal{{$producto['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Agregar Stock</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group col-md-6">
											<label>stock</label>
											<input type="number" value=0 name="stock" class="form-control">
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
@extends('main')
@section('content')

<div class="container">
  <form method="POST" action="{{route('guardarProducto')}}">   
    @csrf
    <div class="form-group">
      <label>Codigo de Producto</label>
      <input type="text" name="codigo_producto" class="form-control" placeholder="Codigo de producto">
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label>stock</label>
        <input type="number" name="stock" class="form-control" placeholder="Stock">
      </div>
      <div class="form-group col-md-6">
        <label>Precio de Producto por mayor</label>
        <input type="number" name="precio_producto_mayor" class="form-control"  placeholder="Precio al mayo">
      </div>
    </div>
    <div class="form-group">
      <label>Ganancia</label>
      <input type="number"  id="profit" min="0" max="9999" step="0.01" name="ganancia" class="form-control" placeholder="Porcentaje de ganancia">
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label >Marca de vehiculo</label>
        <select  name="marca_vehiculo" class="form-control">
          <option value="" selected disabled>Selecciona marca de vehiculo</option>
          @foreach($marcas as $m)
          <option value="{{$m}}">{{$m}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-4">
        <label >Tipo</label>
        <select name="tipo" class="form-control">
          <option value="" selected disabled>Selecciona tipo de producto</option>
          @foreach($tipos as $t)
          <option value="{{$t}}">{{$t}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>
@endsection

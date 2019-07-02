@extends('main')
@section('content')

<div class="container">
  <form method="POST" action="{{route('guardarModificacion',['id' => $producto->id])}}">   
    @method('PUT')
    @csrf
    <div class="form-group">
      <label>Codigo de Producto</label>
      <input type="text" name="codigo_producto" value="{{$producto->codigo_producto}}" readonly required class="form-control">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>stock</label>
        <input type="text" name="stock" value="{{$producto->stock}}" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label >Precio de Producto por mayor</label>
        <input type="number" name="precio_producto_mayor" value="{{$producto->precio_producto_mayor}}" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label>Precio Producto</label>
      <input type="number" name="precio_producto" value="{{$producto->precio_producto}}" class="form-control">
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label >Marca de vehiculo</label>
        @php($var = $producto->marca_vehiculo)
        <select  name="marca_vehiculo" class="form-control">
          <option value="" disabled>Selecciona marca de vehiculo</option>
          @foreach($marcas as $m)
          <option value="{{$m}}" {{ ($var== $m) ? 'selected' : '' }}>{{$m}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-4">
        <label >Tipo</label>
        {{$producto->tipo}}
        @php($var = $producto->tipo)
        <select name="tipo" class="form-control">
          <option value="" disabled>Selecciona tipo de producto</option>
          @foreach($tipos as $t)
          <option value="{{$t}}" {{ ($var== $t) ? 'selected' : '' }}>{{$t}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>
@endsection

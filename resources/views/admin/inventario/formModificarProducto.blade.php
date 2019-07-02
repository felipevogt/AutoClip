@extends('admin.main')

@section('content')

    <!-- Page Wrapper -->
    <div id="wrapper">

    @include('admin.components.sidebar')

    <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 mt-3">
                        <a href="{{ route('listarProductos') }}" class="btn btn-primary btn-circle">
                            <i class='fa fa-arrow-left'></i>
                        </a>
                        Modificar Producto
                    </h1>
                    <hr class="sidebar-divider">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Formulario producto</h6>
                        </div>
                        <div class="card-body m-4">
                            <form method="POST" action="{{route('guardarModificacion',['id' => $producto->id])}}">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="code">Codigo</label>
                                            <input name="codigo_producto" value="{{$producto->codigo_producto}}"
                                                   readonly type="text" class="form-control" id="code"
                                                   placeholder="Ingrese codigo..." pattern="\d{3}"
                                                   title="Codigo de 3 numeros" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Precio Compra</label>
                                            <input name="precio_producto_mayor"
                                                   value="{{$producto->precio_producto_mayor}}" type="number"
                                                   class="form-control" id="price" min="1" max="999999"
                                                   placeholder="Ingrese precio compra..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="profit">Margen de Ganancia</label>
                                            <input name="ganancia" value="{{$producto->ganancia}}"
                                                   type="number" class="form-control" id="profit" min="0" max="9999"
                                                   step="0.01" placeholder="Ingrese margen de ganancia..." required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input name="stock" value="{{$producto->stock}}" type="number"
                                                   class="form-control" id="stock" min="0" max="999999"
                                                   placeholder="Ingrese stock de producto" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Tipo</label>
                                            @php($var = $producto->tipo)
                                            <select name="tipo" class="form-control">
                                                <option value="" disabled>Selecciona tipo de producto</option>
                                                @foreach($tipos as $t)
                                                    <option value="{{$t}}" {{ ($var== $t) ? 'selected' : '' }}>{{$t}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="trademark">Marca Vehiculo</label>
                                            @php($var = $producto->marca_vehiculo)
                                            <select name="marca_vehiculo" class="form-control">
                                                <option value="" disabled>Selecciona marca de vehiculo</option>
                                                @foreach($marcas as $m)
                                                    <option value="{{$m}}" {{ ($var== $m) ? 'selected' : '' }}>{{$m}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Modificar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

@endsection
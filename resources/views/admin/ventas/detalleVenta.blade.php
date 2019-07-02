@extends('main')

@section('content2')

    <!-- Page Wrapper -->
    <div id="wrapper">

    @include('admin.components.sidebar')

    <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800 mt-3">
                        <a href="{{ route('listarVentas') }}" class="btn btn-primary btn-circle">
                            <i class='fa fa-arrow-left'></i>
                        </a>
                        Detalle Venta
                    </h1>
                    <hr class="sidebar-divider">

                    <div class="row">
                        <div class="col-6">
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Datos Venta</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5>Cantidad de productos: {{ $venta['cantidad_productos'] }}</h5>
                                        </div>
                                        <div class="col">
                                            <h5>Costo de envio: $ {{ $venta['costo_envio'] }}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h5>Costo total productos: $ {{ $venta['costo_productos'] }}</h5>
                                        </div>
                                        <div class="col">
                                            <h5>Costo total: $ {{ $venta['costo_total'] }}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h5>Dirección: {{ $venta['direccion'] }}</h5>
                                        </div>
                                        <div class="col">
                                            <h5>Tipo Pago: {{ $venta['pago'] }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Basic Card Example -->
                        <div class="col-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Datos Cliente</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5>Nombre: {{ $venta['cliente']['nombre'] }}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h5>Correo: {{ $venta['cliente']['correo'] }}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h5>Telefono: {{ $venta['cliente']['telefono'] }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de productos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Codigo</th>
                                        <th>Precio producto</th>
                                        <th>Cantidad</th>
                                        <th>Tipo</th>
                                        <th>Marca</th>
                                        <th>Precio total</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr class="text-center">
                                        <th>Codigo</th>
                                        <th>Precio producto</th>
                                        <th>Cantidad</th>
                                        <th>Tipo</th>
                                        <th>Marca</th>
                                        <th>Precio total</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($venta['productos'] as $producto)
                                        <tr>
                                            <td>{{$producto['codigo_producto']}}</td>
                                            <td>{{$producto['precio_producto']}}</td>
                                            <td>{{$producto['pivot']['cantidad']}}</td>
                                            <td>{{$producto['tipo']}}</td>
                                            <td>{{$producto['marca_vehiculo']}}</td>
                                            <td>{{$producto['pivot']['precio']}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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

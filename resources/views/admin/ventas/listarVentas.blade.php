@extends('main')

@section('content2')

    <!-- Page Wrapper -->
    <div id="wrapper">

    @include('admin.components.sidebar')

    <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                   aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                 aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                               placeholder="Search for..." aria-label="Search"
                                               aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Ventas</h1>
                    <a href="{{ route('agregarVenta' )}}" class="btn btn-primary btn-icon-split mb-4">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
                        <span class="text">Agregar venta</span>
                    </a>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de ventas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Codigo</th>
                                        <th>Cantidad de Productos</th>
                                        <th>Costo de Envio</th>
                                        <th>Costo de productos</th>
                                        <th>Costo Total</th>
                                        <th>Direccion</th>
                                        <th>Pago</th>
                                        <th>Cliente</th>
                                        <th colspan="2">Opciones</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr class="text-center">
                                        <th>Codigo</th>
                                        <th>Cantidad de Productos</th>
                                        <th>Costo de Envio</th>
                                        <th>Costo de productos</th>
                                        <th>Costo Total</th>
                                        <th>Direccion</th>
                                        <th>Pago</th>
                                        <th>Cliente</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($ventas as $venta)
                                        <tr>
                                            <td>{{$venta['id']}}</td>
                                            <td>{{$venta['cantidad_productos']}}</td>
                                            <td>{{$venta['costo_envio']}}</td>
                                            <td>{{$venta['costo_productos']}}</td>
                                            <td>{{$venta['costo_total']}}</td>
                                            <td>{{$venta['direccion']}}</td>
                                            <td>{{$venta['pago']}}</td>
                                            <td>{{$venta['cliente_id']}}</td>
                                            <td class="text-center">
                                                <a href="{{route('detalleVenta',['id' => $venta['id']])}}"
                                                   class="btn btn-primary btn-circle btn-sm"
                                                   data-toggle="tooltip" data-placement="left" title="Detalle">
                                                    <i class='fas fa-clipboard-list'></i>
                                                </a>
                                            </td>
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

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection

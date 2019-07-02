@extends('admin.main')

@section('content')

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
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Clientes</h1>
                    <button type="button" class="btn btn-primary btn-icon-split mb-4" data-toggle="modal"
                            data-target="#agregarCliente">
                        <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
                        <span class="text">Agregar cliente</span>
                    </button>

                    <form method="POST" action="{{route('guardarCliente')}}">
                        @csrf
                        <div class="modal fade" id="agregarCliente" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <input type="text" name="nombre" placeholder="Ingrese el nombre"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group col-md">
                                            <label>Correo</label>
                                            <input type="text" placeholder="Ingrese el correo" name="correo"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group col-md">
                                            <label>Telefono</label>
                                            <input type="text" placeholder="Ingrese el telefono" name="telefono"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de clientes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th colspan="32">Opciones</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr class="text-center">
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th colspan="2">Opciones</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($clientes as $cliente)
                                        <tr>
                                            <td>{{$cliente['id']}}</td>
                                            <td>{{$cliente['nombre']}}</td>
                                            <td>{{$cliente['correo']}}</td>
                                            <td>{{$cliente['telefono']}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-success btn-circle btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#cliente{{$cliente['id']}}">
                                                    <i data-toggle="tooltip" data-placement="left" title="Editar"
                                                       class='far fa-edit'></i>
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <form method="POST"
                                                      action="{{route('eliminarCliente',['cliente' => $cliente['id']])}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-circle btn-sm"
                                                            data-toggle="tooltip" data-placement="left"
                                                            title="Eliminar">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <form method="POST"
                                              action="{{route('guardarModificacionCliente',['cliente' => $cliente['id']])}}">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal fade" id="cliente{{$cliente['id']}}" tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modificar
                                                                Cliente</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group col-md">
                                                                <label>Nombre</label>
                                                                <input type="text" value="{{$cliente['nombre']}}"
                                                                       name="nombre" class="form-control">
                                                            </div>
                                                            <div class="form-group col-md">
                                                                <label>Correo</label>
                                                                <input type="text" value="{{$cliente['correo']}}"
                                                                       name="correo" class="form-control">
                                                            </div>
                                                            <div class="form-group col-md">
                                                                <label>Telefono</label>
                                                                <input type="text" value="{{$cliente['telefono']}}"
                                                                       name="telefono" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">Guardar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
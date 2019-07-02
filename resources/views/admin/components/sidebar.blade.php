<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('inicio') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-car-alt"></i>
    </div>
    <div class="sidebar-brand-text mx-3">AutoClip</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('inicio') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Paginas
  </div>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('listarProductos') }}">
      <i class="fas fa-fw fa-table"></i>
      <span>Inventario</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('listarClientes') }}">
      <i class="fas fa-user-friends"></i>
      <span>Clientes</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('listarVentas') }}">
      <i class="far fa-list-alt"></i>
      <span>Ventas</span>
    </a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
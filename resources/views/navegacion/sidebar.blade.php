<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('plantilla/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('cliente.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Cliente</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('proveedor.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Proveedor</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Almacen
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('almacen.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lista de Almacen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('calzadoAlmacen.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Almacen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('calzado.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Calzado</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('marcaModelo.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Marca Modelo</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('categoria.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Categoria</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('modelo.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Modelo</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('marca.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Marca</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tipoCalzado.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tipo Calzado</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('repartidor.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Repartidor</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('vehiculo.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Vehiculos</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('venta.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Nota Venta</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('compra.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Nota Compra</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Acceso
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Roles</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index2.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Usuarios</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="./index2.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Bitacora</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
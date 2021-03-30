<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset(Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item">
          <a href="{{ route('cliente.pedido')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Pedido</p>
          </a>
        </li>
       
        <li class="nav-item">
            <a href="{{ route('cliente.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Carrito</p>
            </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
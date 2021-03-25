  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          
          <img src="{{ asset(Auth::user()->avatar) }}" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline">{{Auth::user()->name}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="{{ asset(Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">

            <p>
              {{ Auth::user()->name }}
              @role('admin')
                <small>Administrador</small>
              @endrole
              @role('repartidor')
                <small>Repartidor</small>
              @endrole
              @role('cliente')
                <small>Cliente</small>
              @endrole

            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <div class="row">
              {{-- <div class="col-4 text-center">
                <a href="#">Followers</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Sales</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Friends</a>
              </div> --}}
            </div>
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">Perfil</a>
            <a href="#" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();" class="btn btn-default btn-flat float-right">Cerrar</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                       
          </li>
        </ul>
      </li>
    </ul>
  </nav>


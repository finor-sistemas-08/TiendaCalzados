<div class="container">

    <div class="logo float-left">
      <h1 class="text-light"><a href="index.html"><span>Mamba</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav class="nav-menu float-right d-none d-lg-block">
      <ul>
        <li class="active"><a href="index.html">Home</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#portfolio">Portfolio</a></li>
        <li><a href="#team">Team</a></li>
        @auth
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            Cerrar Sesion
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>

          </li>
        @endauth
        @guest
          <li class="drop-down"><a href="">Ingresar</a>
            <ul>
                  
            @if (Route::has('login'))
                <li><a href="{{ route('showLogin') }}">Iniciar Sesion</a></li>
            @endif    
            @if (Route::has('register'))
                <li><a href="{{ route('showRegister') }}">Registrar</a></li>
            @endif
            </ul>
          </li>
        @endguest

      </ul>
    </nav><!-- .nav-menu -->

  </div>
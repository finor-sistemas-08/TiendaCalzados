<div class="container">

    <div class="logo float-left">
      <h1 class="text-light"><a href="index.html"><span>Calzados Cony</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav class="nav-menu float-right d-none d-lg-block">
      <ul>
        
        <li class="drop-down"><a href="#services">MARCAS</a>
          <ul>
              @foreach (@marcas() as $marca)
                <li><a href="#">{{$marca->nombre}}</a></li>
              @endforeach
          </ul>
        </li>
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
          <li class="drop-down"><a href="">INGRESAR</a>
            <ul>
                  
            @if (Route::has('login'))
                <li><a href="{{ route('showLogin') }}">INICIAR SESION</a></li>
            @endif    
            @if (Route::has('register'))
                <li><a href="{{ route('showRegister') }}">REGISTRAR</a></li>
            @endif
            </ul>
          </li>
        @endguest

      </ul>
    </nav><!-- .nav-menu -->
  </div>
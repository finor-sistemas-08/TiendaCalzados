<div class="container">
    <div class="logo float-left">
      <h1 class="text-light"><a href="index.html"><span>Calzados Cony</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav class="nav-menu float-right d-none d-lg-block">
      <ul>

        <li id="carrito" style="display: none;" class="drop-down"><a href="#services">Carrito<i class="fas fa-cart-arrow-down"></i></a>
         
        </li>
        <li class="drop-down"><a href="#">MARCAS</a>
          <ul>
              @foreach (@marcas() as $marca)
                <li><a href="#" >{{$marca->nombre}}</a></li>
              @endforeach
          </ul>
        </li>
        @auth
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            CERRAR SESION
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
        <li class="drop-down"><a href="#" data-toggle="modal" data-target="#modal-search"><i class="fas fa-search"></i></a>

            <!-- Modal -->
            <div class="modal fade" id="modal-search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
        </li>
      </ul>
    </nav><!-- .nav-menu -->
  </div>
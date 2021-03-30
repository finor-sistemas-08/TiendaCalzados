<div class="container">
    <div class="logo float-left">
      <h2 class="animate__animated animate__fadeInDown"><a href="#"><span>CALZADOS CONY</span></a></h2>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav class="nav-menu float-right d-none d-lg-block">
      <ul>

        <li id="carrito" style="display: none;" class="drop-down"><a href="#services">Carrito<i class="fas fa-cart-arrow-down"></i></i></a>
         
        </li>

        <li><a href="#about">NOSOTROS</a></li>

        <li class="drop-down"><a href="#portfolio">MARCAS</a>
          <ul>   
            @foreach (@marcas() as $marca)
              <li><a href="{{ route('web.marcas', ['idMarca'=>$marca->id]) }}">{{ $marca->nombre }}</a></li>
            @endforeach

          </ul>
        </li>
        <li class="drop-down"><a href="">CATEGORIA</a>
          <ul>   
            @foreach (@categorias() as $categorias)
              <li><a href="{{ route('web.categorias', ['idCategoria'=>$categorias->id]) }}">{{ $categorias->nombre }}</a></li>
            @endforeach

          </ul>
        </li>


        <li class="drop-down"><a href="">GENERO</a>
          <ul>   
            @foreach (@tipos() as $tipo)
              <li><a href="{{ route('web.tipos', ['idTipo'=>$tipo->id]) }}">{{ $tipo->tipo }}</a></li>
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
        </li>
      </ul>
    </nav><!-- .nav-menu -->
  </div>

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
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>

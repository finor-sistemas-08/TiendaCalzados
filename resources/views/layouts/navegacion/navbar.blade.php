<div class="container">

    <div class="logo float-left">
      <h1 class="text-light"><a href="index.html"><span>Calzados Cony</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav class="nav-menu float-right d-none d-lg-block">
      <ul>
        @foreach (@tipos() as $tipo)
        <li class="drop-down"><a href="">{{$tipo->tipo}}</a>
          <ul>
            @foreach (@calzadoTipo($tipo->id) as $calzado)

            
              <li class="drop-down"><a href="#">{{$calzado->calzado}}</a>

                <ul>
                    <li><a href="#"> {{ @calzadoCategoria( $calzado->idCalzado )->categoria }}</a></li>
                </ul>                    


              </li>
            @endforeach
            {{-- <li class="drop-down"><a href="#">BOTAS</a>
              <ul>
                <li><a href="#">Botas de Vestir</a></li>
              </ul>
            </li>
            <li class="drop-down"><a href="#">BOTINES</a>
              <ul>
                <li><a href="#">Botines Industriales</a></li>
              </ul>
            </li>
            <li class="drop-down"><a href="#">ZAPATOS</a>
              <ul>
                <li><a href="#">Mocasines</a></li> 
                <li><a href="#">Zapatos de Vestir</a></li>
              </ul>
            </li> --}}
          </ul>
        </li>
        @endforeach

        {{-- <li class="drop-down"><a href="">HOMBRE</a>
          <ul>
            <li class="drop-down"><a href="#">BOTAS</a>
              <ul>
                <li><a href="#">Botas de Vestir</a></li>
              </ul>
            </li>
            <li class="drop-down"><a href="#">BOTINES</a>
              <ul>
                <li><a href="#">Botines Industriales</a></li>
              </ul>
            </li>
            <li class="drop-down"><a href="#">ZAPATOS</a>
              <ul>
                <li><a href="#">Mocasines</a></li> 
                <li><a href="#">Zapatos de Vestir</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="drop-down"><a href="">MUJER</a>
          <ul>
            <li class="drop-down"><a href="#">BOTAS</a>
              <ul>
                <li><a href="#">Botas Camperas</a></li>
                <li><a href="#">Botas de Agua</a></li>
                <li><a href="#">Botas Planas</a></li>
                <li><a href="#">Botas con Tacon</a></li>
              </ul>
            </li>
            <li class="drop-down"><a href="#">BOTINES</a>
              <ul>
                <li><a href="#">Botines con Tacon</a></li>
                <li><a href="#">Botines con Plataforma</a></li>
                <li><a href="#">Botines Planos</a></li>
              </ul>
            </li>
            <li class="drop-down"><a href="#">ZAPATILLAS</a>
              <ul>
                <li><a href="#">Zapatillas Casuales</a></li>
                <li><a href="#">Zapatillas Urbanas</a></li>
                <li><a href="#">Zapatillas de Vestir</a></li>
                <li><a href="#">Zapatillas Deportivas</a></li>
              </ul>
            </li>
            <li class="drop-down"><a href="#">ZAPATOS</a>
              <ul>
                <li><a href="#">Mocasines</a></li>
                <li><a href="#">Zapatos con Tacon</a></li>
                <li><a href="#">Zapatos con Plataforma</a></li>
                <li><a href="#">Zapatos Comodos</a></li>
                <li><a href="#">Zapatos de Salon</a></li>
                <li><a href="#">Zapatos Planos</a></li>
              </ul>
            </li>
            <li class="drop-down"><a href="#">SANDALIAS</a>
              <ul>
                <li><a href="#">Sandalias con Plataforma</a></li>
                <li><a href="#">Sandalias Planas</a></li>
                <li><a href="#">Sandalias de Fiestas</a></li>
                <li><a href="#">Sandalias con Tacon</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="drop-down"><a href="">NIÑA</a>
          <ul>
            <li><a href="#">Botas</a></li>
            <li><a href="#">Botines</a></li>
            <li><a href="#">Zapatillas</a></li>
            <li><a href="#">Zapatos</a></li>
            <li><a href="#">Sandalias</a></li>
          </ul>
        </li>
        <li class="drop-down"><a href="">NIÑO</a>
          <ul>
            <li><a href="#">Botas</a></li>
            <li><a href="#">Botines</a></li>
            <li><a href="#">Zapatillas</a></li>
            <li><a href="#">Zapatos</a></li>
          </ul>
        </li> --}}


        <li class="drop-down"><a href="">MARCAS</a>
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
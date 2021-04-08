{{-- https://programacionymas.com/blog/integrar-pagos-paypal-en-laravel --}}
<div>
    <section id="hero">
        <div class="hero-container">
          <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
    
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
    
            <div class="carousel-inner" role="listbox">
    
              <!-- Slide 1 -->
              <div class="carousel-item active" style="background-image: url('assets/img/slide/slide-1.jpg');">
                <div class="carousel-container">
                  <div class="carousel-content container">
                    <h2 class="animate__animated animate__fadeInDown">Bienvenidos a <span>CONY</span></h2>
                    <p class="animate__animated animate__fadeInUp">
                        ENCUENTRA CALZADOS PARA {{ $tipo->tipo }}
                    </p>
                    <a href="#about" wire:click='' class="btn-get-started animate__animated animate__fadeInUp scrollto">Ver Calzados</a>
                  
                  </div>
                </div>
              </div>
    
              <!-- Slide 2 -->
              <div class="carousel-item" style="background-image: url('assets/img/slide/slide-2.jpg');">
                <div class="carousel-container">
                  <div class="carousel-content container">
                    <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
                    <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Ver Calzados</a>
                  </div>
                </div>
              </div>
    
              <!-- Slide 3 -->
              <div class="carousel-item" style="background-image: url('assets/img/slide/slide-3.jpg');">
                <div class="carousel-container">
                  <div class="carousel-content container">
                    <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
                    <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Ver Calzados</a>
                  </div>
                </div>
              </div>
    
            </div>
    
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
    
          </div>
        </div>
    </section><!-- End Hero -->   
    
    
    
    <section id="about" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Our Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.</p>
        </div>

        <div class="row">
          <div class="input-group">
            <select class="form-control" wire:model='criterio' name="" >
              <option value="calzados">Calzados</option>
              <option value="categorias">Categoria</option>
              <option value="marcas">Marca</option>
          </select>
              <input type="text" class="form-control" wire:model='searchText'>
              {{ $searchText }}
              <button class="btn btn-secondary"><i class="fas fa-search"></i></button>
          </div>
        </div>

        <div class="row">
          @if (count($calzados))
          @foreach ($calzados as $calzado)
            
            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
              <div class="member">
                <div class="pic"><img src="{{ asset($calzado->img) }}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>{{ $calzado->descripcion }}</h4>
                  <span>{{ $calzado->precio }} .BOB</span>
                  <div class="social">
                    <a href=""><i class="icofont-twitter"></i></a>
                    <a href=""><i class="icofont-facebook"></i></a>
                    <a href=""><i class="icofont-instagram"></i></a>
                    <a href="" data-toggle="modal" data-target="#exampleModal"><i class="icofont-linkedin"></i></a>
                    <!-- Button trigger modal -->



                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
              <div class="member">
                <div class="pic"><img src="{{ asset($calzado->img) }}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>{{ $calzado->descripcion }}</h4>
                  <span>{{ $calzado->precio }} .BOB</span>
                  <div class="social">
                    <a href=""><i class="icofont-twitter"></i></a>
                    <a href=""><i class="icofont-facebook"></i></a>
                    <a href=""><i class="icofont-instagram"></i></a>
                    <a href="" data-toggle="modal" data-target="#exampleModal"><i class="icofont-linkedin"></i></a>
                    <!-- Button trigger modal -->



                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
              <div class="member">
                <div class="pic"><img src="{{ asset($calzado->img) }}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>{{ $calzado->descripcion }}</h4>
                  <span>{{ $calzado->precio }} .BOB</span>
                  <div class="social">
                    <a href=""><i class="icofont-twitter"></i></a>
                    <a href=""><i class="icofont-facebook"></i></a>
                    <a href=""><i class="icofont-instagram"></i></a>
                    <a href="" data-toggle="modal" data-target="#exampleModal"><i class="icofont-linkedin"></i></a>
                    <!-- Button trigger modal -->



                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
              <div class="member">
                <div class="pic"><img src="{{ asset($calzado->img) }}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>{{ $calzado->descripcion }}</h4>
                  <span>{{ $calzado->precio }} .BOB</span>
                  <div class="social">
                    <a href=""><i class="icofont-twitter"></i></a>
                    <a href=""><i class="icofont-facebook"></i></a>
                    <a href=""><i class="icofont-instagram"></i></a>
                    <a href="" data-toggle="modal" data-target="#exampleModal"><i class="icofont-linkedin"></i></a>
                    <!-- Button trigger modal -->



                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
              <div class="member">
                <div class="pic"><img src="{{ asset($calzado->img) }}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>{{ $calzado->descripcion }}</h4>
                  <span>{{ $calzado->precio }} .BOB</span>
                  <div class="social">
                    <a href=""><i class="icofont-twitter"></i></a>
                    <a href=""><i class="icofont-facebook"></i></a>
                    <a href=""><i class="icofont-instagram"></i></a>
                    <a href="" data-toggle="modal" data-target="#exampleModal"><i class="icofont-linkedin"></i></a>
                    <!-- Button trigger modal -->



                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
              <div class="member">
                <div class="pic"><img src="{{ asset($calzado->img) }}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>{{ $calzado->descripcion }}</h4>
                  <span>{{ $calzado->precio }} .BOB</span>
                  <div class="social">
                    <a href=""><i class="icofont-twitter"></i></a>
                    <a href=""><i class="icofont-facebook"></i></a>
                    <a href=""><i class="icofont-instagram"></i></a>
                    <a href="" data-toggle="modal" data-target="#exampleModal"><i class="icofont-linkedin"></i></a>
                    <!-- Button trigger modal -->



                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
              <div class="member">
                <div class="pic"><img src="{{ asset($calzado->img) }}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>{{ $calzado->descripcion }}</h4>
                  <span>{{ $calzado->precio }} .BOB</span>
                  <div class="social">
                    <a href=""><i class="icofont-twitter"></i></a>
                    <a href=""><i class="icofont-facebook"></i></a>
                    <a href=""><i class="icofont-instagram"></i></a>
                    <a href="" data-toggle="modal" data-target="#exampleModal"><i class="icofont-linkedin"></i></a>
                    <!-- Button trigger modal -->



                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
              <div class="member">
                <div class="pic"><img src="{{ asset($calzado->img) }}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>{{ $calzado->descripcion }}</h4>
                  <span>{{ $calzado->precio }} .BOB</span>
                  <div class="social">
                    <a href=""><i class="icofont-twitter"></i></a>
                    <a href=""><i class="icofont-facebook"></i></a>
                    <a href=""><i class="icofont-instagram"></i></a>
                    <a wire:click='' data-toggle="modal" data-target="#exampleModal"><i class="icofont-linkedin"></i></a>
                    
                    <!-- Button trigger modal -->
                  </div>

                </div>
              </div>
            </div>
          @endforeach  
         
          @else
          <div class="center">
            <div class="col-xl-3 col-lg-4 col-md-6">
              <div class="">
                No se encontraron resultados
              </div>
            </div>  
          </div> 
          @endif

          
        </div>

      </div>
    </section>
    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body register-card-body">
                  <p class="login-box-msg">CREAR CUENTA</p>
            
                  <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group mb-3">
                      <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('name') }}" required placeholder="Nombre" autocomplete="name" autofocus>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
            
            
                    <div class="input-group mb-3">
                      <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" placeholder="Apellidos" name="apellidos" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
            
                    <div class="input-group mb-3">
                      <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" placeholder="telefono" name="telefono" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
            
                    <div class="input-group mb-3">
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="User name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="input-group mb-3">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="input-group mb-3">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" required autocomplete="new-password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
            
                    </div>
            
            
                    <div class="input-group mb-3">
                      <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar contraseña" name="password_confirmation" required autocomplete="new-password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
            
                    </div>

                    <div class="row">
                      </div>
                      <!-- /.col -->
                      <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                      </div>
                      <!-- /.col -->
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    <br>
</div>

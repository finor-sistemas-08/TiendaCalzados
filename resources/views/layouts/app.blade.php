<!DOCTYPE html>
<html lang="en">

@include('layouts.components.head')

<body>

  @include('layouts.components.toolbar')  
  <!-- ======= Header ======= -->
  <header id="header">
    @include('layouts.navegacion.navbar')
  </header><!-- End Header -->


  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url('imagenes/1.png');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Calza perfecto con tu dia<span></span></h2>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url('imagenes/2.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">No puedes comprar la felicidad, pero puedes comprar zapatos y eso esta muy cerca</h2>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url('imagenes/3.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Usadas por los pies mas preciosos del mundo</h2>
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
  </section>

  <main id="main">

    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="col-lg-6 video-box">
            <img src="imagenes/22.jpg" class="img-fluid" alt="">
            {{-- <a href="imagenes/" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a> --}}
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title">
              <h2>Nosotros</h2>
              <p>En nuestra tienda de zapatos online podrás descubrir una gran variedad de calzados para que encuentres lo que buscas, sea cual sea tu estilo. Disponemos de un gran catálogo que podrás revisar cómodamente para encontrar ese par de zapatos ideales que necesitas.</p><br> 
              <p>Ofrecemos calzado para mujer, calzado para hombre y también infantil, tanto calzado para niño como calzado para niña. Queremos convertirnos en tu zapatería online de confianza y por eso ofrecemos calzado para toda la familia, adaptándonos a tus gustos, necesidades y presupuesto para que puedas comprar zapatos online con total comodidad.</p>
            </div>

            
          </div>
        </div>

      </div>
    </section>
    <!-- ======= Our Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
          <h2>CALZADOS</h2>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              @foreach (@marcas() as $mar)
                  <li data-filter=".filter-web" class="filter-active"><button type="button"  class="bvacio btn-sm" onclick="marcaDato({{$mar->id}})">{{$mar->nombre}}</button></li>
              @endforeach
            </ul>
          </div>
        </div>

        <div id="calzados" class="row portfolio-container">
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
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
        </div>
      </div>
    </section><!-- End Our Portfolio Section -->


  {{-- @include('layouts.components.footer') --}}
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  {{-- <script src="sweetalert2.min.js"></script> --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="{{ asset('plantilla/plugins/fontawesome-free/css/all.min.css')}}">
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoW4LyeLOiPgOmChMyAacirIgO7zqriGw&callback=initMap&libraries=geometry">
  </script>
  @include('layouts.components.scripts')
  @include('layouts.components.mapa') 
  @include('layouts.components.estilo')
  @include('layouts.components.calzados')
  @yield('mapa')
</body>
</html>
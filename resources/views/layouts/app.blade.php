<!DOCTYPE html>
<html lang="en">

@include('layouts.components.head')

<body>

  <!-- ======= Top Bar ======= -->
  @auth
      
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@example.com</a>
        <i class="icofont-phone"></i> +1 5589 55488 55
      </div>
      <div class="social-links float-right">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </section>
  @endauth

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
          <div class="carousel-item active" style="background-image: url('imagenes/1.jpg');">
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


    <!-- ======= Our Portfolio Section ======= -->
    <section id="services" class="portfolio section-bg">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
          <h2>Our Portfolio</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
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

        </div>

      </div>
    </section><!-- End Our Portfolio Section -->


  {{-- @include('layouts.components.footer') --}}
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  @include('layouts.components.scripts')
  @include('layouts.components.mapa') 
  @include('layouts.components.estilo')
  @include('layouts.components.calzados')
</body>


</html>
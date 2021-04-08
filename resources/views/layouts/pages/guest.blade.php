  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url('imagenes/1.png');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Calza perfecto con tu dia<span></span></h2>
              </div>
            </div>
          </div>


          <div class="carousel-item" style="background-image: url('imagenes/2.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">No puedes comprar la felicidad, pero puedes comprar zapatos y eso esta muy cerca</h2>
              </div>
            </div>
          </div>

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

  <section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="section-title">
        <h2>Calzados</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <ul id="portfolio-flters">
            

            <li data-filter="*" class="filter-active">Calzados</li>
            <li data-filter=".filter-marca">Marcas</li>
            <li data-filter=".filter-categoria">Categorias</li>
            <li data-filter=".filter-tipo">Tipos</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">

        @foreach (@marcas() as $marca)
          <div class="col-lg-4 col-md-6 portfolio-item filter-marca">
            <div class="portfolio-wrap">
              <img src="{{ asset('template/assets/img/portfolio/portfolio-2.jpg') }}"  class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>{{ $marca->nombre }}</h4>
                <p>{{ $marca->nombre }}</p>
                <div class="portfolio-links">
                  <a href="{{ asset('template/assets/img/portfolio/portfolio-1.jpg') }}"  data-gall="portfolioGallery" class="venobox" title="{{ $marca->nombre }}"><i class="icofont-eye"></i></a>
                  <a href="{{ route('web.marcas', ['id'=>$marca->id]) }}" title="mas detalle"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach

        @foreach (@categorias() as $categoria)
          <div class="col-lg-4 col-md-6 portfolio-item filter-categoria">
            <div class="portfolio-wrap">
              <img src="{{ asset('template/assets/img/portfolio/portfolio-1.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>{{ $categoria->nombre }}</h4>
                <p>{{ $categoria->nombre }}</p>
                <div class="portfolio-links">
                  <a href="{{ asset('template/assets/img/portfolio/portfolio-1.jpg') }}" data-gall="portfolioGallery" class="venobox" title="{{ $categoria->nombre }}"><i class="icofont-eye"></i></a>
                  <a href="{{ route('web.categorias', ['id'=>$categoria->id]) }}" title="mas detalle"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach

        @foreach (@tipos() as $tipo)
          <div class="col-lg-4 col-md-6 portfolio-item filter-tipo">
            <div class="portfolio-wrap">
              <img src="{{ asset('template/assets/img/portfolio/portfolio-1.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>{{ $tipo->tipo }}</h4>
                <p>{{ $tipo->tipo }}</p>
                <div class="portfolio-links">
                  <a href="{{ asset('template/assets/img/portfolio/portfolio-1.jpg') }}" data-gall="portfolioGallery" class="venobox" title="{{ $tipo->tipo }}"><i class="icofont-eye"></i></a>
                  <a href="{{ route('web.tipos', ['id'=>$tipo->id]) }}" title="mas detalle"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach 

      </div>
    </div>
  </section><!-- End Our Portfolio Section -->


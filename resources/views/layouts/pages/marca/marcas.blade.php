@extends('layouts.app')
@section('contenido')
<section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="section-title">
        <h2>CALZADOS</h2>
        {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
      </div>

      <div class="row portfolio-container">
        @foreach ($calzados as $calzado)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <img src="{{ asset($calzado->imagen) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>Marca y modelo</h4>
                    <p>precio venta</p>
                    <div class="portfolio-links">
                        <a href="{{ asset($calzado->imagen) }}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-eye"></i></a>
                        <a href="{{ route('web.detalle', ['id'=>$calzado->idCalzado]) }}" title="More Details"><i class="fas fa-cart-plus"></i></a>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
      </div>
    </div>
  </section><!-- End Our Portfolio Section -->

@endsection
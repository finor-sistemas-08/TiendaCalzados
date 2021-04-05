<!DOCTYPE html>
<html lang="en">

@include('layouts.components.head')

<body>

  @include('layouts.components.topbar')  
  <!-- ======= Header ======= -->
  <header id="header">
    @include('layouts.navegacion.navbar')
  </header><!-- End Header -->

    @yield('contenido')
 


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
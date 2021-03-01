<!DOCTYPE html>
<html lang="en">
  {{-- head --}}
  @include('components.head')
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      @include('navegacion.nav')
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->

        <a href="index3.html" class="brand-link">
          <img src="{{ asset('plantilla/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">frmPrincipal</span>
        </a>

        <!-- Sidebar -->
      @include('navegacion.sidebar')
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @yield('contenido')
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      {{-- pie de pagina --}}
      @include('components.footer')

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->       
    <!-- scripts -->
    @include('components.script')
  </body>
</html>

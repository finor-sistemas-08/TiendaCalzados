@extends('index')
@section('contenido')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Calzados<h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Calzado</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="card">
          <div class="card-header">
              @include('pages.calzado.insertar')
              <h3 class="card-title"></h3>
              <div class="card-tools">
                {{-- {{$marcasModelos}} --}}
                @include('pages.calzado.buscar')
              </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">          
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Descripcion</th>
                  <th>Precio V</th>
                  <th>Precio C</th>
                  <th>Tipo</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Talla</th>
                  <th>Color</th>
                  <th>Imagen</th>
                  <th>Categoria</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($calzados as $calzado)                    
                  <tr>
                      <td>{{ $calzado->id }}</td>
                      <td>{{ $calzado->nombre }}</td>
                      <td>{{ $calzado->precioVenta }}</td>
                      <td>{{ $calzado->precioCompra }}</td>
                      <td>{{ $calzado->tipo }}</td>
                      <td>{{ @nombreMarca($calzado->idMarcaModelo) }}</td>
                      <td>{{ @nombreModelo($calzado->idMarcaModelo) }}</td>
                      <td>{{ $calzado->talla }}</td>
                      <td>{{ $calzado->color }}</td>
                      <td><img src="{{ asset($calzado->imagen) }}" alt="Girl in a jacket" width="80" height="80"></td>
                      <td>{{ $calzado->categoria }} </td>
                      <td>
                        @include('pages.calzado.actualizar')
                        @include('pages.calzado.eliminar')
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </section>
@endsection
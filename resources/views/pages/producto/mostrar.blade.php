@extends('index')
@section('contenido')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Productos<h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Producto</li>
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
              @include('pages.producto.insertar')
              <h3 class="card-title"></h3>
              <div class="card-tools">
                {{-- {{$marcasModelos}} --}}
                @include('pages.producto.buscar')
              </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">          
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Calzado</th>
                  <th>Categoria</th>
                  <th>Precio Venta</th>
                  <th>Precio Compra</th>
                  <th>Tipo</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Talla</th>
                  <th>Color</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($productos as $producto)                    
                  <tr>
                      <td>{{ $producto->id }}</td>
                      <td>{{ $producto->nombre }}</td>
                      <td>{{ $producto->categoria }} </td>
                      <td>{{ $producto->precioVenta }}</td>
                      <td>{{ $producto->precioCompra }}</td>
                      <td>{{ $producto->tipo }}</td>
                      <td>{{ @nombreMarca($producto->idMarcaModelo) }}</td>
                      <td>{{ @nombreModelo($producto->idMarcaModelo) }}</td>
                      <td>{{ $producto->talla }}</td>
                      <td>{{ $producto->color }}</td>
                      <td>
                        @include('pages.producto.actualizar')
                        @include('pages.producto.eliminar')
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
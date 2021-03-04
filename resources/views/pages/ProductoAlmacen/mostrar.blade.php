@extends('index')
@section('contenido')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Inventario</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Inventario</li>
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
            <a href="{{ route('productoAlmacen.create') }}" class="btn btn-primary">Agregar</a>
            <h3 class="card-title"></h3>
            <div class="card-tools">
              {{-- @include('pages.productoAlmacen.buscar') --}}
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">          
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Producto</th>
                  <th>Categoria</th>
                  <th>Marca Modelo</th>
                  <th>Tipo</th>
                  <th>Almacen</th>
                  <th>stock</th>
                  <th>Opciones</th>

                </tr>
              </thead>
              <tbody>
                @foreach ($productoAlmacenes as $productoAlmacen)                    
                  <tr>
                      <td>{{ $productoAlmacen->id }}</td>
                      <td>{{ $productoAlmacen->producto }}</td>
                      <td>{{ $productoAlmacen->categoria }}</td>
                      <td>{{ $productoAlmacen->marca}} - {{$productoAlmacen->modelo}}</td>
                      <td>{{ $productoAlmacen->tipo }}</td>
                      <td>{{ $productoAlmacen->almacen }}</td>
                      <td>{{ $productoAlmacen->stock }}</td>
                      <td>
                        {{-- @include('pages.productoAlmacen.actualizar') --}}
                        {{-- @include('pages.productoAlmacen.eliminar') --}}
                        <a href="" class="btn btn-sm btn-warning"><i class="fas fa-file"></i></a>
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
      </div>
      {{-- {{ $productoAlmacenes->links()}} --}}
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection
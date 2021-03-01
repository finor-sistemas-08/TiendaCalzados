@extends('index')
@section('contenido')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Registrar Categorias</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Categoria</li>
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
            @include('pages.categoria.insertar')
            <h3 class="card-title"></h3>
            <div class="card-tools">
              @include('pages.categoria.buscar')
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">          
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Subcategoria</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categorias as $categoria)                    
                  <tr>
                      <td>{{ $categoria->id }}</td>
                      <td>{{ $categoria->nombre }}</td>
                      <td>{{ $categoria->subCategoria }}</td>
                      <td>
                        @include('pages.categoria.actualizar')
                        @include('pages.categoria.eliminar')
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
      </div>
      {{ $categorias->links()}}
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection
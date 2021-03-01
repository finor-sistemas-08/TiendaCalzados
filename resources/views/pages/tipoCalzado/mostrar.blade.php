@extends('index')
@section('contenido')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Registrar Tipo de Calzados</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tipo de Calzados</li>
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
            @include('pages.tipoCalzado.insertar')
            <h3 class="card-title"></h3>
            <div class="card-tools">
              @include('pages.tipoCalzado.buscar')
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">          
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tipo</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tipoCalzados as $tipoCalzado)                    
                  <tr>
                      <td>{{ $tipoCalzado->id }}</td>
                      <td>{{ $tipoCalzado->tipo }}</td>
                      <td>
                        @include('pages.tipoCalzado.actualizar')
                        @include('pages.tipoCalzado.eliminar')
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
      </div>
      {{ $tipoCalzados->links()}}
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection
@extends('index')
@section('contenido')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Registrar Vehiculos</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Vehiculo</li>
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
            @include('pages.vehiculo.insertar')
            <h3 class="card-title"></h3>
            <div class="card-tools">
              @include('pages.vehiculo.buscar')
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">          
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tipo</th>
                  <th>Placa</th>
                  <th>Repartidor</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($vehiculos as $vehiculo)                    
                  <tr>
                      <td>{{ $vehiculo->id }}</td>
                      <td>{{ $vehiculo->tipo }}</td>
                      <td>{{ $vehiculo->placa }}</td>
                      <td>{{ $vehiculo->nombre }} {{ $vehiculo->apellidos }}</td>
                      <td>
                        @include('pages.vehiculo.actualizar')
                        @include('pages.vehiculo.eliminar')
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
      </div>
      {{ $vehiculos->links()}}
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection
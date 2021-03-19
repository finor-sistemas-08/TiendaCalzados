@extends('index')
@section('contenido')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Registrar repartidores</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">repartidor</li>
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
            @include('pages.repartidor.insertar')
            <h3 class="card-title"></h3>
            <div class="card-tools">
              @include('pages.repartidor.buscar')
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">          
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Correo</th>
                  <th>Telefono</th>
                  <th>Numero de Licencia</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($repartidores as $repartidor)                    
                  <tr >
                      <td>{{ $repartidor->id }}</td>
                      <td>{{ $repartidor->nombre }}</td>
                      <td>{{ $repartidor->apellidos }}</td>
                      <td>{{ $repartidor->correo }}</td>
                      <td>{{ $repartidor->telefono }}</td>
                      <td>{{ $repartidor->numeroLicencia }}</td>
                      <td>
                        @include('pages.repartidor.actualizar')
                        @include('pages.repartidor.eliminar')
                        @include('pages.repartidor.actualizar')
                        
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
      </div>
      {{ $repartidores->links()}}
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection
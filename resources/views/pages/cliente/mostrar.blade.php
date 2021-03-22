@extends('index')
@section('contenido')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Registrar Clientes</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Cliente</li>
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
            @include('pages.cliente.insertar')
            <h3 class="card-title"></h3>
            <div class="card-tools">
              @include('pages.cliente.buscar')
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">          
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Telefono</th>
                  <th>Correo</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($clientes as $cliente)                    
                  <tr>
                      <td>{{ $cliente->id }}</td>
                      <td>{{ $cliente->nombre }}</td>
                      <td>{{ $cliente->apellidos }}</td>
                      <td>{{ $cliente->telefono }}</td>
                      <td>{{ $cliente->correo }}</td>
                      <td>
                         @include('pages.cliente.actualizar')
                        @include('pages.cliente.eliminar')
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
      </div>
      {{ $clientes->links()}}
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection
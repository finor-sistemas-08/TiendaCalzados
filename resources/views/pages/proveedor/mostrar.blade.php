@extends('index')
@section('contenido')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Registrar Proveedores</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Proveedor</li>
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
            @include('pages.proveedor.insertar')
            <h3 class="card-title"></h3>
            <div class="card-tools">
              @include('pages.proveedor.buscar')
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
                  <th>Direccion</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($proveedores as $proveedor)                    
                  <tr>
                      <td>{{ $proveedor->id }}</td>
                      <td>{{ $proveedor->nombre }}</td>
                      <td>{{ $proveedor->correo }}</td>
                      <td>{{ $proveedor->apellidos }}</td>
                      <td>{{ $proveedor->telefono }}</td>
                      <td>{{ $proveedor->direccion }}</td>
                      <td>
                        @include('pages.proveedor.actualizar')
                        @include('pages.proveedor.eliminar')
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
      </div>
      {{ $proveedores->links()}}
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection
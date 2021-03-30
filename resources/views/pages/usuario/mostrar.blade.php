@extends('index')
@section('contenido')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Registrar Usuarios</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Usuario</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="card">
          <div class="card-header">
            @include('pages.usuario.insertar')
            <h3 class="card-title"></h3>
            <div class="card-tools">
              @include('pages.usuario.buscar')
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">          
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Contraseña</th>
                  <th>Rol</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($usuarios as $usuario)                    
                  <tr>
                      <td>{{ $usuario->id }}</td>
                      <td>{{ $usuario->name }}</td>
                      <td>{{ $usuario->email }}</td>
                      <td>{{ $usuario->password }}</td>
                      <td>{{ $usuario->rol}}</td>


                      <td>
                        @include('pages.usuario.actualizar')
                        @include('pages.usuario.eliminar')
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
      {{ $usuarios->links()}}
  </section>
@endsection
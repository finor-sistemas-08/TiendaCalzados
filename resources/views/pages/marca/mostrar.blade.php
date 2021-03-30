@extends('index')
@section('contenido')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Registrar Marca</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Modelo</li>
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
            @include('pages.marca.insertar')
            <h3 class="card-title"></h3>
            <div class="card-tools">
              @include('pages.marca.buscar')
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">          
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Loggo</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($marcas as $marca)                    
                  <tr>
                      <td>{{ $marca->id }}</td>
                      <td>{{ $marca->nombre }}</td>
                      <td><img src="{{ asset($marca->logo) }}" width="100" height="100" alt=""></td>
                      <td>
                        @include('pages.marca.actualizar')
                        @include('pages.marca.eliminar')
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
      </div>
      {{ $marcas->links()}}
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection
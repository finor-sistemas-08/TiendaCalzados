@extends('index')
@section('contenido')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Registrar Marca Modelo</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Marca Modelo</li>
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
            @include('pages.marcaModelo.insertar')
            <h3 class="card-title"></h3>
            <div class="card-tools">
              @include('pages.marcaModelo.buscar')
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">          
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Talla</th>
                  <th>Color</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($marcaModelos as $marcaModelo)                    
                  <tr>
                      <td>{{ $marcaModelo->id }}</td>
                      <td>{{ $marcaModelo->talla }}</td>
                      <td>{{ $marcaModelo->color }}</td>
                      <td>{{ $marcaModelo->marca }}</td>
                      <td>{{ $marcaModelo->modelo }}</td>

                      <td>
                        @include('pages.marcaModelo.actualizar')
                        @include('pages.marcaModelo.eliminar')
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
      </div>
      {{ $marcaModelos->links()}}
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection
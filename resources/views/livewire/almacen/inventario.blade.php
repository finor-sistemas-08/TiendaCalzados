<div>
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
                <a href="{{ route('calzadoAlmacen.create') }}" class="btn btn-primary">Agregar</a>
                <h3 class="card-title"></h3>
                <div class="card-tools">
                  <form>
                    <div class="input-group-prepend">
                         <input  type="text" class="form-control" name="searchText" placeholder="Buscar..." wire:model='searchText'>
                         <button disabled  class="btn btn-info btn-sm" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">          
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Calzado</th>
                      <th>Categoria</th>
                      <th>Marca Modelo</th>
                      <th>Tipo</th>
                      <th>Almacen</th>
                      <th>stock</th>
                      <th>Opciones</th>
    
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($calzadoAlmacenes as $calzadoAlmacen)                    
                      <tr>
                          <td>{{ $calzadoAlmacen->id }}</td>
                          <td>{{ $calzadoAlmacen->calzado }}</td>
                          <td>{{ $calzadoAlmacen->categoria }}</td>
                          <td>{{ $calzadoAlmacen->marca}} - {{$calzadoAlmacen->modelo}}</td>
                          <td>{{ $calzadoAlmacen->tipo }}</td>
                          <td>{{ $calzadoAlmacen->almacen }}</td>
                          <td>{{ $calzadoAlmacen->stock }}</td>
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
          {{-- {{ $calzadoAlmacenes->links()}} --}}
          <!-- /.row -->
        </div><!--/. container-fluid -->
      </section>
</div>

<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3 class="m-0">Ventas</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Ventas</li>
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
                <a href="{{ route('venta.create') }}" class="btn btn-primary">Agregar</a>
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
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Fecha</th>
                      <th>Monto Total</th>
                      <th>Cliente</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ventas as $venta)                    
                      <tr>
                          <td>{{ $venta->id }}</td>
                          <td>{{ $venta->fecha }}</td>
                          <td>{{ $venta->montoTotal }}</td>
                          <td>{{ $venta->nombre}} - {{$venta->apellidos}}</td>
                          <td>
                            <a href="" class="btn btn-sm btn-warning"><i class="fas fa-file"></i></a>
                          </td>
{{-- 75020895 --}}
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

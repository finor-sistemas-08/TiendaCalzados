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
              <div class="card-body">          
                <table id="example2" class="table table-bordered table-hover">
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
                            <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-file"></i></a>

                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#detalle-venta-modal{{ $venta->id }}">
                              {{-- <i class="fas fa-eye"></i> --}}
                              <i class="fas fa-eye"></i>
                          </button>

                              <!-- Modal calzados -->
                          <div wire:ignore.self class="modal fade" class="modal fade" id="detalle-venta-modal{{ $venta->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Detalle Venta</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <section class="content">
                                              <div class="container-fluid">

                                                     

                                                      <div class="card">
                                                          <div class="card-header">
                                                              <h3 class="card-title"></h3>
                                                              <div class="card">
                                                                 <h6>Cliente:   {{@buscarCliente(notaVenta($venta->id)->idCliente)->nombre   }} {{@buscarCliente(notaVenta($venta->id)->idCliente)->apellidos   }}</h6> 
                                                                 <h6>Fecha:    {{@notaVenta($venta->id)->fecha}} </h6> 

                                                              </div>
                                                          </div>

                                                          <div class="card-body p-0">  
                                                              <table class="table table-striped">
                                                                  <thead>
                                                                      <tr>
                                                                          <th>ID</th>
                                                                          <th>Nombre</th>
                                                                          <th>Precio</th>
                                                                          <th>Cantidad</th>
                                                                          <th>SubTotal</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      @foreach (@detalleVenta($venta->id) as $calzado)                    
                                                                          <tr>
                                                                              <td>{{ @calzado(@calzadoAlmacen($calzado->idCalzadoAlmacen)->idCalzado)->id }}</td>
                                                                              <td>{{ @calzado(@calzadoAlmacen($calzado->idCalzadoAlmacen)->idCalzado)->descripcion }}</td>
                                                                              <td>{{ @calzado(@calzadoAlmacen($calzado->idCalzadoAlmacen)->idCalzado)->precioVenta }}</td>
                                                                              <td>{{ $calzado->cantidad }}</td>
                                                                              <td>{{ $calzado->subTotal }}</td>
                                                                          </tr>
                                                                      @endforeach
                                                                  </tbody>
                                                                  <tfoot>
                                                                    <tr>
                                                                      <td> TOTAL:</td>
                                                                      <td> </td>
                                                                      <td> </td>
                                                                      <td> </td>
                                                                      <td> {{@notaVenta($venta->id)->montoTotal}}</td>
                                                                      
                                                                  </tr>
                                                                  </tfoot>
                                                              </table>
                                                              <div style="color: red" role="alert">
                                                              </div>
                                                          </div>
                                                      </div>
                                              </div>
                                          </section>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cerrar</button>
                                      </div>
                                  </div>
                              </div>
                          </div>

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

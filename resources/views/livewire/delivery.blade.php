<div>
    <div>
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h3 class="m-0">Pedido</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Pedido</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
        
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <!-- Info boxes -->
              <div class="card">
                  <div class="card-header">
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
                          <th>Fecha de Entrega</th>
                          <th>Hora</th>
                          <th>Hora de entrega</th>
                          <th>Tiempo de Entrega</th>
                          <th>Estado</th>


                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($pedidos as $pedido)                    
                          <tr>
                              <td>{{ $pedido->id }}</td>
                              <td>{{ $pedido->fecha }}</td>
                              <td>{{ $pedido->fechaentrega }}</td>
                              <td>{{ $pedido->hora}}</td>
                              <td>{{ $pedido->horaentrega}}</td>
                              <td>{{ $pedido->tiempoentrega}}</td>
                              <td>{{ $pedido->estado}}</td>

                              <td>
                                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-file"></i></a>
    
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#detalle-pedido-modal{{ $pedido->id }}">
                                  {{-- <i class="fas fa-eye"></i> --}}
                                  <i class="fas fa-eye"></i>
                              </button>
    
                                  <!-- Modal calzados -->
                              <div wire:ignore.self class="modal fade" class="modal fade" id="detalle-pedido-modal{{ $pedido->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Detalle pedido</h5>
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
                                                                     <h6>Cliente:   {{@buscarCliente(notapedido($pedido->id)->idCliente)->nombre   }} {{@buscarCliente(notaVenta($venta->id)->idCliente)->apellidos   }}</h6> 
                                                                     <h6>Fecha:    {{@notaPedido($pedido->id)->fecha}} </h6> 
    
                                                                  </div>
                                                              </div>
    
                                                              <div class="card-body p-0">  
                                                                  {{-- <table class="table table-striped">
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
                                                                  </table> --}}
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
    
</div>

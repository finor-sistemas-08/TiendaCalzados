<div>

    <div>
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">

                <div class="col-sm-6">
                  @if ($opcion)
                    <h3 class="m-0">
                      Atender Pedido
                    </h3>
                  @else
                    <h3 class="m-0">
                      Pedido
                    </h3>
                  @endif

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
        
          @if ($opcion)
            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <!-- Info boxes -->
                <div class="card">
                  <div class="card-header">
                    <button wire:click='verListaPedido' class="btn btn-info btn-sm" type="button">Volver</button>

                    <div class="card-tools">
                      <form>
                        <div class="input-group-prepend">
                            {{-- <input  type="text" class="form-control" name="searchText" placeholder="Buscar..." wire:model='searchText'> --}}
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body ">
                    <div class="row">
                      {{-- No tocar --}}
                      <div class="col-12">
                        <table class="table table-bordered table-hover" id="example2">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Calzado</th>
                              <th>Talla</th>
                              <th>Precio</th>
                              <th>Cantidad</th>
                              <th>SubTotal</th>
                              {{-- <th>Estado</th> --}}
                              <th>Opciones</th>

    
                            
    
                            </tr>
                          </thead>
                          <tbody>
                            @foreach (@detalleCarrito($idPedido) as $carrito)                    
                              <tr>
                                  <td>{{ $carrito->id }}</td>
                                  <td>{{ @calzado($carrito->idCalzado)->descripcion }}</td>
                                  <td>{{ $carrito->talla }}</td>
                                  <td>{{ @calzado($carrito->idCalzado)->precioVenta }}</td>
                                  <td>{{ $carrito->cantidad }}</td>
                                  <td>{{ @calzado($carrito->idCalzado)->precioVenta * $carrito->cantidad}}</td>
                                  {{-- <td>{{ $carrito->estado}}</td> --}}
                                  <td>
                                    {{-- <a href="{{ route('pdf.pedidos', ['id'=> $pedido->id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-file"></i></a> --}}
                                    <button type="button" class="btn btn-success btn-sm">
                                      <i class="fas fa-search" wire:click="buscarCalzado({{$carrito->idCalzado}},{{ $carrito->cantidad }})"></i>
                                    </button>
                                    
    
    
                                
                                  </td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      {{-- Noo --}}


                      <div class="col-12">
                        <table class="table table-bordered table-hover" id="example2">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Almacen</th>
                              <th>Calzado</th>
                              <th>Stock</th>
                              <th>Opcion</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if (($arrayCalzado))
                                

                            @foreach ($arrayCalzado as $carrito)                    
                              <tr>
                                  <td>{{ $carrito->idCalzadoAlmacen }}</td>
                                  <td>{{ @almacen($carrito->idAlmacen)->sigla }}</td>
                                  <td>{{ @calzado($carrito->idCalzado)->descripcion }}</td>
                                  <td>{{ $carrito->stock }}</td>
                                  <td>
                                    <button type="button" class="btn btn-success btn-sm">
                                      <i class="fas fa-check" wire:click='venderCalzado({{$carrito->idCalzadoAlmacen}})'></i>
                                    </button>
    
                                
                                  </td>
                                </tr>
                            @endforeach
                            @else
                                
                            @endif
                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>

                </div>  
              </div>
            </section>  

          @else    
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
                    <div class="card-body ">          
                      <table class="table table-bordered table-hover" id="example2">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Fecha de Entrega</th>
                            <th>Hora</th>
                            <th>Hora de entrega</th>
                            <th>Tiempo de Entrega</th>
                            <th>Estado</th>
                            <th>Opcion</th>

                          

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
                                  <a href="{{ route('pdf.pedidos', ['id'=> $pedido->id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-file"></i></a>
                                  <a target="_blank" href="{{@ubicacion($pedido->id)->url}}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-location-arrow"></i>
                                  </a>
                                  <button wire:click='atenderPedido({{$pedido->id}})' type="button" class="btn btn-success btn-sm">
                                  <i class="fas fa-shopping-cart"></i>
                                  </button>

                                  
                                  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#detalle-pedido-modal{{ $pedido->id }}">
                                    <i class="fas fa-eye"></i>
                                  </button>
                                  
                                  @if (is_null($pedido->idRepartidor))
                                    <button type="button" class="btn bg-orange btn-sm" data-toggle="modal" data-target="#modal-seleccionar-repartidor{{ $pedido->id }}">
                                      {{-- <i class="fas fa-eye"></i> --}}
                                      <i class="fas fa-plus"></i>
                                    </button>
                                  @else
                                    {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-detalle-repartidor{{ $pedido->idRepartidor }}">
                                      <i class="fas fa-user"></i>
                                    </button> --}}
                                  @endif

                                    <!-- Modal detalle pedidos calzados -->
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
                                                                      <h6>Cliente:   {{ @cliente(@pedido($pedido->id)->idCliente)->nombre }} {{ @cliente(@pedido($pedido->id)->idCliente)->apellidos }}</h6> 
                                                                      <h6>Fecha:    {{@pedido($pedido->id)->fecha}} </h6> 
      
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
                                                                            @foreach (@detalleCarrito($pedido->id) as $calzado)                    
                                                                                <tr>
                                                                                  <td>{{ $pedido->id }}</td> 
                                                                                  <td>{{ @calzado($calzado->id)->descripcion }}</td> 

                                                                                  <td>{{ @calzado($calzado->id)->precioVenta }}</td> 
                                                                                    <td>{{ $calzado->cantidad }}</td>
                                                                                    <td>{{ $calzado->cantidad * @calzado($calzado->id)->precioVenta }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                        <tfoot>
                                                                          <tr>
                                                                            <td> TOTAL : </td>
                                                                            <td> </td>
                                                                            <td> </td>
                                                                            <td></td>
                                                                            <td>{{@pedido($pedido->id)->montototal}} </td>
                                                                            {{-- <td> {{@notaVenta($venta->id)->montoTotal}}</td> --}}
                                                                            
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
      
                              <!-- Modal seleccionar repartidor -->
                                <div wire:ignore.self class="modal fade" class="modal fade" id="modal-seleccionar-repartidor{{ $pedido->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                    {{-- {{$pedido->id}} --}}
                                                                    {{-- <h6>Cliente:   {{@buscarCliente(notapedido($pedido->id)->idCliente)->nombre   }} {{@buscarCliente(notaVenta($venta->id)->idCliente)->apellidos   }}</h6> 
                                                                    <h6>Fecha:    {{@notaPedido($pedido->id)->fecha}} </h6>  --}}
    
                                                                  </div>
                                                              </div>
    
                                                              <div class="card-body p-0">  
                                                                  <table class="table table-striped">
                                                                      <thead>
                                                                          <tr>
                                                                              <th>ID</th>
                                                                              <th>Nombre</th>
                                                                              <th>Apellidos</th>
                                                                              <th>Opcion</th>
                                                                          </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                          @foreach ($repartidores as $repartidor)                    
                                                                              <tr>
                                                                                  <td>{{ $repartidor->id }}</td>
                                                                                  <td>{{ $repartidor->nombre }}</td>
                                                                                  <td>{{ $repartidor->apellidos }}</td>
                                                                                  <td>
                                                                                    <button wire:click='seleccionarRepartidor({{$pedido->id}},{{$repartidor->id}})' type="button" class="btn btn-success btn-sm">
                                                                                      <i class="fas fa-check"></i>
                                                                                    </button>
                                                                                  </td>
                                                                              </tr>
                                                                          @endforeach
                                                                      </tbody>

                                                                  </table>
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
                              
                                <!-- Modal seleccionar repartidor -->
                                <div wire:ignore.self class="modal fade" class="modal fade" id="modal-seleccionar-repartidor{{ $pedido->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                    {{-- {{$pedido->id}} --}}
                                                                    {{-- <h6>Cliente:   {{@buscarCliente(notapedido($pedido->id)->idCliente)->nombre   }} {{@buscarCliente(notaVenta($venta->id)->idCliente)->apellidos   }}</h6> 
                                                                    <h6>Fecha:    {{@notaPedido($pedido->id)->fecha}} </h6>  --}}

                                                                  </div>
                                                              </div>

                                                              <div class="card-body p-0">  
                                                                  <table class="table table-striped">
                                                                      <thead>
                                                                          <tr>
                                                                              <th>ID</th>
                                                                              <th>Nombre</th>
                                                                              <th>Apellidos</th>
                                                                              <th>Opcion</th>
                                                                          </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                          @foreach ($repartidores as $repartidor)                    
                                                                              <tr>
                                                                                  <td>{{ $repartidor->id }}</td>
                                                                                  <td>{{ $repartidor->nombre }}</td>
                                                                                  <td>{{ $repartidor->apellidos }}</td>
                                                                                  <td>
                                                                                    <button wire:click='seleccionarRepartidor({{$pedido->id}},{{$repartidor->id}})' type="button" class="btn btn-success btn-sm">
                                                                                      <i class="fas fa-check"></i>
                                                                                    </button>
                                                                                  </td>
                                                                              </tr>
                                                                          @endforeach
                                                                      </tbody>

                                                                  </table>
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
          @endif

    </div>
    
</div>

<div>
    @if ($final)

    <div class="card text-center">
        <div class="card-header">
            <div class="alert alert-primary" role="alert">
                Agregado Correctamente
            </div>
        </div>
        <div class="card-body">
          {{-- <h5 class="card-title"> Inventario Registrado</h5> --}}
          <p class="card-text">Que desea hacer?</p>
          <a href="{{ route('calzadoAlmacen.index') }}" class="btn btn-info">Ver Lista de Intentario</a>      
          <a href="{{ route('calzadoAlmacen.create') }}" class="btn btn-info">Realizar nuevo registro deInventario</a>   
        </div>
        <div class="card-footer text-muted">
        </div>
      </div>
    @else
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0">Inventario</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Inventario</li>
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
                        <h3 class="card-title"></h3>
                        <div class="card-tools">
                            {{-- @include('pages.productoAlmacen.buscar') --}}
                        </div>
                    </div>
                    <div class="card-body">   
                        {{-- ALMACEN --}}
                        <div class="row m-4"> 
                            <label>Almacen: </label>
                            <div class="input-group">
                                <button type="button" class="btn btn-success btn-sm">
                                    <i class="fa fa-check"></i>
                                </button>
                                    <div class="modal fade" wire:ignore.self  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Seleccionar Almacen</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <section class="content">
                                                        <div class="container-fluid">
                                                        <!-- Info boxes -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                {{-- @include('pages.categoria.insertar') --}}
                                                                <h3 class="card-title"></h3>
                                                                <div class="card-tools">
                                                                {{-- @include('pages.categoria.buscar') --}}
                                                                </div>
                                                            </div>
                                                            <!-- /.card-header -->
                                                            <div class="card-body p-0">          
                                                                <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                    <th>ID</th>
                                                                    <th>Almacen</th>
                                                                    <th>Opciones</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach (@almacenes() as $almacen)                    
                                                                    <tr>
                                                                        <td>{{ $almacen->id }}</td>
                                                                        <td>{{ $almacen->sigla }}</td>
                                                                        <td>
                                                                            <button wire:click='agregarAlmacen({{ $almacen->id }})' href="#" type="button" class="btn btn-sm btn-success" >
                                                                                <i class=""></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                </table>
                                                            </div>

                                                            @if ($message)
                                                                <div style="color: red" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                            @endif
                                                            <!-- /.card-body -->
                                                        </div>
                                                        {{-- {{ $categorias->links()}} --}}
                                                        <!-- /.row -->
                                                        </div><!--/. container-fluid -->
                                                    </section>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <select class="form-control" wire:model='idAlmacen' name="idCalzado" >
                                    <option value="0">Seleccione un Almacen </option>
                                    @foreach (@almacenes() as $cal)
                                        <option value="{{$cal->id}}">Almacen {{$cal->sigla}}</option>
                                    @endforeach
                                </select>
                                @if ($idAlmacen)
                                    <button class="btn btn-success disabled col-4">Almacen: {{@almacen($idAlmacen)->sigla}}
                                    </button>
                                @else
                                    <input class="col-4" wire:model='mensajeAlmacen' type="text" disabled class="form-control" placeholder="Seleccione un Almacen">
                                @endif    
                            
                            </div>  

                        </div>                                     
                        
                        @if ($idAlmacen)
                            {{-- CALZADO --}}
                            <div class="row m-4"> 
                                <label>Calzado:</label>
                                <div class="input-group">
                                    {{-- <span class="input-group-text"> --}}
                                        {{-- <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#calzados-modal"> --}}
                                            {{-- <i class="fas fa-list"></i> --}}
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#calzados-modal">
                                            <i class="fas fa-list"></i>
                                        </button>
                                        
                                        <button href="#" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detalle-calzado-modal">
                                            <i class="fas fa-eye"></i>
                                        </button>

                                        <button type="button" wire:click='seleccionarCalzado()' class="btn btn-success btn-sm" >
                                            <i class="fas fa-check"></i>
                                        </button>

                                        

                                        {{-- detalle calzado --}}

                                        <div wire:ignore.self class="modal fade" class="modal fade" id="detalle-calzado-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Seleccionar Calzados</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <section class="content">
                                                            <div class="container-fluid">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <img src="{{ asset(@calzado($idCalzado)->imagen) }}" width="100" height="400" class="card-img-top" alt="Card image cap">
                                                                            <h5 class="card-title"></h5>
                                                                            <p class="card-text"></p>
                                                                            <div class="card-body table-responsive p-0">
                                                                                <table class="table table-hover text-nowrap">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th>DETALLE DEL CALZADO</th>
                                                                                        <th></th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <dl class="row">
                                                                                        <tr>
                                                                                            <td><dt class="col-sm-4">Color:</dt>
                                                                                            <td><dd class="col-sm-8">{{@calzado($idCalzado)->color}}</dd>
                                                                                        </tr>
                                                                                        <tr>        
                                                                                            <td><dt class="col-sm-4">Talla:</dt></td>
                                                                                            <td><dd class="col-sm-8">{{@calzado($idCalzado)->talla}}</dd>
                                                                                        </tr>
                                                                                        <tr>        
                                                                                            <td><dt class="col-sm-4">Categoria:</dt></td>
                                                                                            <td><dd class="col-sm-8">{{@calzado($idCalzado)->nombre}}</dd>
                                                                                        </tr>
                                                                                        <tr>  
                                                                                            <td><dt class="col-sm-4">Calzado:</dt></td>
                                                                                            <td><dd class="col-sm-8">{{@calzado($idCalzado)->descripcion}}</dd>
                                                                                        </tr>
                                                                                        <tr>  
                                                                                            <td><dt class="col-sm-4">Tipo:</dt></td>
                                                                                            <td><dd class="col-sm-8">{{@calzado($idCalzado)->tipo}}</dd>
                                                                                        </tr>
                                                                                        <tr>  
                                                                                            <td><dt class="col-sm-4">Marca:</dt></td>
                                                                                            <td><dd class="col-sm-8">{{@calzado($idCalzado)->marca}}</dd>
                                                                                        
                                                                                        </tr>
                                                                                        <tr>  
                                                                                            <td><dt class="col-sm-4">Modelo:</dt></td>
                                                                                            <td><dd class="col-sm-8">{{@calzado($idCalzado)->modelo}}</dd>
                                                                                        
                                                                                        </tr>
                                                                                        <tr>  
                                                                                            <td><dt class="col-sm-4">Precio Venta:</dt></td>
                                                                                            <td><dd class="col-sm-8">{{@calzado($idCalzado)->precioVenta}}</dd>
                                                                                        
                                                                                        </tr>
                                                                                        <tr>  
                                                                                            <td><dt class="col-sm-4">Precio Compra:</dt></td>
                                                                                            <td><dd class="col-sm-8">{{@calzado($idCalzado)->precioCompra}}</dd>
                                                                                        
                                                                                        </tr>
                                                                                    </dl>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            @if ($message)
                                                                                <div style="color: red" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @endif
                                                                    </div>
                                                                </div>  
                                                            </div><!--/. container-fluid -->
                                                        </section>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cerrar</button>
                                                        {{-- <button type="button" class="btn btn-primary"></button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        {{-- modal calzado --}}
                                        <div wire:ignore.self class="modal fade" class="modal fade" id="calzados-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Seleccionar Calzados</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <section class="content">
                                                            <div class="container-fluid">
                                                                @if ($vP)
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <img src="{{ asset(@calzado($idCalzado)->imagen) }}" width="100" height="400" class="card-img-top" alt="Card image cap">
                                                                        <h5 class="card-title"></h5>
                                                                        <p class="card-text"></p>
                                                                        <div class="card-body table-responsive p-0">
                                                                            <table class="table table-hover text-nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>DETALLE DEL CALZADO</th>
                                                                                    <th></th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <dl class="row">
                                                                                    <tr>
                                                                                        <td><dt class="col-sm-4">Color:</dt>
                                                                                        <td><dd class="col-sm-8">{{@calzado($idCalzado)->color}}</dd>
                                                                                    </tr>
                                                                                    <tr>        
                                                                                        <td><dt class="col-sm-4">Talla:</dt></td>
                                                                                        <td><dd class="col-sm-8">{{@calzado($idCalzado)->talla}}</dd>
                                                                                    </tr>
                                                                                    <tr>        
                                                                                        <td><dt class="col-sm-4">Categoria:</dt></td>
                                                                                        <td><dd class="col-sm-8">{{@calzado($idCalzado)->nombre}}</dd>
                                                                                    </tr>
                                                                                    <tr>  
                                                                                        <td><dt class="col-sm-4">Calzado:</dt></td>
                                                                                        <td><dd class="col-sm-8">{{@calzado($idCalzado)->descripcion}}</dd>
                                                                                    </tr>
                                                                                    <tr>  
                                                                                        <td><dt class="col-sm-4">Tipo:</dt></td>
                                                                                        <td><dd class="col-sm-8">{{@calzado($idCalzado)->tipo}}</dd>
                                                                                    </tr>
                                                                                    <tr>  
                                                                                        <td><dt class="col-sm-4">Marca:</dt></td>
                                                                                        <td><dd class="col-sm-8">{{@calzado($idCalzado)->modelo}}</dd>
                                                                                    
                                                                                    </tr>
                                                                                    <tr>  
                                                                                        <td><dt class="col-sm-4">Modelo:</dt></td>
                                                                                        <td><dd class="col-sm-8">{{@calzado($idCalzado)->marca}}</dd>
                                                                                    
                                                                                    </tr>
                                                                                    <tr>  
                                                                                        <td><dt class="col-sm-4">Precio Venta:</dt></td>
                                                                                        <td><dd class="col-sm-8">{{@calzado($idCalzado)->precioVenta}}</dd>
                                                                                    
                                                                                    </tr>
                                                                                </dl>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        @if ($message)
                                                                            <div style="color: red" role="alert">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @endif  
                                                                    </div>
                                                                </div>  
                                                    
                                                                @else
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                        {{-- @include('pages.categoria.insertar') --}}
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
                                                                        <!-- /.card-header calzado -->
                                                                        <div class="card-body p-0">          
                                                                            <table class="table table-striped">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>ID</th>
                                                                                        <th>Nombre</th>
                                                                                        <th>Stock</th>
                                                                                        <th>Precio Venta</th>
                                                                                        <th>Precio Compra</th>
                                                                                        <th>Opciones</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($calzados as $calzado)                    
                                                                                        <tr>
                                                                                            <td>{{ $calzado->id }}</td>
                                                                                            <td>{{ $calzado->descripcion }}</td>
                                                                                            <td><input type="number" placeholder = "0" class="form-control" wire:model='cantidad'></td>
                                                                                            <td><input type="number" placeholder = "0" class="form-control" wire:model='precioVenta'></td>
                                                                                            <td><input type="number" placeholder = "0" class="form-control" wire:model='precioCompra'></td>
                                                                                            <td>
                                                                                                <button wire:click='agregarCalzado({{ $calzado->id }})' href="#" type="button" class="btn btn-sm btn-success" >
                                                                                                    <i class="fas fa-check"></i>
                                                                                                </button>
                                                                                                <button wire:click='verProducto({{ $calzado->id }})' href="#" type="button" class="btn btn-sm btn-info" >
                                                                                                    <i class="fas fa-eye"></i>
                                                                                                </button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        @if ($message)
                                                                            <div style="color: red" role="alert">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                @endif

                                                                
                                                            </div><!--/. container-fluid -->
                                                        </section>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cerrar</button>
                                                        {{-- <button type="button" class="btn btn-primary"></button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    @if ($criterio=='calzado')
                                        <select class="form-control" wire:model='idCalzado' name="idCalzado" >
                                            <option value="0">Seleccione un Calzado </option>

                                            @foreach (@calzados() as $cal)
                                                <option value="{{$cal->id}}">
                                                    {{ $cal->descripcion }} 
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                    
                                    @if ($criterio=='categoria')
                                        <select class="form-control" wire:model='idCalzado' name="idCalzado" >
                                            @foreach (@calzados() as $cal)
                                                <option value="{{$cal->id}}">
                                                    {{ @categoria($cal->idCategoria)->nombre }} 
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif

                                    @if ($criterio=='tipo')
                                        <select class="form-control" wire:model='idCalzado' name="idCalzado" >
                                            @foreach (@calzados() as $cal)
                                                <option value="{{$cal->id}}">
                                                    {{ @tipo($cal->idTipoCalzado)->tipo }} 
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif

                                    @if ($criterio=='marca')
                                        <select class="form-control" wire:model='idCalzado' name="idCalzado" >
                                            @foreach (@calzados() as $cal)
                                                <option value="{{$cal->id}}">
                                                    {{ @marca(@marcaModelo($cal->idMarcaModelo)->idMarca)->nombre }} 
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif

                                    @if ($criterio=='modelo')
                                        <select class="form-control" wire:model='idCalzado' name="idCalzado" >
                                            @foreach (@calzados() as $cal)
                                                <option value="{{$cal->id}}">
                                                    {{ @modelo(@marcaModelo($cal->idMarcaModelo)->idModelo)->nombre }} 
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif

                                    <select class="form-control" wire:model='criterio' name="criterio" >
                                            <option value="marca">Marca</option>
                                            <option value="modelo">Modelo</option>
                                            <option value="calzado">Calzado</option>
                                            <option value="categoria">Categoria</option>
                                            <option value="tipo">Tipo</option>
                                    </select>

                                    <input wire:model='cantidad' type="text" class="form-control" placeholder="Stock">
                                    <input wire:model='precioVenta' type="text" class="form-control" placeholder="Precio Venta">
                                    <input wire:model='precioCompra' type="text" class="form-control" placeholder="Precio Compra">
                                
                                    @if ($message)
                                    <div style="color: red" role="alert">
                                        {{ $message }}
                                    </div>
                                @endif
                                </div>  
                            </div> 
                        @else
                            <div class="text-center">
                                <h6>
                                    Seleccione un Almacen 
                                </h6> 
                            </div>
                        @endif
                            {{-- TABLA --}}
                        <section class="content">
                            <div class="container-fluid">
                            <!-- Info boxes -->
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="title">Tabla Calzados </h6>
                                    <div class="card-tools">
                                    {{-- @include('paid="example2" class="table table-bordered table-hover"ges.categoria.buscar') --}}
                                    </div>
                                </div>
                                <!--card.tabla.deCalzados -->
                                <div class="card-body m-3 p-0"> 
                                    @if (count($arrayCalzados))
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Almacen</th>
                                                <th>Calzado</th>
                                                <th>Stock</th>
                                                <th>Precio Venta</th>
                                                <th>Precio Compra</th>
                                                <th>Opciones</th>

                                            </tr>
                                            </thead>
                                            <tbody>
        
                                            @php
                                                $length = count($arrayCalzados);
                                            @endphp
                                            @for ($i = 0; $i  < $length; $i++)                    
                                                <tr>
                                                    {{-- {{-- <td>{{ $array->id }}</td> --}}
                                                    <td>{{ @calzado($arrayCalzados[$i]["idCalzado"])->id }}</td>
                                                    <td>Almacen {{ @almacen($arrayCalzados[$i]['idAlmacen'])->sigla}}</td>
                                                    <td>{{ $arrayCalzados[$i]['nombre'] }} - {{ @calzadoCategoria( $arrayCalzados[$i]['idCalzados'])->categoria  }} </td>
                                                    <td>{{ $arrayCalzados[$i]['cantidad'] }}</td>
                                                    <td>{{ $arrayCalzados[$i]['precioVenta'] }}</td>
                                                    <td>{{ $arrayCalzados[$i]['precioCompra'] }}</td>

                                                    {{-- <td>{{ @calzado($array['idCalzados'])->precioVenta }}</td> --}}
                                                    <td>
                                                          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modificarModal{{$i}}">
                                                              <i class="fas fa-edit"></i>
                                                          </button>
    
                                                          <!-- Modal Modificar -->
                                                          <div class="modal fade" wire:ignore.self  id="modificarModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                              <div class="modal-dialog" role="document">
                                                                  <div class="modal-content">
                                                                      <div class="modal-header">
                                                                          <h5 class="modal-title" id="exampleModalLabel">Modificar  {{ $arrayCalzados[$i]['nombre'] }} - {{ @calzadoCategoria( $arrayCalzados[$i]['idCalzados'])->categoria  }}</h5>
                                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                          </button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                          <div class="form-group">
                                                                              <label for="stock">Stock</label>
                                                                              <input type="number" class="form-control" wire:model='stock'  placeholder="{{$arrayCalzados[$i]['cantidad']}}">
                                                                          </div>
  
                                                                          <div class="form-group">
                                                                              <label for="precioVenta">Precio Venta</label>
                                                                              <input type="number" class="form-control" wire:model='precioVenta'  placeholder="{{$arrayCalzados[$i]['precioVenta']}}">
                                                                          </div>
                                                                          <div class="form-group">
                                                                              <label for="precioCompra">Precio Compra</label>
                                                                              <input type="number" class="form-control" wire:model='precioCompra' placeholder="{{$arrayCalzados[$i]['precioCompra']}}">
                                                                          </div>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                          <button type="button" wire:click="actualizarPrecioStock({{$i}})" data-dismiss="modal" aria-label="Close" class="btn btn-outline-success">Actualizar</button>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div> 
  
                                                        {{-- @livewire('actualizar-inventario', ['arrayCalzados' =>  $arrayCalzados[$i]]) --}}

                                                        <!-- Button eliminar-->
                                                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal{{$i}}">
                                                          <i class="fas fa-trash"></i>
                                                      </button>

                                                      <!-- Modal eliminar -->
                                                      <div class="modal fade" wire:ignore.self id="eliminarModal{{$i}}" tabarrayCalzados="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar {{ $arrayCalzados[$i]['nombre'] }} - {{ @calzadoCategoria( $arrayCalzados[$i]['idCalzados'])->categoria  }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" wire:click='eliminarCalzado({{$i}})' class="btn btn-danger" data-dismiss="modal" aria-label="Close">Eliminar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </td>
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>   
                                        {{-- {{var_dump($arrayCalzados)}} --}}
                                    @else

                                        <div class="text-center">
                                                <h6>
                                                    No hay calzados agregados en este almacen!
                                                </h6> 
                                        </div>

                                    @endif          

                                </div>
                                <!-- /.tabla calzado. -->
                            </div>
                        </div><!--/. container-fluid -->
                        </section>
                        @if (count($arrayCalzados))
                            <button class="btn btn-primary btn-sm"  wire:click='guardarInventario'>Guardar</button>    
                        @endif
                    </div>
                </div> 
            </div>
        </section>
    @endif

</div>
 
<div>
    @if ($final)
        <h6>Agregado Correctamente!</h6>
        <a href="{{ route('compra.index') }}" class="btn btn-info">Ver Lista de Compra</a>      
        <a href="{{ route('compra.create') }}" class="btn btn-info">Realizar nuevo registro de Compra</a>      
    @else

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                        <div class="col-sm-6">
                            <h3 class="m-0">Compra</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Compra</li>
                            </ol>
                        </div>
                </div>
            </div>
        </div>
        
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                        <div class="card-tools"></div>
                    </div>
                    <div class="card-body"> 
                         {{-- PROVEEDOR --}}
                        <div class="row m-4"> 

                            <label> Proveedores: </label>
                            <div class="input-group">
                                <button type="button" class="btn bg-orange btn-sm" data-toggle="modal" data-target="#clientes-modal">
                                    <i class="far fa-user"></i>
                                </button>
                                <button type="button" wire:click='seleccionarProveedor()' class="btn btn-info btn-sm" >
                                    @if ($idProveedor)
                                        <i class="fas fa-check"></i>
                                    @else    
                                        <i class="fas fa-check"></i>
                                    @endif
                                </button>
                                <!-- MODAL POVEEDORES-->
                                <div wire:ignore.self class="modal fade" class="modal fade" id="clientes-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Seleccionar Cliente</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                {{-- MODAL CLIENTE --}}
                                                <section class="content">
                                                    <div class="container-fluid">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h3 class="card-title"></h3>
                                                                <div class="card-tools">
                                                                    <form>
                                                                        <div class="input-group-prepend">
                                                                            <input  type="text" class="form-control" name="searchTextCalzado" placeholder="Buscar..." wire:model='searchTextCliente'>
                                                                            <button disabled  class="btn btn-info btn-sm" type="button"><i class="fas fa-search"></i></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="card-body p-0">          
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Nombre</th>
                                                                            <th>Apellidos</th>
                                                                            <th>Opciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($proveedores as $proveedor)                    
                                                                            <tr>
                                                                                <td>{{ $proveedor->id }}</td>
                                                                                <td>{{ $proveedor->nombre }}</td>
                                                                                <td>{{ $proveedor->apellidos}}</td>
                                                                                <td>
                                                                                    <button data-dismiss="modal" wire:click='agregarProveedor({{ $proveedor->id }})' href="#" type="button" class="btn btn-sm btn-info" >
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
                                                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal" >Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <select class="form-control" wire:model='idProveedor' >
                                                                                
                                    <option value="0">Seleccione un Proveedor </option>

                                    @foreach (@proveedores() as $proveedor)
                                        <option value="{{$proveedor->id}}">{{$proveedor->nombre}} {{$proveedor->apellidos}} </option>
                                    @endforeach
                                </select>    
                            </div> 
                            {{-- @if ($messageErrorCliente)
                                <div style="color: red" role="alert">
                                    {{ $messageErrorCliente }}
                                </div>
                                @endif 
                            </div>  --}}
                        </div> 
                            
                              {{-- ALMACEN --}}
                        <div class="row m-4"> 
                            <label> Seleccionar Almacen </label>
                            <div class="input-group">
                                <button type="button" class="btn btn-info btn-sm">
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
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h3 class="card-title"></h3>
                                                                <div class="card-tools"></div>
                                                            </div>
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
                                                                                    <i class="">+</i>
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
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <select class="form-control" wire:model='idAlmacen' name="idCalzado" >
                                    {{-- <option value="{{$cal->id}}">Almacen {{$cal->sigla}}</option> --}}

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
                                        <button type="button" class="btn bg-orange btn-sm" data-toggle="modal" data-target="#calzados-modal">
                                            <i class="fas fa-list"></i>
                                        </button>

                                        {{-- <button href="#" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detalle-calzado-modal">
                                            <i class="fas fa-eye"></i>
                                        </button> --}}

                                    <button type="button" wire:click='seleccionarCalzado()' class="btn btn-info btn-sm" >
                                        <i class="fas fa-check"></i>
                                    </button>
                                        {{-- DETALLE CALZADO--}}
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
                                                                                            <td><dt class="col-sm-4">Precio:</dt></td>
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
                                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#calzados-modal">Cerrar</button>
                                                        {{-- <button type="button" class="btn btn-primary"></button> --}}
                                                        {{-- <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#calzados-modal">
                                                            <i class="fas fa-list"></i>
                                                        </button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    

                                        <!-- MODAL CALZADO-->
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
                                                                        </div>
                                                                        <div>
                                                                            {{-- <button type="button" class="btn btn- btn-sm" data-dismiss="modal" >Cerrar</button> --}}
                                                                        </div>
                                                                    </div>  
                                                                @else
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                        <h3 class="card-title"></h3>
                                                                        <div class="card-tools">

                                                                                <div class="input-group-prepend">
                                                                                    <select class="form-control" wire:model='criterio' name="" >
                                                                                        <option value="">Buscar por...</option>
                                                                                        <option value="calzados">Calzados</option>
                                                                                        <option value="categorias">Categoria</option>
                                                                                        <option value="tipo_calzados">Tipo</option>
                                                                                        <option value="marcas">Marca</option>
                                                                                    </select>
                                                                                    <input  type="text" class="form-control" name="searchText" placeholder="Buscar..." wire:model='searchTextCalzado'>
                                                                                    <button disabled  class="btn btn-info btn-sm" type="button"><i class="fas fa-search"></i></button>
                                                                                </div>
                                                                            
                                                                        </div>
                                                                        </div>
                                                                        <!-- /.card-header calzado -->
                                                                        <div class="card-body p-0"> 
                                                                            <div class="input-group-prepend">
                                                                                <input wire:model='cantidad' type="number" class="form-control " placeholder="Cantidad">
                                                                                <input wire:model='precio' type="text" class="form-control" placeholder="Precio">
                                                                            </div>
                                                                            <br>                
                                                                            <table id="example2" class="table table-bordered table-hover">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>ID</th>
                                                                                        <th>Descripcion</th>
                                                                                        <th>Codigo</th>
                                                                                        <th>Stock</th>
                                                                                        <th>Imagen</th>
                                                                                        <th>Opciones</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @if (count($calzados))
                                                                                        
                                                                                        @foreach ($calzados as $calzado)                    
                                                                                            @if ($calzado->stock >= 11 && $calzado->stock < 20 )
                                                                                                <tr class="table-warning">
                                                                                                    <td>{{ $calzado->idCalzado }}</td>
                                                                                                    <td>{{ $calzado->descripcion }}</td>
                                                                                                    <td>{{ $calzado->codigo }}</td>
                                                                                                    <td>{{ $calzado->stock }}</td>

                                                                                                    <td>
                                                                                                        <img width="50" height="50" src="{{ asset( $calzado->imagen ) }}" alt="">
                                                                                                    </td>
                                                                                            
                                                                                                    <td>
                                                                                                        <button wire:click='agregarCalzado({{ $calzado->idCalzado }})' href="#" type="button" class="btn btn-sm btn-success" >
                                                                                                            <i class="fas fa-check"></i>
                                                                                                        </button>
                                                                                                        <button wire:click='verProducto({{ $calzado->idCalzado }})' href="#" type="button" class="btn btn-sm btn-info" >
                                                                                                            <i class="fas fa-eye"></i>
                                                                                                        </button>
                                                                                                    </td>

                                                                                                </tr>
                                                                                            @endif
                                                                                            @if ($calzado->stock < 10)
                                                                                                <tr class="table-danger">
                                                                                                        <td>{{ $calzado->idCalzado }}</td>
                                                                                                        <td>{{ $calzado->descripcion }}</td>
                                                                                                        <td>{{ $calzado->codigo }}</td>
                                                                                                        <td>{{ $calzado->stock }}</td>

                                                                                                        <td>
                                                                                                            <img width="50" height="50" src="{{ asset( $calzado->imagen ) }}" alt="">
                                                                                                        </td>
                                                                                                
                                                                                                        <td>
                                                                                                            <button wire:click='agregarCalzado({{ $calzado->idCalzado }})' href="#" type="button" class="btn btn-sm btn-info" >
                                                                                                                <i class="fas fa-check"></i>
                                                                                                            </button>
                                                                                                            <button wire:click='verProducto({{ $calzado->idCalzado }})' href="#" type="button" class="btn btn-sm btn-info" >
                                                                                                                <i class="fas fa-eye"></i>
                                                                                                            </button>
                                                                                                        </td>

                                                                                                </tr>
                                                                                            @endif
                                                                                            @if ($calzado->stock > 21)
                                                                                                <tr class="table-success">
                                                                                                        <td>{{ $calzado->idCalzado }}</td>
                                                                                                        <td>{{ $calzado->descripcion }}</td>
                                                                                                        <td>{{ $calzado->codigo }}</td>
                                                                                                        <td>{{ $calzado->stock }}</td>

                                                                                                        <td>
                                                                                                            <img width="50" height="50" src="{{ asset( $calzado->imagen ) }}" alt="">
                                                                                                        </td>
                                                                                                
                                                                                                        <td>
                                                                                                            <button wire:click='agregarCalzado({{ $calzado->idCalzado }})' href="#" type="button" class="btn btn-sm btn-success" >
                                                                                                                <i class="fas fa-check"></i>
                                                                                                            </button>
                                                                                                            <button wire:click='verProducto({{ $calzado->idCalzado }})' href="#" type="button" class="btn btn-sm btn-info" >
                                                                                                                <i class="fas fa-eye"></i>
                                                                                                            </button>
                                                                                                        </td>

                                                                                                </tr>
                                                                                            @endif

                                                                                        @endforeach
                                                                                    @else
                                                                                            <div class="text-center">
                                                                                                <div class="alert alert-success">Sin resultados</div>
                                                                                            </div>
                                                                                    @endif


                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                {{ $calzados->links()}}
                                                                <!-- /.row -->
                                                            </div><!--/. container-fluid -->
                                                        </section>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal" >Cerrar</button>
                                                        @if ($vP)
                                                        <button wire:click='verTablaProducto()' href="#" type="button" class="btn btn-sm btn-info" >
                                                            Volver
                                                        </button>                                                            
                                                    @endif
                                                        {{-- <button type="button" class="btn btn-primary"></button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input wire:model='searchCodigo' type="text" class="form-control" placeholder="Buscar por Codigo">
                                        @if (count($calzadoSearch))
                                            <button href="#" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detalle-zapato">
                                                <i class="fas fa-eye"></i>
                                            </button>                                        
                                        @else
                                            <button href="#" type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#detalle-zapato">
                                                <i class="fas fa-eye"></i>
                                            </button>              
                                        @endif


                                        <div wire:ignore.self class="modal fade" class="modal fade" id="detalle-zapato" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">DETALLE DEL CALZADO</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <section class="content">
                                                            <div class="container-fluid">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        @if (count($calzadoSearch))
                                                                            
                                                                            
                                                                            @foreach ($calzadoSearch as $zapato)
                                                                                <img src="{{ asset($zapato->imagen) }}" width="100" height="400" class="card-img-top" alt="Card image cap">
                                                                            @endforeach
                                                                            <h5 class="card-title"></h5>
                                                                                <p class="card-text"></p>
                                                                                <div class="card-body table-responsive p-0">
                                                                                    <table class="table table-hover text-nowrap">
                                                                                        
                                                                                        <tbody>
                                                                                        <dl class="row">
                                                                                            
                                                                                            @foreach ($calzadoSearch as $zapato)
                                                                                                <tr>
                                                                                                    <td><dt class="col-sm-4">Color:</dt>
                                                                                                    <td><dd class="col-sm-8">{{@calzado($zapato->idCalzado)->color}}</dd>
                                                                                                </tr>
                                                                                                <tr>        
                                                                                                    <td><dt class="col-sm-4">Talla:</dt></td>
                                                                                                    <td><dd class="col-sm-8">{{@calzado($zapato->idCalzado)->talla}}</dd>
                                                                                                </tr>
                                                                                                <tr>        
                                                                                                    <td><dt class="col-sm-4">Categoria:</dt></td>
                                                                                                    <td><dd class="col-sm-8">{{@calzado($zapato->idCalzado)->nombre}}</dd>
                                                                                                </tr>
                                                                                                <tr>  
                                                                                                    <td><dt class="col-sm-4">Calzado:</dt></td>
                                                                                                    <td><dd class="col-sm-8">{{@calzado($zapato->idCalzado)->descripcion}}</dd>
                                                                                                </tr>
                                                                                                <tr>  
                                                                                                    <td><dt class="col-sm-4">Tipo:</dt></td>
                                                                                                    <td><dd class="col-sm-8">{{@calzado($zapato->idCalzado)->tipo}}</dd>
                                                                                                </tr>
                                                                                                <tr>  
                                                                                                    <td><dt class="col-sm-4">Marca:</dt></td>
                                                                                                    <td><dd class="col-sm-8">{{@calzado($zapato->idCalzado)->marca}}</dd>
                                                                                                
                                                                                                </tr>
                                                                                                <tr>  
                                                                                                    <td><dt class="col-sm-4">Modelo:</dt></td>
                                                                                                    <td><dd class="col-sm-8">{{@calzado($zapato->idCalzado)->modelo}}</dd>
                                                                                                
                                                                                                </tr>
                                                                                                <tr>  
                                                                                                    <td><dt class="col-sm-4">Precio Compra:</dt></td>
                                                                                                    <td><dd class="col-sm-8">{{@calzado($zapato->idCalzado)->precioCompra}}</dd>
                                                                                                </tr>
                                                                                            @endforeach

                                                                                        </dl>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                @if ($message)
                                                                                    <div style="color: red" role="alert">
                                                                                        {{ $message }}
                                                                                    </div>
                                                                                @endif
                                                                        @else
                                                                                    <h5>No se encontraron resultados</h5>
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

                                    <input wire:model='cantidad' type="text" class="form-control" placeholder="Cantidad">{{$cantidad}}
                                    <input wire:model='precio'   type="text" class="form-control" placeholder="Precio">{{$precio}}
                                </div>  
                                @if ($messageErrorCodigo)
                                    <div style="color: red" role="alert">
                                            {{ $messageErrorCodigo }}
                                    </div>
                                @endif
                                {{--
                                @if ($messageErrorStock)
                                    <div style="color: red" role="alert">
                                            {{ $messageErrorStock }}
                                    </div>
                                @endif --}}

                            </div> 
                            <div class="row m-4"> 
                                {{-- @if ($stockActual)

                                @else
                                    
                                @endif --}}
                            </div>
                        @else
                            <div class="text-center">
                                <br>
                                <h6>
                                    Seleccione un Almacen 
                                </h6> 
                            </div>
                        @endif
                          
                            {{-- TABLA --}}
                        <section class="content">
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="title">@if ($idProveedor)

                                        <div class="container">
                                            <div class="row align-items-start">
                                                <div class="col"><label>Proveedor:<h6> {{ @proveedor($idProveedor)->nombre }}  {{ @proveedor($idProveedor)->apellidos }}</h6></label> </div>
                                                <div class="col"></div>
                                                <div class="col"></div>
                                                <label>Fecha:  <h6>{{@fechaHoy()}}</h6></label>
                                            </div>
                                          </div>   

                                        @else
                                           <h5>Tabla Compra</h5>
                                        @endif
                                    </h5>
                                        
                                        <div class="card-tools"></div>
                                    </div>
                                    <div class="card-body m-3 p-0"> 
                                        @if (count($arrayCalzados))
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Calzado</th>
                                                        <th>Almacen</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                        <th>Sub Total</th>
                                                        <th>Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $length = count($arrayCalzados);
                                                    @endphp
                                                    @for ($i = 0; $i  < $length; $i++)                    
                                                        <tr>
                                                            <td>{{ @calzado($arrayCalzados[$i]["idCalzados"])->id }}</td>
                                                            <td>{{@calzado($arrayCalzados[$i]["idCalzados"])->descripcion}}</td>
                                                            {{-- <td>{{ $arrayCalzados[$i]['descripcion'] }} - {{ @calzadoCategoria( $arrayCalzados[$i]['idCalzados'])->categoria  }} </td> --}}
                                                            <td>{{ @almacen($arrayCalzados[$i]['idAlmacen'])->sigla}}</td>
                                                            <td>{{ $arrayCalzados[$i]['cantidad'] }}</td>
                                                            
                                                            <td>{{ $arrayCalzados[$i]['precioCompra'] }}</td>

                                                            <td>{{ $arrayCalzados[$i]['subTotal'] }}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modificarModal{{$i}}">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
            
                                                                <!-- Modal Modificar -->

                                                                <div class="modal fade" wire:ignore.self  id="modificarModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                
                                                                                <h5 class="modal-title" id="exampleModalLabel">Modificar  {{ $arrayCalzados[$i]['descripcion'] }} - {{ @calzadoCategoria( $arrayCalzados[$i]['idCalzados'])->categoria  }}</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label for="cantidad">Cantidad</label> {{$cantidad}} 
                                                                                    <input type="number" class="form-control" wire:model='cantidad'  placeholder="{{$arrayCalzados[$i]['cantidad']}}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="precioCompra">Precio Compra</label> {{$precio}}
                                                                                    <input type="number" class="form-control" wire:model='precio'  placeholder="{{$arrayCalzados[$i]['precioCompra']}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" wire:click="actualizarPrecioStock({{$i}})" data-dismiss="modal" aria-label="Close" class="btn btn-outline-success">Actualizar</button>{{$i}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                                <!-- Button eliminar-->

                                                                <button type="button" wire:click='eliminarCalzado({{$i}})' class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>

                                                          
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                                <tfoot>
                                                    <th>TOTAL :</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>{{$total}}</th>
                                                    <th> </th>

                                                </tfoot>
                                            </table>   

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

                             </div>
                        </section>
                        @if (count($arrayCalzados))
                            <button class="btn btn-primary btn-sm"  wire:click='guardarDetalle({{ auth()->user()->id }})'>Guardar</button>    
                        @endif
                        @if ($messageErrorProveedor)
                            
                        @endif
                    </div>
                </div> 
            </div>
        </section>
    @endif
</div>


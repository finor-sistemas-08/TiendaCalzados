<div>
    @if ($final)
        <h6>Agregado Correctamente!</h6>
        <a href="{{ route('calzadoAlmacen.index') }}" class="btn btn-info">Ver Lista de Intentario</a>      
        <a href="{{ route('calzadoAlmacen.create') }}" class="btn btn-info">Realizar nuevo registro deInventario</a>      
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
                            <label> Seleccionar Proveedor </label>
                            <div class="input-group">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#preoveedores-modal">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <button type="button" wire:click='seleccionarProveedor()' class="btn btn-info btn-sm" >
                                        <i class="fas fa-check"></i>
                                    </button>
                                <!-- Modal proveedor -->
                                <div wire:ignore.self class="modal fade" class="modal fade" id="preoveedores-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Seleccionar Proveedor</h5>
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
                                                                <div class="card-tools">
                                                                    <form>
                                                                        <div class="input-group-prepend">
                                                                            <input  type="text" class="form-control" name="searchTextCalzado" placeholder="Buscar..." wire:model='searchTextCalzado'>
                                                                            <button disabled  class="btn btn-info btn-sm" type="button"><i class="fas fa-search"></i></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- /.card-header proveedor -->
                                                            <div class="card-body p-0">          
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Nombre</th>
                                                                            <th>Apellidos</th>
                                                                            <th>Telefono</th>
                                                                            <th>Direccion</th>
                                                                            <th>Opciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($proveedores as $proveedor)                    
                                                                            <tr>
                                                                                <td>{{ $proveedor->id }}</td>
                                                                                <td>{{ $proveedor->nombre }}</td>
                                                                                <td>{{ $proveedor->apellidos}}</td>
                                                                                <td>{{ $proveedor->telefono}}</td>
                                                                                <td>{{ $proveedor->direccion}}</td>
                                                                                <td>
                                                                                    <button wire:click='agregarProveedor({{ $proveedor->id }})' href="#" type="button" class="btn btn-sm btn-success" >
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
                                                {{-- <button type="button" class="btn btn-primary"></button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <select class="form-control" wire:model='idProveedor' >
                                    <option value="0">Seleccione </option>
                                    @foreach (@proveedores() as $proveedor)
                                        <option value="{{$proveedor->id}}">{{$proveedor->nombre}} {{$proveedor->apellidos}} </option>
                                    @endforeach
                                </select>
                            </div>  
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
                                    @foreach (@almacenes() as $cal)
                                        <option value="{{$cal->id}}">Almacen {{$cal->sigla}}</option>
                                    @endforeach
                                </select>
                                @if ($idAlmacen)
                                    <button class="btn btn-success disabled">Almacen seleccionado: {{@almacen($idAlmacen)->sigla}}
                                    </button>
                                @else
                                    <input wire:model='mensajeAlmacen' type="text" disabled class="form-control" placeholder="Seleccione un Almacen">
                                @endif    
                            </div>  
                        </div>                          

                        @if ($idAlmacen)
                            {{-- CALZADO --}}
                            <div class="row m-4"> 
                                <label> Seleccionar Calzado </label>
                                <div class="input-group">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#calzados-modal">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button type="button" wire:click='seleccionarCalzado()' class="btn btn-info btn-sm" >
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <!-- Modal calzados -->
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
                                                                <div class="card mb-3">
                                                                    <img src="{{ asset(@calzado($idCalzado)->imagen) }}" width="400" height="300" class="card-img-top" alt="...">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title"></h5>
                                                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title"></h3>
                                                                        <div class="card-tools">
                                                                            <form>
                                                                                <div class="input-group-prepend">
                                                                                    <input  type="text" class="form-control" name="searchText" placeholder="Buscar..." wire:model='searchTextProveedor'>
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
                                                                                    <th>Precio</th>
                                                                                    <th>Cantidad</th>
                                                                                    <th>Subtotal</th>
                                                                                    <th>Opciones</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($calzados as $calzado)                    
                                                                                    <tr>
                                                                                        <td>{{ $calzado->idCalzado }}</td>
                                                                                        <td>{{ $calzado->calzado }}</td>
                                                                                        <td>{{ $calzado->precioVenta }}</td>
                                                                                        <td><input type="number" class="form-control" wire:model='cantidad'></td>
                                                                                        <td>
                                                                                            <button wire:click='agregarCalzado({{ $calzado->idCalzado }})' href="#" type="button" class="btn btn-sm btn-success" >
                                                                                                <i class="fas fa-check"></i>
                                                                                            </button>
                                                                                            <button wire:click='verProducto({{ $calzado->idCalzado }})' href="#" type="button" class="btn btn-sm btn-info" >
                                                                                                <i class="fas fa-eye"></i>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </section>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    
                                    @if ($criterio=='calzado')
                                        <select class="form-control" wire:model='idCalzado' name="idCalzado" >
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



                                    <input wire:model='cantidad' type="text" class="form-control" placeholder="Cantidad">
                                    <input wire:model='precio' type="text" class="form-control" placeholder="Precio">

                                    
                                </div>  
                                @if ($message)
                                    <div style="color: red" role="alert">
                                        {{ $message }}
                                    </div>
                                @endif
                            </div> 
                        @else
                            <div class="text-center">
                                <h5>
                                    Seleccione un Almacen 
                                </h5> 
                            </div>
                        @endif
                          
                            {{-- TABLA --}}
                        <section class="content">
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="title">Tabla Calzados </h5>
                                        <div class="card-tools"></div>
                                    </div>
                                    <div class="card-body m-3 p-0"> 
                                        @if (count($arrayCalzados))
                                            <table class="table table-striped">
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
                                                            <td>{{ $arrayCalzados[$i]['descripcion'] }} - {{ @calzadoCategoria( $arrayCalzados[$i]['idCalzados'])->categoria  }} </td>
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
                                                                                    <label for="cantidad">Cantidad</label>
                                                                                    <input type="number" class="form-control" wire:model='stock'  placeholder="{{$arrayCalzados[$i]['cantidad']}}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="precioCompra">Precio Compra</label>
                                                                                    <input type="number" class="form-control" wire:model='precioCompra'  placeholder="{{$arrayCalzados[$i]['precioCompra']}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" wire:click="actualizarPrecioStock({{$i}})" data-dismiss="modal" aria-label="Close" class="btn btn-outline-success">Actualizar</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                                <!-- Button eliminar-->
                                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal{{$i}}">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>

                                                            <!-- Modal eliminar -->
                                                            <div class="modal fade" wire:ignore.self id="eliminarModal{{$i}}" tabarrayCalzados="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar {{ $arrayCalzados[$i]['descripcion'] }} - {{ @calzadoCategoria( $arrayCalzados[$i]['idCalzados'])->categoria  }}</h5>
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
                             </div>
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


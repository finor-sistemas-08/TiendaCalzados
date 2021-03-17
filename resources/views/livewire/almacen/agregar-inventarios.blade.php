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
                        
                        @if ($idAlmacen)

                            {{-- CALZADO --}}
                            <div class="row m-4"> 
                                <label> Seleccionar Calzado {{ $idCalzado }}</label>
                                <div class="input-group">
                                    {{-- <span class="input-group-text"> --}}
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#calzados-modal">
                                            {{-- <i class="fas fa-eye"></i> --}}
                                            {{-- <i class="fa fa-shoe-prints"></i> --}}
                                            <i class="fas fa-shoe-prints"></i>
                                        </button>


                                        <button type="button" wire:click='seleccionarCalzado()' class="btn btn-info btn-sm" >
                                            <i class="fas fa-check"></i>
                                        </button>


                                    {{-- </span> --}}
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
                                                            <!-- Info boxes -->

                                                            @if ($vP)
                                                            <div class="card mb-3">
                                                                    <img src="{{ asset(@calzado($idCalzado)->imagen) }}" width="400" height="300" class="card-img-top" alt="...">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title"></h5>
                                                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                                    </div>
                                                                </div>
                                                            
                                                            
                                                            {{-- <div class="card">
                                                                <div class="card-body">
                                                                <h5 class="card-title">Card title</h5>
                                                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                                </div>
                                                                <img src="..." class="card-img-bottom" alt="...">
                                                            </div> --}}
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
                                                                                            {{-- <button wire:click='verProducto({{ $calzado->id }})' href="#" type="button" class="btn btn-sm btn-info" >
                                                                                                <i class="fas fa-eye"></i>
                                                                                            </button> --}}
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            {{-- {{ $categorias->links()}} --}}
                                                            <!-- /.row -->
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
                                    <input wire:model='precioVenta' type="text" class="form-control" placeholder="Precio Venta">
                                    <input wire:model='precioCompra' type="text" class="form-control" placeholder="Precio Compra">
                                </div>  
                            </div> 
                        @else
                            <div class="text-center">
                                <h5>
                                    Seleccione un Almacen 
                                </h5> 
                            </div>
                        @endif
                            {{-- ALMACEN --}}
                        <div class="row m-4"> 
                            <label> Seleccionar Almacen </label>
                            <div class="input-group">
                                {{-- <span class="input-group-text"> --}}
                                    {{-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-eye"></i>
                                    </button> --}}
                                    <button type="button" class="btn btn-info btn-sm">
                                        <i class="fa fa-plus-square-o"></i>
                                    </button>
                                {{-- </span> --}}
                                    

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
                                                                                <i class="">+</i>
                                                                            </button>
                                                                            {{-- @include('pages.categoria.actualizar') --}}
                                                                            {{-- @include('pages.categoria.eliminar') --}}
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                </table>
                                                            </div>
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
                                    @foreach (@almacenes() as $cal)
                                        <option value="{{$cal->id}}">Almacen {{$cal->sigla}}</option>
                                    @endforeach
                                </select>
                                @if ($idAlmacen)
                                    <input wire:model='idAlmacen' type="text" disabled class="form-control" placeholder="">
                                @else
                                    <input wire:model='mensajeAlmacen' type="text" disabled class="form-control" placeholder="Seleccione un Almacen">
                                @endif    
                            
                            </div>  

                        </div>  
                            {{-- TABLA --}}
                        <section class="content">
                            <div class="container-fluid">
                            <!-- Info boxes -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="title">Tabla Calzados </h5>
                                    <div class="card-tools">
                                    {{-- @include('pages.categoria.buscar') --}}
                                    </div>
                                </div>
                                <!--card.tabla.deCalzados -->
                                <div class="card-body m-3 p-0"> 
                                    @if (count($arrayCalzados))
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Calzado</th>
                                                <th>Stock</th>
                                                <th>Precio Venta</th>
                                                <th>Precio Compra</th>
                                                <th>Almacen</th>
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
                                                    <td>{{ @calzado($arrayCalzados[$i]["idCalzados"])->id }}</td>
                                                    <td>{{ $arrayCalzados[$i]['nombre'] }} - {{ @calzadoCategoria( $arrayCalzados[$i]['idCalzados'])->categoria  }} </td>
                                                    <td>{{ $arrayCalzados[$i]['cantidad'] }}</td>
                                                    <td>{{ $arrayCalzados[$i]['precioVenta'] }}</td>
                                                    <td>{{ $arrayCalzados[$i]['precioCompra'] }}</td>
                                                    <td>{{ $arrayCalzados[$i]['idAlmacen']}}</td>
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
                                                <h5>
                                                    No hay calzados agregados en este almacen!
                                                </h5> 
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
 
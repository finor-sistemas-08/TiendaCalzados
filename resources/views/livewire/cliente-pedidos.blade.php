<div>
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
                                    <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-file"></i></a>
        
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#detalle-pedido-modal{{ $pedido->id }}">
                                      {{-- <i class="fas fa-eye"></i> --}}
                                      <i class="fas fa-eye"></i>
                                  </button>
        
                                      <!-- Modal calzados -->
                                  
        
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
    
    
</div>

<div>
    @auth
        <section id="topbar" class="d-none d-lg-block">
            
            <div class="container clearfix">
                <div class="contact-info float-left">
                </div>
                <div class="social-links float-right">

                    @if (!@boolRuta('pagos'))
                        <a href="#" data-toggle="modal" data-target="#carrito-modal" class="linkedin">
                            <i class="fas fa-shopping-cart fa-2x"></i>
                            <span class="badge badge-success">{{ @contarCarrito($idCliente) }} </span>
                        </a>
                    @endif

                    <i class="fas fa-user fa-2x"></i><a href="mailto:contact@example.com">{{ Auth::user()->name }}</a>
        
                    <div wire:ignore.self class="modal fade" id="carrito-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Calzados Seleccionados</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="tabla" style="display: block">
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table id="detalle" class="table table-hover table-hover table-bordered">
                                                <thead class="">
                                                <th>Calzado</th>
                                                <th>Cantidad</th>
                                                <th>Talla</th>
                                                <th>Precio </th>
                                                <th>Subtotal</th>
                                                <th>Opciones</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($carrito as $car)
                                                        <tr>
                                                            <td>{{$car->idCalzado}}</td>
                                                            <td>{{$car->cantidad}}</td>
                                                            <td>{{$car->talla}}</td>
                                                            <td>{{@calzado($car->idCalzado)->precioVenta}}</td>
                                                            <td>{{@calzado($car->idCalzado)->precioVenta * $car->cantidad }}</td>
                                                            <td><button class="btn btn-sm btn-danger" wire:click='eliminar({{ $car->id }})'><i class="fas fa-trash"></i></button></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <th>TOTAL</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>
                                                        <h6 id="total"> Bs/. {{$total}}</h6>
                                                    </th>
                                                </tfoot>
                                            </table>
                                            <a href="{{ route('web.pago', ['id'=>$idCliente]) }}">Realizar Pago</a>
                                            
                                                
                                                <style> 
                                                    @media(max-width: 700px){
                                                    #div_maps {
                                                            
                                                            height: 320px;
                                                        
                                                        }
                                                    
                                                    }
                                                    
                                                    @media(min-width: 700px){
                                                    #div_maps {
                                                            height: 380px;
                                                        
                                                        }
                                                    
                                                    }
                                                    
                                                    #map {
                                                    width: 100%;
                                                    height: 90%;
                                                    
                                                    }
                                                    
                                                    #modalcon{
                                                        color: #16438e;
                                                        line-height: 1.42857143;
                                                        font-family: "Frank";
                                                    }
                                                </style>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="maps" role="dialog">
                <div class="modal-dialog modal-lg">    
                  <!-- Modal content-->
                  <div class="modal-content" id="modalcon" >
                      <div class="modal-header" >         
                        <h3 align="center" style="width:100%; padding: 0px;">Indica tu dirección 
                        </h3>
                      </div>
                      <div class="modal-body">
                      <div id="div_maps" >
                          <!--  GOOGLE MAPS-->
                          <div id="map"></div>
                
                          <div style="display:none">
                              Nueva Ubiv.<input type="text" id="coords" />
                              <br>
                              Latitud <input class="xy" type="text"  id="longitud" name="longitud" />
                              <br>
                              Longitud <input class="xy" type="text" id="latitud" name="latitud" />
                              <br>
                              <br>
                          </div>

                          <div class="clearfix"></div>
                
                          <div id="ayuda" align="center">
                
                            <p id="nomDir">
                            <!--<b>No es tu ubicacion ? </b><small style="font-size: 10px;" >Recuerda que puedes modificar tu ubicación moviendo el icono que indica donde estas ahora. </small>
                            -->
                            </p> 
                    
                          </div>
                          <input  type="text" id="txtDir" name="txtDir" style="display:none">        
                          <!-- END ,MAPS -->
                      </div>
                
                      <div class="clearfix"></div>
                          <div class="alert alert-info" style="padding: 5px; margin-bottom: 0px;" align="center" >
                          <b> Verifique su ubicación exacta para recibir su pedido</b>
                          </div> 
                      </div>
                
                      <div class="modal-footer" stye="text-align: center !important;">
                          <button  type="button" class="btn btn-danger btn-lg" >Cancelar</button>
                          <button  style=" border-radius: 6px !important; font-size: 16px; width:220px;"  type="button" name="confir_ubv" id="confir_ubv" Onclick="addUbicacion(longitud.value,latitud.value,txtDir.value); " class="btn btn-success btn-lg verde">ACEPTAR</button>
                      </div>
                  </div>
                </div>
                
            </div>
        </section>
    @endauth
</div>


{{-- @section('mapa')
@include('layouts.components.jsMapa')
@include('layouts.components.calzados') --}}

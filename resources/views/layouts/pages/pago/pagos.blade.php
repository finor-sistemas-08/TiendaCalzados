@extends('layouts.app')
@section('contenido')
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

      </div>

          @livewire('tabla-pago', ['idCliente'=>$idCliente])

          
          <h4>Danos una Referencia</h4>

          <div class="form-group">
            <textarea class="form-control" name="message" id="referencia" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Referencia"></textarea>
            <div class="validate"></div>
          </div>

          <div class="text-center">
            <div class="social-links mt-3">
              <a data-target="#maps" data-toggle="modal" class="twitter"><i class="fas fa-map-marker-alt"></i></a>            
            </div>
            <h6>Envianos tu Ubicación</h6>
          </div>
          
          <br>

          <form action="{{ route('confirmar')}}" method="POST">
            @csrf
            <div class="form-group">
              
              <input type="hidden" class="form-control" name="referencia" value="refer" id="textreferencia" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <input type="hidden" class="form-control" name="longitud" id="textlongitud" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <input type="hidden" class="form-control" name="latitud" id="textlatitud" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <input type="hidden" class="form-control" name="link" id="textlink" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <input type="hidden" class="form-control" name="distancia" id="textDistancia" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <input type="hidden" class="form-control" name="tiempo" id="textTiempo" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <input type="hidden" class="form-control" name="cliente" value="{{$idCliente}}" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              
              <button type="submit" id="idPedido" class="btn btn-sm" style="background-color:#3BF462">
                <h6 style="color: white">Confirmar Pedido</h6>
              </button>

              <div class="validate"></div>
            </div>
          </form>

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

          {{-- @section('mapa') --}}
          @include('layouts.components.googlemaps')
          @include('layouts.components.jsMapa')
          @include('layouts.components.calzados')

      </div>


      </div>
    </div>
  </div>
  
</footer>
@endsection
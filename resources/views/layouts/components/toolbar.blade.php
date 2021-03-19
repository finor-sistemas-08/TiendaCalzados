  <!-- ======= Top Bar ======= -->
  @auth      
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">{{ Auth::user()->name }}</a>
        <i class="icofont-phone"></i> 
      </div>
      <div class="social-links float-right">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" data-toggle="modal" data-target="#carrito-modal" class="linkedin">
            {{-- <i class="fas fa-search"></i> --}}
            <i class="fas fa-cart-plus"></i>
        </a>
      </div>
    </div>
  </section>

  @else

  @endauth
<!-- Button trigger modal -->

<div class="modal fade" id="carrito-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <th>Opciones</th>
                            <th>Calzado</th>
                            <th>Cantidad</th>
                            <th>Precio </th>
                            <th>Subtotal</th>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>
                                <h6 id="total"> Bs/. 0.00</h6>
                            </th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="cliente" style="display: none">

            </div>
            <div class="ubicacion" style="display: none">

            </div>

        </div>
        <div class="modal-footer">
           <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
          @auth
                <button type="button" onclick="mostrarMapa()" class="btn btn-primary">Guardar</button>
          @else
                <button type="button" onclick="mostrarFormularioDatos()" class="btn btn-primary">Guardar</button>
          @endauth
        
        </div>
      </div>
    </div>
</div>




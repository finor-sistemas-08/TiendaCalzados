<div>
    @auth
        <section id="topbar" class="d-none d-lg-block">
            <div class="container clearfix">
            <div class="contact-info float-left">
            </div>
            <div class="social-links float-right">
                <a href="#" data-toggle="modal" data-target="#carrito-modal" class="linkedin">
                    <i class="fas fa-shopping-cart fa-2x"></i>
                    <span class="badge badge-success">{{ @contarCarrito($idCliente) }} {{$idCarrito}}</span>
                </a>
                <i class="fas fa-user fa-2x"></i><a href="mailto:contact@example.com">{{ Auth::user()->name }}</a>
    
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
                                            <th>Talla</th>
                                            <th>Precio </th>
                                            <th>Subtotal</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($carrito as $car)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{$car->idCalzado}}</td>
                                                        <td>{{$car->cantidad}}</td>
                                                        <td>{{$car->talla}}</td>
                                                        <td>{{@calzado($car->idCalzado)->precioVenta}}</td>
                                                        <td>{{@calzado($car->idCalzado)->precioVenta * $car->cantidad }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                            <th>TOTAL</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>
                                                <h6 id="total"> Bs/. {{$total}}</h6>
                                            </th>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
    @endauth
    
</div>

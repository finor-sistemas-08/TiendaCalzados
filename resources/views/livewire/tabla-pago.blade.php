<div>

    <h1 class="text-center">MI PEDIDO</h1>
    <table id="detalle" class="table table-hover table-hover table-bordered">
        <thead class="" >
            <tr style="color:white">
                <th>CALZADO</th>
                <th>CANTIDAD</th>
                <th>TALLA</th>
                <th>PRECIO </th>
                <th>SUBTOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carrito as $car)
                <tr style="background-color:white">
                    <td>{{@calzado($car->idCalzado)->descripcion}} <br> {{@calzado($car->idCalzado)->marca}} {{@calzado($car->idCalzado)->modelo}}</td>
                    <td>{{$car->cantidad}}</td>
                    <td>{{$car->talla}}</td>
                    <td>{{@calzado($car->idCalzado)->precioVenta}}</td>
                    <td>{{@calzado($car->idCalzado)->precioVenta * $car->cantidad }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr style="color:white">
                <th>TOTAL</th>
                <th></th>
                <th></th>
                <th></th>
                <th>
                    <h6 id="total"> Bs/. {{$total}}</h6>
                </th>
            </tr>
        </tfoot>
    </table>
</div>

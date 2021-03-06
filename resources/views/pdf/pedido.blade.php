 
<!DOCTYPE>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
    <style>
        body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif; 
        font-size: 14px;
        /*font-family: SourceSansPro;*/
        }
        #logo{
        float: left;
        margin-top: 1%;
        margin-left: 2%;
        margin-right: 2%;
        }
        #imagen{
        width: 100px;
        }
        #datos{
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
        }
        #encabezado{
        text-align: left;
        margin-left: 10%;
        margin-right: 35%;
        font-size: 15px;
        }
        #fact{
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        }
        section{
        clear: left;
        }
        #cliente{
        text-align: left;
        }
        #facliente{
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        
        }
        #fac, #fv, #fa{
        color: #FFFFFF;
        font-size: 15px;
        }
        #facliente thead{
        padding: 20px;
        /* background: #2183E3; */
        text-align: left;
        border-bottom: 1px solid #FFFFFF;  
        }
        /* #facvendedor{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
        #facvendedor thead{
        padding: 20px;
        background: #2183E3;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        } */
        #facarticulo{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        border:left;
        text-align: center;
        }
        #facarticulo thead{
        padding: 20px;
        background: #2183E3;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }
        #gracias{
        text-align: center; 
        }
    </style>
    <body>
        <header>
            <div id="logo">
                CONY
                 {{-- <img src="img/logo1.png" alt="incanatoIT" id="imagen">  --}}
            </div>
            <div id="datos">
                <p id="encabezado">
                    <b></b>
                    <br>Centro Comercial la Bolivianita Caseta #1, Montero</b>
                    <br>Celular: +591 78538688</b>
                    <br>Correo: cony@gmail.com </b>
                </p>
            </div>
            <div id="fact">
            <br>
            <br>
            <h6><b>Nro. Pedido: 000{{$pedido->id}}</b></h6>
                
            </div>
        </header>
        <br>
        <section>
            <div>
                <table id="facliente">
                    <thead>                        
                        <tr>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <br>
                        <br>
                        <br>
                            {{-- <th><p id="cliente">Sr(a). {{ $cliente->nombre }} {{ $cliente->apellidos }}<br>
                            Tel??fono: {{ $cliente->telefono }}<br>
                            Correo: {{ $cliente->email }}<br> --}}
                            {{-- Fecha: {{$notaCompra->fecha}} --}}
                            </p></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

       
        <section>
            <div>
                <table id="facarticulo">
                    <thead>
                        <tr id="fa">
                            <th>CANTIDAD</th>
                            <th>DESCRIPCION</th>
                            <th>PRECIO UNITARIO</th>
                            <th>SUB TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($detalle as $det)
                        <tr>
                            <td>{{$det->cantidad}}</td>
                            <td>{{$det->idCalzado}}</td>
                            <td>{{$det->idCalzado}}</td>
                            <td>{{ @calzado(calzadoAlmacen($det->idCalzadoAlmacen)->idCalzado)->descripcion }}</td>
                            <td>{{ @calzado(calzadoAlmacen($det->idCalzadoAlmacen)->idCalzado)->precioVenta }}</td>
                            <td>{{$det->subTotal}} .Bs</td> 
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>   
                        <tr>
                            <th></th>
                            <th></th>
                            <th style:='padding:30px'>TOTAL</th>
                            {{-- <th>{{$notaCompra->monto}} .Bs</th>        --}}
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>
        <br>
        <br>
        <footer>
            <div id="gracias">
                <p><b>Gracias </b></p>
            </div>
        </footer>
    </body>
</html>
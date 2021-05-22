<?php

namespace App\Http\Controllers;

use App\Models\Calzado;
use App\Models\Carrito;
use App\Models\DetalleCarrito;
use App\Models\DetalleNotaCarrito;
use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function mostrar(){
        return view('pages.pedido.mostrar');
    }

    public function crear(){
        return view('pages.pedido.insertar');
    }

    public function clientePedido(){

        return view('pages.pedido.pedidoCliente',[

        ]);
    }
    
    public function clienteCarrito(){
        return view('pages.pedido.carritoCliente');
    }


    public function repartidorPedido(){

        $id=Auth::user()->id;

        $pedidoRepartidor= Pedido::join('repartidores','repartidores.id','=','pedido.idRepartidor')
        ->where('idRepartidor','=',$id)
        ->orderBy('pedido.id', 'asc')
        ->paginate(10);

        return view('pages.pedido.pedidoRepartidor',[
            'pedidos'=>$pedidoRepartidor     
        ]);
    }

    public function sumarhora($tiempo ){
        $hA= date('H');
        $iA=date('i');
        $sA=date('s');
        

        // obtengo segundos
            $substrsegundo= substr($tiempo,6);
            $st= $substrsegundo;
        // minutos
            $substr= substr($tiempo,3);
            $it=substr($substr,0,2);

        //hora
            $ht= substr($tiempo,0,2);


        $ss = $sA + $st;
        $si = $iA + $it;
        $sh = $hA + $ht;
        // suma segundo con condicion
        if ($ss > 60) {
            $rss=$ss-60;
            $ss=$rss;

            $si=$si + 1;
        }

        if ($ss == 60) {
            $ss="00";

            $si=$si + 1;
        }

        // suma minuto con condicion

        if ($si > 60) {
            $rss=$si-60;
            $si=$rss;

            $sh=$sh + 1;
        }

        if ($si == 60) {
            $si="00";

            $sh=$sh + 1;
        }

        //suma hora con condicion

        if ($sh > 24) {
            $rss=$sh-24;
            $sh=$rss;

            // $si=$si + 1;
        }

        if ($sh == 24) {
            $sh="00";

        }

        if ($ss <10) {
            $ss="0".$ss;
        }

        if ($si <10) {
            $si="0".$si;
        }

        if ($sh <10) {
            $sh="0".$sh;
        }
        
        return $sh.':'.$si.':'.$ss;
    }

    public function confirmarPedido(Request $request){

        $ubicacion = new Ubicacion();

        $ubicacion->latitud =$request->latitud;
        $ubicacion->longitud=$request->longitud;
        $ubicacion->referencia=$request->referencia;
        $ubicacion->url=$request->link;
        $ubicacion->save();

        $pedido = new Pedido();
        $pedido->fecha = date('Y-m-d');
        $pedido->fechaentrega = date('Y-m-d');
        $pedido->hora = date('H:i:s');
        $pedido->horaentrega = $this->sumarhora($request->tiempo);
        $pedido->tiempoentrega=$request->tiempo;
        $pedido->montototal=0;
        $pedido->estado=0;

        $pedido->idUser= $request->cliente;
        $pedido->idCliente=$request->cliente;
        $pedido->idRepartidor = null;
        $pedido->idUbicacion = $ubicacion->id;
        $pedido->save();

        $obj = Carrito::Where('idCliente','=',$request->cliente)
        ->get(); 

        $detallecarrito =DetalleCarrito::where('idCarrito','=',$obj[0]->id)
        ->get();

        $array=[];
        foreach ($detallecarrito as $key => $value) {
            
            array_push($array,$value->id);
            $car = DetalleNotaCarrito::findOrFail($value->id);
            $car->estado = 1;
            $car->update();

            $producto= Calzado::findOrFail($value->idCalzado);

            $detallePedido = new DetallePedido();
            $detallePedido->cantidad= $value->cantidad;
            $detallePedido->subTotal= $value->cantidad * $producto->precioVenta;
            
            // $pedido = Pedido::findOrFail($pedido->id);
            $pedido->montoTotal  = $pedido->montoTotal + $detallePedido->subTotal;
            $pedido->update();

            $detallePedido->idPedido= $pedido->id;
            $detallePedido->idCalzadoAlmacen= null;
            $detallePedido->save();
            
        }
        

        return view('layouts.pages.inicio');

    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function repartidorPedido(){

        return view('pages.pedido.pedidoRepartidor',[
            
        ]);
    }
}


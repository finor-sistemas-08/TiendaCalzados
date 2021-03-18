<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function mostrar(){
        return view('pages.pedido.mostrar');
    }
}

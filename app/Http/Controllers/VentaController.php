<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function mostrar(){
        return view('pages.venta.mostrar');
    }

    public function crear(){
        return view('pages.venta.insertar');
    }
}

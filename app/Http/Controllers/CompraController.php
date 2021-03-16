<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function mostrar(){
        return view('pages.compra.mostrar');
    }

    public function crear(){
        return view('pages.compra.insertar');
    }
}

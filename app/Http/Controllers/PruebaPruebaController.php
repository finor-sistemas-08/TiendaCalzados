<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class PruebaPruebaController extends Controller
{
    public function buscar(){
        $cliente = Cliente::findOrFail(1);
        return $cliente ;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Calzado;
use App\Models\Marca;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function calzados($id){
        return view('layouts.pages.detalleCalzado');    
    }
    public function marcaDetalle($id){
        return "Marca modelo " +  $id;
    }
    public function buscarMarcas(Request $request){
        $marca =Calzado::select( 'calzados.id',
        'calzados.descripcion',
        'calzados.imagen',

        'calzados.precioVenta',
        'calzados.precioCompra',
        'tipo_calzados.tipo',
        'categorias.nombre as categoria',
        'marca_modelos.talla',
        'marca_modelos.color',
        'marca_modelos.idMarca',
        'marca_modelos.idModelo',
        'marca_modelos.id as idMarcaModelo',
        'marcas.nombre as marca'
        )
        ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
        ->join('categorias','categorias.id','=','calzados.idCategoria')
        ->join('marca_modelos','marca_modelos.id','=','calzados.idMarcaModelo')
        ->join('marcas','marcas.id','=','marca_modelos.idMarca')
        ->where('marcas.id','=',$request->id)->get();
        return [
            'marca' => $marca
        ];
    }

    public function buscarCalzado(Request $request){
        $calzado =Calzado::select( 'calzados.id',
        'calzados.descripcion',
        'calzados.imagen',

        'calzados.precioVenta',
        'calzados.precioCompra',
        'tipo_calzados.tipo',
        'categorias.nombre as categoria',
        'marca_modelos.talla',
        'marca_modelos.color',
        'marca_modelos.idMarca',
        'marca_modelos.idModelo',
        'marca_modelos.id as idMarcaModelo',
        'marcas.nombre as marca'
        )
        ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
        ->join('categorias','categorias.id','=','calzados.idCategoria')
        ->join('marca_modelos','marca_modelos.id','=','calzados.idMarcaModelo')
        ->join('marcas','marcas.id','=','marca_modelos.idMarca')
        ->where('calzados.id','=',$request->id)->get();
        return [
            'calzado' => $calzado
        ];
    }
}

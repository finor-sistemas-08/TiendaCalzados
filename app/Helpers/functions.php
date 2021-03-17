<?php

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\MarcaModelo;
use App\Models\Modelo;
use App\Models\TipoCalzado;
use App\Models\Repartidor;
use App\Models\Almacen;
use App\Models\Calzado;
use App\Models\CalzadoAlmacen;
use App\Models\Cliente;
use App\Models\Proveedor;
use Symfony\Component\CssSelector\Node\FunctionNode;

function clientes(){
    $clientes = Cliente::all();
    return $clientes;
}

function proveedores(){
    $proveedores = Proveedor::all();
    return $proveedores;
}
function nombreMarca($id){
    $marcaModelo= MarcaModelo::findOrFail($id);
    $idMaMo=$marcaModelo->idMarca;
    $marca= Marca::findOrFail($idMaMo);
    return $marca->nombre;
}

function nombreModelo($id){
    $marcaModelo= MarcaModelo::findOrFail($id);
    $idMaMo=$marcaModelo->idModelo;
    $modelo= Modelo::findOrFail($idMaMo);
    return $modelo->nombre;
}

function categorias(){
    $categoria= Categoria::all();
    return $categoria;
}

function modelos(){
    $modelo= Modelo::all();
    return $modelo;
}

function tipos(){
    $tipo= TipoCalzado::all();
    return $tipo;
}

function marcas(){
    $marca= Marca::all();
    return $marca;
}
function repartidores(){
    $repartidor= Repartidor::all();
    return $repartidor;
}

function marcaModelos(){
    $marcaModelo= MarcaModelo::all();
    return $marcaModelo;
}

function almacenes(){
    $almacen= Almacen::all();
    return $almacen;
}

function calzados(){
    $calzados= Calzado::all();
    return $calzados;
}


function calzado($id){
    $calzados = Calzado::
    where('calzados.id','=',$id)->get();
    return $calzados[0];
}

function calzadoCategoria($id){
    $calzadosCategoria = 
    Calzado::join('categorias','categorias.id','=','calzados.idCategoria')->
    select('categorias.nombre as categoria')
    ->where('calzados.id','=',$id)->get();
    return $calzadosCategoria[0];
}

function almacen($id){
    $almacen = Almacen::
    where('almacenes.id','=',$id)->get();
    return $almacen[0];
}


function calzadoTipo($idTipo){
    $calzado = Calzado::join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
    ->join('categorias','categorias.id','=','calzados.idCategoria')
    ->select('tipo_calzados.id as idTipo ',
             'tipo_calzados.tipo',
            'categorias.nombre as categoria',
             'calzados.id as idCalzado ',
             'calzados.nombre as calzado'
            )
    ->where('tipo_calzados.id','=',$idTipo)->get();
    return $calzado;
}

function selectCalzado($idAlmacen){
    $calzadoAlmacen =CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
                                    ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
                                    ->select('almacenes.id as idAlmacen',
                                             'almacenes.sigla',
                                             'calzados.id as idCalzados',
                                             'calzados.nombre as calzado',
                                             'calzado_almacen.id as idCalzadoAlmacen'
                                    )
                                    ->where('calzado_almacen.idAlmacen','=',$idAlmacen)->get();

    return $calzadoAlmacen;
}


    function buscarCliente($id){
        $cliente = Cliente::findOrFail($id);  
        return $cliente;
    }
 
?>
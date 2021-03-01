<?php

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\MarcaModelo;
use App\Models\Modelo;
use App\Models\TipoCalzado;
use App\Models\Repartidor;


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

?>
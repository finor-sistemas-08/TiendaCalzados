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
use App\Models\Compra;
use App\Models\DetalleNotaCompra;
use App\Models\DetalleNotaVenta;
use App\Models\Proveedor;
use App\Models\Venta;
use Symfony\Component\CssSelector\Node\FunctionNode;

function clientes(){
    $clientes = Cliente::all();
    return $clientes;
}

function cliente($idCliente){
    $clientes = Cliente::where('clientes.id','=',$idCliente)->get();
    return $clientes[0];
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
    $calzados = Calzado::join('categorias','categorias.id','=','calzados.idCategoria')
    ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
    ->join('marca_modelos','marca_modelos.id','=','calzados.idMarcaModelo')
    ->join('marcas','marcas.id','=','marca_modelos.idMarca')
    ->join('modelos','modelos.id','=','marca_modelos.idModelo')

    ->select('categorias.nombre',
            'calzados.descripcion',
            'calzados.imagen',
            'calzados.id',
            'calzados.precioVenta',
            'calzados.precioCompra',
            'tipo_calzados.tipo',
            'marca_modelos.talla',
            'marca_modelos.color',
            'marca_modelos.idMarca',
            'marca_modelos.idModelo',
            'marcas.nombre as marca',
            'modelos.nombre as modelo',
            'marca_modelos.id as idMarcaModelo'
            
            )
    ->where('calzados.id','=',$id)->get();
    return $calzados[0];
}

function categoria($id){ 
    $categorias = Categoria::
    where('categorias.id','=',$id)->get();
    return $categorias[0];

}


function tipo($id){ 
    $tipo = TipoCalzado::
    where('tipo_calzados.id','=',$id)->get();
    return $tipo[0];

}

function marcamodelo($idMarcaModelo){
    $marcaModelo = MarcaModelo::findOrFail($idMarcaModelo);
    return $marcaModelo;
}

function marca($id){
    $marca = Marca::findOrFail($id);
    return $marca;
}

function modelo($id){
    $modelo = Modelo::findOrFail($id);
    return $modelo;
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
             'calzados.descripcion as calzado'
            )
    ->where('tipo_calzados.id','=',$idTipo)->get();
    return $calzado;
}

function selectCalzado($idAlmacen){
    $calzadoAlmacen =CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
                                    ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
                                    ->select('almacenes.id as idAlmacen',
                                             'almacenes.sigla',
                                             'calzados.id as idCalzado',
                                             'calzados.descripcion as calzado',
                                             'calzado_almacen.id as idCalzadoAlmacen'
                                    )
                                    ->where('calzado_almacen.idAlmacen','=',$idAlmacen)->get();

    return $calzadoAlmacen;
}


    function buscarCliente($id){
        $cliente = Cliente::findOrFail($id);  
        return $cliente;
    }

    function buscarProveedor($id){
        $proveedor = Proveedor::findOrFail($id);  
        return $proveedor;
    }

    function notaVenta($id){
        $notaVenta= Venta::findOrFail($id);
        return $notaVenta;
    }

    function detalleVenta($id){
        $detalleVenta= DetalleNotaVenta::where('detalle_venta.idNotaVenta','=',$id)->get();
        return $detalleVenta;

    }

    function notaCompra($id){
        $notaCompra= Compra::findOrFail($id);
        return $notaCompra;
    }

    function detalleCompra($id){
        $detalleCompra= DetalleNotaCompra::where('detalle_compra.idNotaCompra','=',$id)->get();
        return $detalleCompra;

    }

    function calzadoAlmacen($id){
        $calzadoAlmacen = CalzadoAlmacen::findOrFail($id);
        return $calzadoAlmacen;
    }
    function fechaHoy(){
      return $hoy = date('y-m-d');

    }
 
?>
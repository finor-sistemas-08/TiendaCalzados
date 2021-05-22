<?php

use App\Http\Livewire\DetalleVenta;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\MarcaModelo;
use App\Models\Modelo;
use App\Models\TipoCalzado;
use App\Models\Repartidor;
use App\Models\Almacen;
use App\Models\Calzado;
use App\Models\CalzadoAlmacen;
use App\Models\Carrito;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\DetalleCarrito;
use App\Models\DetalleNotaCarrito;
use App\Models\DetalleNotaCompra;
use App\Models\DetalleNotaPedido;
use App\Models\DetalleNotaVenta;
// use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Proveedor;
use App\Models\Ubicacion;
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

function proveedor($idProveedor){
    $proveedores = Proveedor::where('proveedores.id','=',$idProveedor)->get();
    return $proveedores[0];
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
function repartidor($id){
    $repartidor = Repartidor::findOrFail($id);
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

    function buscarRepartidor($id){
        $repartidor = Repartidor::findOrFail($id);  
        return $repartidor;
    }

    function notaVenta($id){
        $notaVenta= Venta::findOrFail($id);
        return $notaVenta;
    }

    function detalleVenta($id){
        $detalleVenta= DetalleNotaVenta::where('detalle_venta.idNotaVenta','=',$id)->get();
        return $detalleVenta;

    }


    function detallePedido($id){
        $detallePedido= DetalleNotaPedido::where('detalle_Pedido.idPedido','=',$id)->get();
        return $detallePedido;

    }

    function detalleCompra($id){
        $detalleCompra= DetalleNotaCompra::where('detalle_compra.idNotaCompra','=',$id)->get();
        return $detalleCompra;

    }
    function detalleCarrito($idPedido){

        $pedido = Pedido::findOrFail($idPedido);

        $carrito = Carrito::where('idCliente','=',$pedido->idCliente)->get();
        $idCarrito = $carrito[0]->id; 

        $detalleCarrito= DetalleNotaCarrito::
        where('detallecarrito.idCarrito','=',$idCarrito)
        ->where('detallecarrito.estado','=',1)
        ->get();
        
        return $detalleCarrito;

    }

    function notaPedido($id){
        $notaPedido= Pedido::findOrFail($id);
        return $notaPedido;
    }

    function notaCompra($id){
        $notaCompra= Compra::findOrFail($id);
        return $notaCompra;
    }

  

    function calzadoAlmacen($id){
        $calzadoAlmacen = CalzadoAlmacen::findOrFail($id);
        return $calzadoAlmacen;
    }
    function fechaHoy(){
      return $hoy = date('y-m-d');
    }
    function imagen($id){
        
    }
    function contarCarrito($id){
        $carrito = Carrito::where("idCliente","=",$id)->get();
        
        $detalle = DetalleCarrito::where("idCarrito","=",$carrito[0]->id)->get();
        $c = count($detalle);
        return $c;
    }


    function boolRuta($ruta){
        $sw = false;
        if (request()->is($ruta)) {
            $sw = true;
        }
        return $sw;
    }
    function ubicacion($idPedido){
        $pedido = Pedido::findOrFail($idPedido);
        $ubicacion = Ubicacion::findOrFail($pedido->idUbicacion);
        return $ubicacion;
    }
    function buscarcalzadoAlmacen($idCalzado){
        $calzado  = Calzado::findOrFail($idCalzado);

        $marcaModelo  = MarcaModelo::join('calzados','calzados.idMarcaModelo','=','marca_modelos.id')
        ->where('calzados.id','=',$calzado->id)->get();
        



        $calzadoAlmacen  = CalzadoAlmacen::join('calzados','calzados.id','=','calzado_almacen.idCalzado')
        ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
        ->join('categorias','categorias.id','=','calzados.idCategoria')
        ->join('marca_modelos','marca_modelos.id','=','calzados.idMarcaModelo')
        // ->select('calzados.id as idCalzado',
        //          'marca_modelos.id as idMarcaModelo',
        //          'calzado_almacen.id as idCalzadoAlmacen'
        // )
        ->where('categorias.id','=',$calzado->idCategoria)
        ->where('tipo_calzados.id','=',$calzado->idTipoCalzado)
        ->where('marca_modelos.idMarca','=',$marcaModelo[0]->idMarca)
        ->where('calzados.descripcion','LIKE','%'.$calzado->descripcion.'%')->get();
        return $calzadoAlmacen;
    }
    function pedido($id){
        $pedido  = Pedido::findOrFail($id);
        return $pedido;
    }
 
?>
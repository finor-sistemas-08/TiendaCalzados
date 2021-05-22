<?php

namespace App\Http\Controllers;

use App\Http\Livewire\DetallePedido;
use App\Models\Calzado;
use App\Models\CalzadoAlmacen;
use App\Models\Carrito;
use App\Models\Cliente;
use App\Models\DetalleCarrito;
use App\Models\DetalleNotaCarrito;
use App\Models\DetalleNotaPedido;
use App\Models\MarcaModelo;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function buscar(){
        $idCalzado = 30;
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
        
        // $idPedido=12;
        // $pedido = Pedido::findOrFail($idPedido);

        // $carrito = Carrito::where('idCliente','=',$pedido->idCliente)->get();
        // $idCarrito = $carrito[0]->id; 

        // $detalleCarrito= DetalleNotaCarrito::
        // where('detallecarrito.idCarrito','=',$idCarrito)
        // ->where('detallecarrito.estado','=',1)
        // ->get();

        // return $detalleCarrito;

        
        return $calzadoAlmacen;
        // $detallePedido= DetalleNotaPedido::where('detalle_Pedido.idPedido','=',11)->get();
        // return $detallePedido;

        

        $pedido = Pedido::
        // join('repartidores','repartidores.id','=','pedido.idRepartidor')
            join('clientes','clientes.id','=','pedido.idCliente')
            ->select(
                "pedido.id",
                "pedido.fecha",
                "pedido.fechaentrega",
                "pedido.hora",
                "pedido.horaentrega",
                "pedido.tiempoentrega",
                "pedido.montoTotal",
                "pedido.estado",
                "pedido.idUbicacion",
                "pedido.idRepartidor",
                "pedido.idCliente",
            )
            ->orderBy('pedido.id','desc')
            // ->where('clientes.nombre','LIKE','%'.$searchText.'%')
            ->paginate(10);
            return $pedido;

        // $idCalzadoAlmacen = 
        // CalzadoAlmacen::select('calzado_almacen.id as idCalzadoAlmacen')->
        // join('calzados','calzados.id','=','calzado_almacen.idCalzado')
        // ->join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
        // ->where('idAlmacen','=',2)
        // ->where('idCalzado','=',66)
        // ->get();
        // return $idCalzadoAlmacen[0];

    //     $horaA=date('H:i:s');

    //     $tiempo= "23:12:59";

    //     $hA= date('H');
    //     $iA=date('i');
    //     $sA=date('s');

        

    // // obtengo segundos
    //     $substrsegundo= substr($tiempo,6);
    //     $st= $substrsegundo;
    // // minutos
    //     $substr= substr($tiempo,3);
    //     $it=substr($substr,0,2);

    // //hora
    //     $ht= substr($tiempo,0,2);


    //     $ss = $sA + $st;
    //     $si = $iA + $it;
    //     $sh = $hA + $ht;
    //     // suma segundo con condicion
    //     if ($ss > 60) {
    //         $rss=$ss-60;
    //         $ss=$rss;

    //         $si=$si + 1;
    //     }

    //     if ($ss == 60) {
    //         $ss="00";

    //         $si=$si + 1;
    //     }

    //     // suma minuto con condicion

    //     if ($si > 60) {
    //         $rss=$si-60;
    //         $si=$rss;

    //         $sh=$sh + 1;
    //     }

    //     if ($si == 60) {
    //         $si="00";

    //         $sh=$sh + 1;
    //     }

    //     //suma hora con condicion

    //     if ($sh > 24) {
    //         $rss=$sh-24;
    //         $sh=$rss;

    //         // $si=$si + 1;
    //     }

    //     if ($sh == 24) {
    //         $sh="00";

    //         // $si=$si + 1;
    //     }

    //     if ($ss <10) {
    //         $ss="0".$ss;
    //     }

    //     if ($si <10) {
    //         $si="0".$si;
    //     }

    //     if ($sh <10) {
    //         $sh="0".$sh;
    //     }
        
    //     return $sh.':'.$si.':'.$ss;

    //     return [
    //         'hora'=>$ht,
    //         'minuto'=>$it,
    //         'segundo'=> $st,

    //         'horaActual'=>$hA,
    //         'minutoActual'=>$iA,
    //         'segubdoActual'=>$sA,

    //         'sumasegundo' =>$ss,
    //         'sumaminuto' =>$si,
    //         'sumahora' =>$sh
    //     ];

        




        // $obj = Carrito::Where('idCliente','=',3)
        // ->get();

        // $detallecarrito =DetalleCarrito::where('idCarrito','=',$obj[0]->id)
        // ->get();

        // $array=[];
        // foreach ($detallecarrito as $key => $value) {
        //     array_push($array,$value->id);
        // }

        // return $array;

        // $carrito = Carrito::join('clientes','clientes.id','carrito.idCliente')
        // ->join('detallecarrito','detallecarrito.idCarrito','carrito.id')
        // ->where("clientes.id","=",3)
        // ->get();

        // return $carrito;

        // $c = Carrito::where("idCliente","=",3)->get();
        // return $c[0]->id;
        // $criterio = "marcas";
        // $atributo = "";
        // $idTipo = 1;
        // $searchText = "sjhkjhsk";
        // if($criterio=='categorias'){$atributo = 'nombre';}
        // if($criterio=='marcas'){$atributo = 'nombre';}
        // if($criterio=='calzados'){$atributo = 'descripcion';}


        
        // $attr = $this->atributo;

        // $calzado = Calzado::select(
        //     "calzados.id as idCalzado",
        //     "calzados.descripcion",
        //     "calzados.precioVenta as precio",
        //     "calzados.imagen as img",
        //     "calzados.idMarcaModelo",
        //     "tipo_calzados.tipo",
        //     "categorias.nombre as categoria",
        //     "marcas.nombre as marca",
        //     "marcas.id as idMarca",
        //     "categorias.id as idCategoria",
        // )->
        // join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
        // ->join('categorias','categorias.id','=','calzados.idCategoria')
        // ->join('marca_modelos','marca_modelos.id','=','calzados.idMarcaModelo')
        // ->join('marcas','marcas.id','=','marca_modelos.idMarca')
        // ->where('tipo_calzados.id','=',$idTipo)
        // ->where($criterio.'.'.$atributo,'LIKE','%'.$searchText.'%')
        // ->get();

        // if($calzado){
        //     $calzado = Calzado::select(
        //         "calzados.id as idCalzado",
        //         "calzados.descripcion",
        //         "calzados.precioVenta as precio",
        //         "calzados.imagen as img",
        //         "calzados.idMarcaModelo",
        //         "tipo_calzados.tipo",
        //         "categorias.nombre as categoria",
        //         "marcas.nombre as marca",
        //         "marcas.id as idMarca",
        //         "categorias.id as idCategoria",
        //     )->
        //     join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
        //     ->join('categorias','categorias.id','=','calzados.idCategoria')
        //     ->join('marca_modelos','marca_modelos.id','=','calzados.idMarcaModelo')
        //     ->join('marcas','marcas.id','=','marca_modelos.idMarca')
        //     ->where('tipo_calzados.id','=',$idTipo)
        //     ->get();    
        // }


        // return $calzado;

        // $calzado = Calzado::
        // join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')->where('tipo_calzados.id','=',1)->get();
        // // $criterio = 'categorias';

        // return $calzado;


        // $searchCodigo = "Manaco";
        // $idAlamcen = 1;
        // $criterio = 'marcas';

        // if($criterio == 'calzados'){
            
        //     $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
        //     ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
        //     ->join('categorias','categorias.id','=','calzados.idCategoria')

        //     ->select('categorias.nombre as categoria',
        //             'calzados.id as idCalzado',
        //             'calzados.descripcion',
        //             'calzados.imagen',
        //             'calzados.codigo',
        //             'calzados.precioVenta',
        //             'calzados.precioCompra',
        //             'almacenes.id as idAlmacen',
        //             'almacenes.sigla',
        //             'calzado_almacen.id as idCalzadoAlmacen',
        //             )
        //     ->where($criterio.'.descripcion','LIKE','%'.$searchCodigo.'%')
        //     ->where('almacenes.id','=',$idAlamcen)
        //     ->orWhere($criterio.'.codigo','=',$searchCodigo)
        //     ->paginate(1);
        //     return $calzado;
        // }
        // if($criterio == 'categorias'){
        //     $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
        //     ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
        //     ->join('categorias','categorias.id','=','calzados.idCategoria')

        //     ->select('categorias.nombre as categoria',
        //             'calzados.id as idCalzado',
        //             'calzados.descripcion',
        //             'calzados.imagen',
        //             'calzados.codigo',
        //             'calzados.precioVenta',
        //             'calzados.precioCompra',
        //             'almacenes.id as idAlmacen',
        //             'almacenes.sigla',
        //             'calzado_almacen.id as idCalzadoAlmacen',
        //             )
        //     ->where('almacenes.id','=',$idAlamcen)
        //     ->where($criterio.'.nombre','LIKE','%'.$searchCodigo.'%')
        //     ->paginate(1);
        //     return $calzado;
        // }
        // if($criterio == 'tipo_calzados'){
        //     $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
        //     ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
        //     ->join('categorias','categorias.id','=','calzados.idCategoria')
        //     ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
        //     ->select('categorias.nombre as categoria',
        //             'calzados.id as idCalzado',
        //             'calzados.descripcion',
        //             'calzados.imagen',
        //             'calzados.codigo',
        //             'calzados.precioVenta',
        //             'calzados.precioCompra',
        //             'almacenes.id as idAlmacen',
        //             'almacenes.sigla',
        //             'calzado_almacen.id as idCalzadoAlmacen',
        //             'tipo_calzados.tipo as tipo',
        //             )
        //     ->where('almacenes.id','=',$idAlamcen)
        //     ->where($criterio.'.tipo','LIKE','%'.$searchCodigo.'%')
        //     ->paginate(1);
        //     return $calzado;
        // }

        // if($criterio == 'marcas'){
        //     $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
        //     ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
        //     ->join('categorias','categorias.id','=','calzados.idCategoria')
        //     ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
        //     ->join('marca_modelos','marca_modelos.id','calzados.idMarcaModelo')
        //     ->join('marcas','marcas.id','=','marca_modelos.idMarca')
        //     ->select('categorias.nombre as categoria',
        //             'calzados.id as idCalzado',
        //             'calzados.descripcion',
        //             'calzados.imagen',
        //             'calzados.codigo',
        //             'calzados.precioVenta',
        //             'calzados.precioCompra',
        //             'almacenes.id as idAlmacen',
        //             'almacenes.sigla',
        //             'calzado_almacen.id as idCalzadoAlmacen',
        //             'tipo_calzados.tipo as tipo',
        //             )
        //     ->where('almacenes.id','=',$idAlamcen)
        //     ->where($criterio.'.nombre','LIKE','%'.$searchCodigo.'%')
        //     ->paginate(1);
        //     return $calzado;
        // }
        // $sw = 0;
        // $existe = CalzadoAlmacen::where('idAlmacen','=',1)
        //                          ->where('idCalzado','=',1)
        //                          ->get();
        // if (count($existe)) {
        //     $sw = 1;
        // }
        // return $sw;

        // $calzadoAlmacen = CalzadoAlmacen::where('idAlmacen','=',1)
        // ->where('idCalzado','=',1)
        // ->get();



        // return $calzadoAlmacen[0]->id;

        

        

    }
    public function existeCalzado($idCalzado,$idAlmacen){
        $sw = false;
        $existe = CalzadoAlmacen::where('idAlmacen','=',$idAlmacen)
                                 ->where('idCalazado','=',$idCalzado)
                                 ->get();
        if (count($existe)) {
            $sw = true;
        }
        return $sw;
    }
}

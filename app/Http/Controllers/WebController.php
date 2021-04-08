<?php

namespace App\Http\Controllers;

use App\Models\Calzado;
use App\Models\Categoria;
use App\Models\DetallePedido;
use App\Models\Marca;
use App\Models\Pedido;
use App\Models\TipoCalzado;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function inicio(){
            
            return view('layouts.pages.inicio');   
    }
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
    public function sumarHoras($hora1,$hora2){
        $arrayHoras  = array($hora1, $hora2);

        
    }

    public function guardarPedido(Request $request){
        
        
        $arrayCalzado  = $request->arrayCalzado;
        $arrayCantidad = $request->arrayCantidad;
        $arraySubTotal = $request->arraySubTotal;
        $arrayTalla    = $request->arrayTalla;
        
        
        
        $id = auth()->id();

        $ubicacion = new Ubicacion();
        $ubicacion->latitud = $request->latitud;
        $ubicacion->longitud = $request->longitud;
        $ubicacion->referencia = $request->referencia;
        $ubicacion->url = $request->link;
        $ubicacion->save();


        $pedido = new Pedido();
        $pedido->estado = 0;
        $pedido->fecha = date('y-m-d');
        $pedido->fechaentrega = date('y-m-d');
        $pedido->hora = date('H:s:i');
        $pedido->horaentrega = date('H:s:i');
        $pedido->tiempoentrega = $request->tiempo;
        $pedido->montototal = $request->total;
        $pedido->idUser = Auth::id();
        $pedido->idRepartidor = null;
        $pedido->idCliente = Auth::id();
        $pedido->idUbicacion = $ubicacion->id;
        $pedido->save();
        
        for ($i=0; $i < $request->c; $i++) { 
            $detallePedido = new DetallePedido();
            $detallePedido->cantidad = $arrayCantidad[$i];
            $detallePedido->subTotal = $arraySubTotal[$i];
            $detallePedido->idPedido = $pedido->id;
            $detallePedido->idCalzadoAlmacen = null;
            $detallePedido->save();
        }
    }


    public function marcas(Request $request){
        $marca = Marca::findOrFail($request->id);
        return view('layouts.pages.marca.marcas',[
            "marca" => $marca
        ]);
    }
    public function tipos(Request $request){
        $tipo = TipoCalzado::findOrFail($request->id);
        return view('layouts.pages.tipo.tipos',[    
            "tipo" => $tipo 
        ]);

    }
    public function categorias(Request $request){
        $categoria = Categoria::findOrFail($request->id);
        
        return view('layouts.pages.categoria.categorias',[
            "categoria" => $categoria
        ]);

    }


    
    // Detalle Marcas
    public function detalleCalzado(Request $request){
        
        $calzado = Calzado::findOrFail($request->id);
        return view('layouts.pages.marca.detalleCalzado',[
            'calzado'=> $calzado
        ]);
    }
    
}

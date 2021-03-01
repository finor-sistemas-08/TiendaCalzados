<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\MarcaModelo;
use App\Models\TIpoCalzados;

class ProductoController extends Controller
{
    public function mostrar(Request $request){
        $producto=Producto::select( 'productos.id',
                                    'productos.precioVenta',
                                    'productos.precioCompra',
                                    'tipo_calzados.tipo',
                                    'categorias.nombre as categoria',
                                    'categorias.subcategoria',
                                    'marca_modelos.talla',
                                    'marca_modelos.color',
                                    'marca_modelos.id as idMarcaModelo')
        ->join('tipo_calzados','tipo_calzados.id','=','productos.idTipoCalzado')
        ->join('categorias','categorias.id','=','productos.idCategoria')
        ->join('marca_modelos','marca_modelos.id','=','productos.idMarcaModelo')
        ->get();
        // if($request){
        //     $query = trim($request->get('searchText'));
        //     $marca = Marca::select('id','nombre')
        //     ->where('nombre','LIKE','%'.$query.'%')
        //     ->paginate(2);
        // }else{
        //     $marca = Marca::paginate(1);
        // }


        return view('pages.producto.mostrar', [
            'productos'=>$producto
        ]);

        // return $producto;

    }
    
    public function crear(){
        return view('pages.producto.insertar');
    }
    public function insertar(Request $request){

        $marcaModelo            = new MarcaModelo();
        $marcaModelo->talla     = $request->get('talla');
        $marcaModelo->color     = $request->get('color');
        $marcaModelo->idMarca   = $request->get('idMarca');
        $marcaModelo->idModelo  = $request->get('idModelo');
        $marcaModelo->save();

        $producto                  = new Producto();
        $producto->precioVenta     = $request->get('precioVenta');
        $producto->precioCompra    = $request->get('precioCompra');
        $producto->imagen          = '';
        $producto->idCategoria     = $request->get('idCategoria');
        $producto->idMarcaModelo   = $marcaModelo->id;
        $producto->idTipoCalzado   = $request->get('idTipoCalzado');
        $producto->save();

        return redirect('/producto/mostrar');

    }
    public function actualizar(Request $request){
        $marca            = Marca::findOrFail($request->id);
        $marca->nombre    = $request->get('nombre');
        $marca->update();


        return redirect('/marca/mostrar');
    }
    public function eliminar(Request $request){
        $marca             = Marca::findOrFail($request->id);
        $marca->delete();

        return redirect('/marca/mostrar');
    }
}

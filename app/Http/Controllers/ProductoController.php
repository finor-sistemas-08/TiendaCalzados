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
        
        if ($request) {
            $query = trim($request->get('searchText'));
            $producto=Producto::select( 'productos.id',
            'productos.nombre',
            'productos.precioVenta',
            'productos.precioCompra',
            'tipo_calzados.tipo',
            'categorias.nombre as categoria',
            'marca_modelos.talla',
            'marca_modelos.color',
            'marca_modelos.idMarca',
            'marca_modelos.idModelo',
            'marca_modelos.id as idMarcaModelo',
            'marcas.nombre as marca'
            )
            ->join('tipo_calzados','tipo_calzados.id','=','productos.idTipoCalzado')
            ->join('categorias','categorias.id','=','productos.idCategoria')
            ->join('marca_modelos','marca_modelos.id','=','productos.idMarcaModelo')
            ->join('marcas','marcas.id','=','marca_modelos.idMarca')
            ->orWhere('productos.nombre','LIKE','%'.$query.'%')
            ->orWhere('marcas.nombre','LIKE','%'.$query.'%')
            ->paginate(10);
        }else{
            $producto=Producto::select( 'productos.id',
            'productos.nombre',
            'productos.precioVenta',
            'productos.precioCompra',
            'tipo_calzados.tipo',
            'categorias.nombre as categoria',
            'marca_modelos.talla',
            'marca_modelos.color',
            'marca_modelos.idMarca',
            'marca_modelos.idModelo',
            'marca_modelos.id as idMarcaModelo'
            )
            ->join('tipo_calzados','tipo_calzados.id','=','productos.idTipoCalzado')
            ->join('categorias','categorias.id','=','productos.idCategoria')
            ->join('marca_modelos','marca_modelos.id','=','productos.idMarcaModelo')
            ->paginate(10);
        }

        $marcasModelos = MarcaModelo::all();    
        return view('pages.producto.mostrar', [
            'productos'     => $producto,
            'marcasModelos' => $marcasModelos,
            'searchText'    => $query
        ]);
    }
    
 
    public function insertar(Request $request){
       
        $producto                  = new Producto();
        $producto->nombre          = $request->get('nombre');
        $producto->precioVenta     = $request->get('precioVenta');
        $producto->precioCompra    = $request->get('precioCompra');
        $producto->imagen          = '';
        $producto->idCategoria     = $request->get('idCategoria');
        $producto->idMarcaModelo   = $request->idMarcaModelo;
        $producto->idTipoCalzado   = $request->get('idTipoCalzado');
        $producto->save();

        return redirect('/producto/mostrar');

    }
    public function actualizar(Request $request){
        $producto                  = Producto::findOrFail($request->id);
        $producto->nombre          = $request->get('nombre');
        $producto->precioVenta     = $request->get('precioVenta');
        $producto->precioCompra    = $request->get('precioCompra');
        $producto->imagen          = '';
        $producto->idCategoria     = $request->get('idCategoria');
        $producto->idMarcaModelo   = $request->idMarcaModelo;
        $producto->idTipoCalzado   = $request->get('idTipoCalzado');
        $producto->update();


        return redirect('/producto/mostrar');
    }
    public function eliminar(Request $request){
        $producto             = Producto::findOrFail($request->id);
        $producto->delete();

        return redirect('/producto/mostrar');
    }
}

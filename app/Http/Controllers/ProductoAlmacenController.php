<?php

namespace App\Http\Controllers;
use App\Models\ProductoAlmacen;
use Illuminate\Http\Request;


class ProductoAlmacenController extends Controller
{
    public function mostrar(Request $request){
        $productoAlmacen=ProductoAlmacen::select('producto_almacen.id',
                                                 'producto_almacen.stock',
                                                 'productos.nombre as producto',        
                                                 'categorias.nombre as categoria',
                                                 'tipo_calzados.tipo as tipo',
                                                 'marca_modelos.id as idMarcaModelo',        
                                                 'marcas.nombre as marca',
                                                 'modelos.nombre as modelo',
                                                 'almacenes.sigla as almacen'

        )
        ->join('productos','productos.id','=','producto_almacen.idProducto')
        ->join('categorias','categorias.id','=','productos.idCategoria')
        ->join('tipo_calzados','tipo_calzados.id','=','productos.idTipoCalzado')
        ->join('marca_modelos','marca_modelos.id','=','productos.idMarcaModelo')
        ->join('marcas','marcas.id','=','marca_modelos.idMarca')
        ->join('modelos','modelos.id','=','marca_modelos.idModelo')
        ->join('almacenes','almacenes.id','=','producto_almacen.idAlmacen')

        ->get();
        // if($request){
            // $query = trim($request->get('searchText'));
            // $productoAlmacen = ProductoAlmacen::select('id','sigla')
            // ->where('','LIKE','%'.$query.'%')
            // ->paginate(2);
        // }else{
            // $productoAlmacen = ProductoAlmacen::paginate(1);
        // }

        // return $productoAlmacen;

        return view('pages.productoAlmacen.mostrar',[
            'productoAlmacenes' => $productoAlmacen, 
            // 'searchText'=>$query
        ]);
    }

    public function crear(){
        return view('pages.productoAlmacen.insertar');
    }
    public function insertar(Request $request){
        $productoAlmacen            = new ProductoAlmacen();
        $productoAlmacen->sigla    = $request->get('sigla');
        $productoAlmacen->save();

        return redirect('/almacen/mostrar');

    }
    public function actualizar(Request $request){
        $productoAlmacen            = ProductoAlmacen::findOrFail($request->id);
        $productoAlmacen->sigla    = $request->get('sigla');
        $productoAlmacen->update();


        return redirect('/almacen/mostrar');
    }
    public function eliminar(Request $request){
        $productoAlmacen             = ProductoAlmacen::findOrFail($request->id);
        $productoAlmacen->delete();

        return redirect('/almacen/mostrar');
    } 
}

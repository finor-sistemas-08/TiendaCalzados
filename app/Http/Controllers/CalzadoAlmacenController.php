<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalzadoAlmacen;


class CalzadoAlmacenController extends Controller
{
    public function mostrar(Request $request){

        if ($request) {
        $query = trim($request->get('searchText'));
        $calzadoAlmacen=CalzadoAlmacen::select('calzado_almacen.id',
                                                 'calzado_almacen.stock',
                                                 'calzados.descripcion as calzado',        
                                                 'categorias.nombre as categoria',
                                                 'tipo_calzados.tipo as tipo',
                                                 'marca_modelos.id as idMarcaModelo',        
                                                 'marcas.nombre as marca',
                                                 'modelos.nombre as modelo',
                                                 'almacenes.sigla as almacen'

        )
        ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
        ->join('categorias','categorias.id','=','calzados.idCategoria')
        ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
        ->join('marca_modelos','marca_modelos.id','=','calzados.idMarcaModelo')
        ->join('marcas','marcas.id','=','marca_modelos.idMarca')
        ->join('modelos','modelos.id','=','marca_modelos.idModelo')
        ->join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
        ->where('calzados.descripcion','LIKE','%'.$query.'%')
        ->paginate(10);

        }else {
            $calzadoAlmacen=CalzadoAlmacen::select('calzado_almacen.id',
            'calzado_almacen.stock',
            'calzados.descripcion as calzado',        
            'categorias.nombre as categoria',
            'tipo_calzados.tipo as tipo',
            'marca_modelos.id as idMarcaModelo',        
            'marcas.nombre as marca',
            'modelos.nombre as modelo',
            'almacenes.sigla as almacen'

            )
            ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
            ->join('categorias','categorias.id','=','calzados.idCategoria')
            ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
            ->join('marca_modelos','marca_modelos.id','=','calzados.idMarcaModelo')
            ->join('marcas','marcas.id','=','marca_modelos.idMarca')
            ->join('modelos','modelos.id','=','marca_modelos.idModelo')
            ->join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')

            ->get();

        }

        // if($request){
            // $query = trim($request->get('searchText'));
            // $calzadoAlmacen = CalzadoAlmacen::select('id','sigla')
            // ->where('','LIKE','%'.$query.'%')
            // ->paginate(2);
        // }else{
            // $calzadoAlmacen = CalzadoAlmacen::paginate(1);
        // }

        // return $calzadoAlmacen;

        return view('pages.calzadoAlmacen.mostrar',[
            'calzadoAlmacenes' => $calzadoAlmacen, 
            // 'searchText'=>$query
        ]);
    }

    public function crear(){
        return view('pages.calzadoAlmacen.insertar');
    }
    public function insertar(Request $request){
        $calzadoAlmacen            = new CalzadoAlmacen();
        $calzadoAlmacen->sigla    = $request->get('sigla');
        $calzadoAlmacen->save();

        return redirect('/almacen/mostrar');

    }
    public function actualizar(Request $request){
        $calzadoAlmacen            = CalzadoAlmacen::findOrFail($request->id);
        $calzadoAlmacen->sigla    = $request->get('sigla');
        $calzadoAlmacen->update();


        return redirect('/almacen/mostrar');
    }
    public function eliminar(Request $request){
        $calzadoAlmacen             = CalzadoAlmacen::findOrFail($request->id);
        $calzadoAlmacen->delete();

        return redirect('/almacen/mostrar');
    } 
}

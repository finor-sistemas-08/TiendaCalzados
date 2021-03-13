<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calzado;
use App\Models\MarcaModelo;
use Illuminate\Support\Facades\Storage;



class CalzadoController extends Controller
{
    public function mostrar(Request $request){
        
        if ($request) {
            $query = trim($request->get('searchText'));
            $calzado=Calzado::select( 'calzados.id',
            'calzados.nombre',
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
            ->orWhere('calzados.nombre','LIKE','%'.$query.'%')
            ->orWhere('marcas.nombre','LIKE','%'.$query.'%')
            ->paginate(10);
        }else{
            $calzado=Calzado::select( 'calzados.id',
            'calzados.nombre',
            'calzados.imagen',
            'calzados.precioVenta',
            'calzados.precioCompra',
            'tipo_calzados.tipo',
            'categorias.nombre as categoria',
            'marca_modelos.talla',
            'marca_modelos.color',
            'marca_modelos.idMarca',
            'marca_modelos.idModelo',
            'marca_modelos.id as idMarcaModelo'
            )
            ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
            ->join('categorias','categorias.id','=','calzados.idCategoria')
            ->join('marca_modelos','marca_modelos.id','=','calzados.idMarcaModelo')
            ->paginate(10);
        }

        $marcasModelos = MarcaModelo::all();    
        return view('pages.calzado.mostrar', [
            'calzados'     => $calzado,
            'marcasModelos' => $marcasModelos,
            'searchText'    => $query
        ]);
    }
    
 
    public function insertar(Request $request){
       
        $calzado                  = new Calzado();
        $calzado->nombre          = $request->get('nombre');
        $calzado->precioVenta     = $request->get('precioVenta');
        $calzado->precioCompra    = $request->get('precioCompra');

        if($request->file('imagen')){
            $path = Storage::disk('public')->put('imagenes',$request->file('imagen'));
            $calzado->imagen = $path; 
        }else{
            $calzado->imagen = 'imagenes/calzado.png';
        }
        
        
        $calzado->idCategoria     = $request->get('idCategoria');
        $calzado->idMarcaModelo   = $request->idMarcaModelo;
        $calzado->idTipoCalzado   = $request->get('idTipoCalzado');
        $calzado->save();

        return redirect('/calzado/mostrar');

    }
    public function actualizar(Request $request){
        $calzado                  = Calzado::findOrFail($request->id);
        $calzado->nombre          = $request->get('nombre');
        $calzado->precioVenta     = $request->get('precioVenta');
        $calzado->precioCompra    = $request->get('precioCompra');
        $calzado->imagen          = '';
        $calzado->idCategoria     = $request->get('idCategoria');
        $calzado->idMarcaModelo   = $request->idMarcaModelo;
        $calzado->idTipoCalzado   = $request->get('idTipoCalzado');
        $calzado->update();


        return redirect('/calzado/mostrar');
    }
    public function eliminar(Request $request){
        $calzado             = Calzado::findOrFail($request->id);
        $calzado->delete();

        return redirect('/calzado/mostrar');
    }
}

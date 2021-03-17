<?php

namespace App\Http\Controllers;

use App\Models\MarcaModelo;
use App\Models\Marca;
use App\Models\Modelo;

use Illuminate\Http\Request;

class MarcaModeloController extends Controller
{
    public function mostrar(Request $request){

        if($request){
            $query = trim($request->get('searchText'));
            $marcaModelo = MarcaModelo::select(   'marca_modelos.id',
                                            'marca_modelos.talla',
                                            'marca_modelos.color',
                                            'marcas.nombre as marca',
                                            'modelos.nombre as modelo')
            ->join('marcas','marcas.id','=','marca_modelos.idMarca')
            ->join('modelos','modelos.id','=','marca_modelos.idModelo')
            ->where('marcas.nombre','LIKE','%'.$query.'%')
            ->orWhere('modelos.nombre','LIKE','%'.$query.'%')
            ->orWhere('marca_modelos.talla','LIKE','%'.$query.'%')
            ->orWhere('marca_modelos.color','LIKE','%'.$query.'%')
            ->paginate(10);
        }else{
            $marcaModelo = MarcaModelo::paginate(10);
        }

        return view('pages.MarcaModelo.mostrar',[
            'marcaModelos' => $marcaModelo, 'searchText'=>$query
        ]);
    }
    public function insertar(Request $request){
        $marcaModelo                  = new MarcaModelo();
        $marcaModelo->talla            = $request->get('talla');
        $marcaModelo->color           = $request->get('color');
        $marcaModelo->idMarca    = $request->get('idMarca');
        $marcaModelo->idModelo    = $request->get('idModelo');

        $marcaModelo->save();

        return redirect('/marcaModelo/mostrar');

    }
    public function actualizar(Request $request){
        $marcaModelo                  = MarcaModelo::findOrFail($request->id);
        $marcaModelo->talla            = $request->get('talla');
        $marcaModelo->color           = $request->get('color');
        $marcaModelo->idMarca    = $request->get('idMarca');
        $marcaModelo->idModelo    = $request->get('idModelo');

        $marcaModelo->update();

        return redirect('/marcaModelo/mostrar');

    }
    public function eliminar(Request $request){
        $marcaModelo             = MarcaModelo::findOrFail($request->id);
        $marcaModelo->delete();

        return redirect('/marcaModelo/mostrar');
    }
}

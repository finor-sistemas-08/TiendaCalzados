<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoCalzado;


class TipoCalzadoController extends Controller
{
    public function mostrar(Request $request){
        $tipoCalzado=TipoCalzado::all();
        if($request){
            $query = trim($request->get('searchText'));
            $tipoCalzado = TipoCalzado::select('id','tipo')
            ->where('tipo','LIKE','%'.$query.'%')
            ->paginate(5);
        }else{
            $tipoCalzado = TipoCalzado::paginate(1);
        }

        return view('pages.tipoCalzado.mostrar',[
            'tipoCalzados' => $tipoCalzado, 'searchText'=>$query
        ]);
    }
    public function insertar(Request $request){
        $tipoCalzado            = new TipoCalzado();
        $tipoCalzado->tipo    = $request->get('tipo');
        $tipoCalzado->save();

        return redirect('/tipoCalzado/mostrar');

    }
    public function actualizar(Request $request){
        $tipoCalzado            = TipoCalzado::findOrFail($request->id);
        $tipoCalzado->tipo    = $request->get('tipo');
        $tipoCalzado->update();

        return redirect('/tipoCalzado/mostrar');
    }
    public function eliminar(Request $request){
        $tipoCalzado             = TipoCalzado::findOrFail($request->id);
        $tipoCalzado->delete();

        return redirect('/tipoCalzado/mostrar');
    }
}

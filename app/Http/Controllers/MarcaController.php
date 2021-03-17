<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function mostrar(Request $request){
        $marca=Marca::all();
        if($request){
            $query = trim($request->get('searchText'));
            $marca = Marca::select('id','nombre')
            ->where('nombre','LIKE','%'.$query.'%')
            ->paginate(2);
        }else{
            $marca = Marca::paginate(5);
        }

        return view('pages.marca.mostrar',[
            'marcas' => $marca, 'searchText'=>$query
        ]);
    }
    public function insertar(Request $request){
        $marca            = new Marca();
        $marca->nombre    = $request->get('nombre');
        $marca->save();

        return redirect('/marca/mostrar');

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

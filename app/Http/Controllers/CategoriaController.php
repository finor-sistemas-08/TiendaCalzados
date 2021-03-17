<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function mostrar(Request $request){
        $categoria=Categoria::all();
        if($request){
            $query = trim($request->get('searchText'));
            $categoria = Categoria::select('id','nombre')
            ->where('nombre','LIKE','%'.$query.'%')
            ->paginate(5);
        }else{
            $categoria = Categoria::paginate(5);
        }

        return view('pages.categoria.mostrar',[
            'categorias' => $categoria, 'searchText'=>$query
        ]);
    }
    public function insertar(Request $request){
        $categoria            = new Categoria();
        $categoria->nombre    = $request->get('nombre');
        $categoria->save();

        return redirect('/categoria/mostrar');

    }
    public function actualizar(Request $request){
        $categoria            = Categoria::findOrFail($request->id);
        $categoria->nombre    = $request->get('nombre');
        $categoria->update();


        return redirect('/categoria/mostrar');
    }
    public function eliminar(Request $request){
        $categoria             = Categoria::findOrFail($request->id);
        $categoria->delete();

        return redirect('/categoria/mostrar');
    }

    public function buscar(){
        // return 'hi';

        $cliente = Cliente::findOrFail(3);
        
        return $cliente->nombre;
    }
}

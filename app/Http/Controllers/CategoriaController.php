<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function mostrar(Request $request){
        $categoria=Categoria::all();
        if($request){
            $query = trim($request->get('searchText'));
            $categoria = Categoria::select('id','nombre','subCategoria')
            ->where('nombre','LIKE','%'.$query.'%')
            ->paginate(2);
        }else{
            $categoria = Categoria::paginate(1);
        }

        return view('pages.categoria.mostrar',[
            'categorias' => $categoria, 'searchText'=>$query
        ]);
    }
    public function insertar(Request $request){
        $categoria            = new Categoria();
        $categoria->nombre    = $request->get('nombre');
        $categoria->subCategoria    = $request->get('subCategoria');
        $categoria->save();

        return redirect('/categoria/mostrar');

    }
    public function actualizar(Request $request){
        $categoria            = Categoria::findOrFail($request->id);
        $categoria->nombre    = $request->get('nombre');
        $categoria->subCategoria    = $request->get('subCategoria');
        $categoria->update();


        return redirect('/categoria/mostrar');
    }
    public function eliminar(Request $request){
        $categoria             = Categoria::findOrFail($request->id);
        $categoria->delete();

        return redirect('/categoria/mostrar');
    }
}

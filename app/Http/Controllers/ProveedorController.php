<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function mostrar(Request $request){
        $proveedor=Proveedor::all();
        if($request){
            $query = trim($request->get('searchText'));
            $proveedor = Proveedor::select('id','nombre','apellidos','correo','telefono','direccion')
            ->where('nombre','LIKE','%'.$query.'%')
            ->paginate(5);
        }else{
            $proveedor = Proveedor::paginate(1);
        }

        return view('pages.proveedor.mostrar',[
            'proveedores' => $proveedor, 'searchText'=>$query
        ]);
    }
    public function insertar(Request $request){
        $proveedor            = new Proveedor();
        $proveedor->nombre    = $request->get('nombre');
        $proveedor->apellidos    = $request->get('apellidos');
        $proveedor->correo    = $request->get('correo');
        $proveedor->telefono    = $request->get('telefono');
        $proveedor->direccion    = $request->get('direccion');

        $proveedor->save();

        return redirect('/proveedor/mostrar');

    }
    public function actualizar(Request $request){
        $proveedor            = Proveedor::findOrFail($request->id);
        $proveedor->nombre    = $request->get('nombre');
        $proveedor->apellidos    = $request->get('apellidos');
        $proveedor->correo    = $request->get('correo');
        $proveedor->telefono    = $request->get('telefono');
        $proveedor->direccion    = $request->get('direccion');

        $proveedor->update();


        return redirect('/proveedor/mostrar');
    }
    public function eliminar(Request $request){
        $proveedor             = Proveedor::findOrFail($request->id);
        $proveedor->delete();

        return redirect('/proveedor/mostrar');
    }
}

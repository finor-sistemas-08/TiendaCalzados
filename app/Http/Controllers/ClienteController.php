<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function mostrar(Request $request){
        $cliente=Cliente::all();
        if($request){
            $query = trim($request->get('searchText'));
            $cliente = Cliente::select('id','nombre','apellidos','telefono','correo')
            ->where('nombre','LIKE','%'.$query.'%')
            ->paginate(2);
        }else{
            $cliente = Cliente::paginate(1);
        }

        return view('pages.cliente.mostrar',[
            'clientes' => $cliente, 'searchText'=>$query
        ]);
    }
    public function insertar(Request $request){
        $cliente            = new Cliente();
        $cliente->nombre    = $request->get('nombre');
        $cliente->apellidos    = $request->get('apellidos');
        $cliente->telefono    = $request->get('telefono');
        $cliente->correo    = $request->get('correo');

        $cliente->save();

        return redirect('/cliente/mostrar');

    }
    public function actualizar(Request $request){
        $cliente            = Cliente::findOrFail($request->id);
        $cliente->nombre    = $request->get('nombre');
        $cliente->apellidos    = $request->get('apellidos');
        $cliente->telefono    = $request->get('telefono');
        $cliente->correo    = $request->get('correo');

        $cliente->update();


        return redirect('/cliente/mostrar');
    }
    public function eliminar(Request $request){
        $cliente             = Cliente::findOrFail($request->id);
        $cliente->delete();

        return redirect('/cliente/mostrar');
    }
}

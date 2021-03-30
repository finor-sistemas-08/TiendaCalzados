<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calzado;
use App\Models\CalzadoAlmacen;
use App\Models\MarcaModelo;
use App\Models\Precio;
use Illuminate\Support\Facades\Storage;
// use Picqer\Barcode\BarcodeGeneratorPNG as barcod;
use Picqer;
class CalzadoController extends Controller
{
    public function mostrar(Request $request){
        
        if ($request) {
            $query = trim($request->get('searchText'));
            $calzado=Calzado::select( 'calzados.id',
            'calzados.descripcion',
            'calzados.codigo',
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
            ->orWhere('calzados.descripcion','LIKE','%'.$query.'%')
            ->orWhere('marcas.nombre','LIKE','%'.$query.'%')
            ->paginate(10);
        }else{
            $calzado=Calzado::select( 'calzados.id',
            'calzados.descripcion',
            'calzados.imagen',
            'calzados.codigo',
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
        // $label=$request->get('codigo');


        // $barcode_generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        // $barcode =$barcode_generator->getBarcode($label, $barcode_generator::TYPE_CODE_128);

        $calzado                  = new Calzado();
        $calzado->codigo          = $request->get('codigo');
        $calzado->descripcion     = $request->get('descripcion');
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

        $fecha = date('Y-m-d');

        $precios = new Precio();
        $precios->precioVenta = $request->get('precioVenta');
        $precios->precioCompra = $request->get('precioCompra');
        $precios->fecha = $fecha;
        $precios->idCalzado = $calzado->id;
        $precios->save();
        return redirect('/calzado/mostrar');

    }

    public function crear(){
        $marcaModelo= MarcaModelo::all();
        return view('pages.calzado.crear',[
            'marcasModelos'=>$marcaModelo

        ]);
    }
    public function editar(Request $request){
        $marcaModelo= MarcaModelo::all();

        $calzado = Calzado::findOrFail($request->idCalzado);
        return view('pages.calzado.actualizar',[
            'marcasModelos'=>$marcaModelo,
            'calzado' => $calzado
        ]);
    }

    public function actualizar(Request $request){
        $calzado                  = Calzado::findOrFail($request->id);
        $calzado->codigo          = $request->get('codigo');
        $calzado->precioVenta     = $request->get('precioVenta');
        $calzado->precioCompra    = $request->get('precioCompra');
        
        if($request->hasFile('imagen')){
            $path = Storage::disk('public')->put('imagenes',$request->file('imagen'));
            $calzado->imagen = $path; 
        }
        if($request->get('descripcion')){
            $calzado->descripcion     = $request->get('descripcion');
        }
        $calzado->idCategoria     = $request->get('idCategoria');
        $calzado->idMarcaModelo   = $request->idMarcaModelo;
        $calzado->idTipoCalzado   = $request->get('idTipoCalzado');
        $calzado->update();

        $fecha = date('Y-m-d');

        $precios = new Precio();
        $precios->precioVenta = $request->get('precioVenta');
        $precios->precioCompra = $request->get('precioCompra');
        $precios->fecha = $fecha;
        $precios->idCalzado = $calzado->id;
        $precios->save();


        return redirect('/calzado/mostrar');
    }
   
    public function eliminar(Request $request){
        $calzado             = Calzado::findOrFail($request->id);
        $calzado->delete();

        return redirect('/calzado/mostrar');
    }



}

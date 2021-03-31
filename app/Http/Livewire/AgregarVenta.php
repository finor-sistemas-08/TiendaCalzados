<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Calzado;
use App\Models\CalzadoAlmacen;
use App\Models\DetalleNotaVenta;
use App\Models\Venta;
use Livewire\Component;
use Livewire\WithPagination;

class AgregarVenta extends Component
{
    use WithPagination;
    public $idCliente = null;
    public $idCalzado = 0;
    public $idAlmacen = null;
    public $arrayCalzados = [];
    public $index;
    public $idUser;
    public $messageErrorCliente;
    public $messageErrorStock;


    public $cantidad  ; 
    public $precio   ; 
    public $message;
    public $total = 0;
    public $subTotal=0;

    public $stockActual = false;

    public $stock = 0 ; 

    public $criterio = 'calzados';

    public $vP = false;
    public $searchTextCalzado;
    public $searchTextCliente;
    public $mensajeAlmacen = 'Seleccione un Almacen';
    public $final = false ;
    public $searchCodigo;

    public function render(){
        $searchTextCalzado='%'.$this->searchTextCalzado.'%';
        $searchTextCliente='%'.$this->searchTextCliente.'%';
        $idAlmacen = $this->idAlmacen;
        $criterio = $this->criterio;

        $searchCodigo = $this->searchCodigo;
        $objCalzadoCodigo = $this->buscarCalzadoCodigo($searchCodigo,$idAlmacen);
        $objBusquedaCalzado = $this->criterioBusqueda($searchTextCalzado,$criterio,$idAlmacen);  

        return view('livewire.venta.agregar-venta',[
            'clientes' => Cliente::where('nombre','LIKE','%'.$searchTextCliente.'%')
                                ->orWhere('apellidos','LIKE','%'.$searchTextCliente.'%')
                                ->paginate(10),
            'calzadoSearch' => $objCalzadoCodigo,
            'calzados' => $objBusquedaCalzado
        ]);
    }

    public function agregarCliente($cliente){
        $this->idCliente = $cliente;
    }
    public function seleccionarCliente(){
        
    }
    public function criterioBusqueda($searchText,$criterio,$idAlamcen){
        switch ($criterio) {
            case 'calzados':
                $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
                ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
                ->join('categorias','categorias.id','=','calzados.idCategoria')
    
                ->select('categorias.nombre as categoria',
                        'calzados.id as idCalzado',
                        'calzados.descripcion',
                        'calzados.imagen',
                        'calzados.codigo',
                        'calzados.precioVenta',
                        'calzados.precioCompra',
                        'almacenes.id as idAlmacen',
                        'almacenes.sigla',
                        'calzado_almacen.id as idCalzadoAlmacen',
                        )
                ->where($criterio.'.descripcion','LIKE','%'.$searchText.'%')
                ->where('almacenes.id','=',$idAlamcen)
                ->orWhere($criterio.'.codigo','=',$searchText)
                ->paginate(1);
                return $calzado;
                break;

            case 'categorias':
                $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
                ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
                ->join('categorias','categorias.id','=','calzados.idCategoria')

                ->select('categorias.nombre as categoria',
                        'calzados.id as idCalzado',
                        'calzados.descripcion',
                        'calzados.imagen',
                        'calzados.codigo',
                        'calzados.precioVenta',
                        'calzados.precioCompra',
                        'almacenes.id as idAlmacen',
                        'almacenes.sigla',
                        'calzado_almacen.id as idCalzadoAlmacen',
                        )
                ->where('almacenes.id','=',$idAlamcen)
                ->where($criterio.'.nombre','LIKE','%'.$searchText.'%')
                ->paginate(1);
                return $calzado;
                break;
            case 'tipo_calzados':
                $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
                ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
                ->join('categorias','categorias.id','=','calzados.idCategoria')
                ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
                ->select('categorias.nombre as categoria',
                        'calzados.id as idCalzado',
                        'calzados.descripcion',
                        'calzados.imagen',
                        'calzados.codigo',
                        'calzados.precioVenta',
                        'calzados.precioCompra',
                        'almacenes.id as idAlmacen',
                        'almacenes.sigla',
                        'calzado_almacen.id as idCalzadoAlmacen',
                        'tipo_calzados.tipo as tipo',
                        )
                ->where('almacenes.id','=',$idAlamcen)
                ->where($criterio.'.tipo','LIKE','%'.$searchText.'%')
                ->paginate(1);
                return $calzado;
                break;
            case 'marcas':
                $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
                ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
                ->join('categorias','categorias.id','=','calzados.idCategoria')
                ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
                ->join('marca_modelos','marca_modelos.id','calzados.idMarcaModelo')
                ->join('marcas','marcas.id','=','marca_modelos.idMarca')
                ->select('categorias.nombre as categoria',
                        'calzados.id as idCalzado',
                        'calzados.descripcion',
                        'calzados.imagen',
                        'calzados.codigo',
                        'calzados.precioVenta',
                        'calzados.precioCompra',
                        'almacenes.id as idAlmacen',
                        'almacenes.sigla',
                        'calzado_almacen.id as idCalzadoAlmacen',
                        'tipo_calzados.tipo as tipo',
                        )
                ->where('almacenes.id','=',$idAlamcen)
                ->where($criterio.'.nombre','LIKE','%'.$searchText.'%')
                ->paginate(1);
                return $calzado;
                break;
            default:
                return $calzado = Calzado::paginate(5);
                break;
        }
    }
    public function buscarCalzadoCodigo($searchCodigo,$idAlmacen){
        $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
                                ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
                                ->select('almacenes.id as idAlmacen',
                                        'almacenes.sigla',
                                        'calzados.id as idCalzado',
                                        'calzados.descripcion as calzado',
                                        'calzados.precioVenta',
                                        'calzados.imagen',
                                        'calzado_almacen.id as idCalzadoAlmacen'
                                )
                                ->where('calzado_almacen.idAlmacen','=',$idAlmacen)->
                                where('codigo','=',$searchCodigo)->paginate(3);
        return $calzado;
    }
    public function existe($idCalzado){
        $c = count($this->arrayCalzados);
        $sw = false;
        
        for ($i=0; $i < $c; $i++) { 

            if($this->arrayCalzados[$i]['idCalzados']==$idCalzado){
                $sw = true;
            }
        }
        return $sw;
    }
    public function validarStock($cantidad,$idCalzado,$idAlmacen){
        if(is_null($cantidad)){
            $this->cantidad = 1;
            $cantidad = $this->cantidad;
        }

        $calzado = CalzadoAlmacen::select('stock')
        ->where('idAlmacen','=',$idAlmacen)
        ->where('idCalzado','=',$idCalzado)
        ->get();
        $sw    = false;
        $stock = $calzado[0]->stock;
        if ($stock >= $cantidad) {
            $sw =  true;
        }
        return $sw;
    }

    public function seleccionarCalzado(){
        
        $searchCodigo = $this->searchCodigo;
        $zapato = Calzado::where('codigo','=',$searchCodigo)->get();
        $this->idCalzado = $zapato[0]->id;

        if($this->validarStock($this->cantidad,$this->idCalzado,$this->idAlmacen)){
            if ($this->idCalzado) {

                if (!$this->existe($this->idCalzado)) {
                        
                    $idCalzado =  $this->idCalzado; 
                    $calzado = Calzado::findOrFail($idCalzado);

                    if (is_null($this->precio)) {
                        $this->precio = $calzado->precioVenta;
                    }

                    if(is_null($this->cantidad)){
                        $this->cantidad = 1;  
                    }
                    $subTotal = $this->precio * $this->cantidad;
                    $this->total =  $this->total + $subTotal; 

                            

                    array_push($this->arrayCalzados,[
                        "idCalzados"        => $idCalzado,
                        "nombre"            => $calzado->nombre,
                        "precioVenta"       => $this->precio,
                        "cantidad"          => $this->cantidad,
                        "subTotal"          => $subTotal,
                        "idAlmacen"         => $this->idAlmacen
                    ]);    
                    $this->cantidad = null;
                    $this->precio = null;
                    $this->message = '';
                
                }else{
                    $this->message = 'El Calzado ya fue seleccionado';
                }


            }else{
                $this->message=' Por favor seleccione un calzado';
            }
        }else{
            $this->messageErrorStock ='Stock insuficiente';
        }
    }

    public function agregarCalzado($idCalzado){

        $this->idCalzado = $idCalzado; 
        if($this->validarStock($this->cantidad,$this->idCalzado,$this->idAlmacen)){
        
            if (!$this->existe($this->idCalzado)) {
            
                $calzado = Calzado::findOrFail($idCalzado);

                if ($this->precio == 0) {
                    $this->precio = $calzado->precioVenta;
                }
                if($this->cantidad == 0){
                    $this->cantidad = 1;  
                }

                $subTotal = $this->precio * $this->cantidad;
                $this->total =  $this->total + $subTotal; 

                array_push($this->arrayCalzados,[
                    "idCalzados"        => $this->idCalzado,
                    "nombre"            => $calzado->nombre,
                    "precioVenta"       => $this->precio,
                    "cantidad"          => $this->cantidad,
                    "subTotal"          => $subTotal,
                    "idAlmacen"         => $this->idAlmacen
                ]); 

                $this->cantidad = 0;
                $this->message = '';
            }else{
                $this->message = 'El calzado ya fue asignado';
            }
        }else{
            $this->messageErrorStock ='Stock insuficiente';
        }
        
    } 
    public function guardarDetalle($usuario){
        
        if (!is_null($this->idCliente) ) {
            $fecha = date('Y-m-d');

            $this->idUser =  $usuario;
            $notaVenta = new Venta();
            $notaVenta->fecha  = $fecha;
            $notaVenta->montoTotal  = $this->total;
            $notaVenta->idCliente  = $this->idCliente;
            $notaVenta->idUser  = $usuario;
            $notaVenta->save();

            $c = count($this->arrayCalzados);
            
            for ($i=0; $i < $c ; $i++) { 

                $idCalzadoAlmacen = $this->buscarIdCalzadoAlmacen(
                    $this->arrayCalzados[$i]['idCalzados'],
                    $this->arrayCalzados[$i]['idAlmacen']
                    )->idCalzadoAlmacen;


                $detalleVenta = new DetalleNotaVenta();
                $detalleVenta->cantidad = $this->arrayCalzados[$i]['cantidad']; 
                $detalleVenta->subTotal = $this->arrayCalzados[$i]['subTotal']; 
                $detalleVenta->idCalzadoAlmacen = $idCalzadoAlmacen;
                $detalleVenta->idNotaVenta = $notaVenta->id;
                $detalleVenta->save();

                $calzadoAlmacen = CalzadoAlmacen::findOrFail($idCalzadoAlmacen);
                $stock = $calzadoAlmacen->stock;
                $calzadoAlmacen->stock = $stock - $this->arrayCalzados[$i]['cantidad'];
                $calzadoAlmacen->update();

            }

            $this->final =  true;
        
            
            
        } else {
            $this->messageErrorCliente ='El cliente no se ha seleccionado';
        }
    }

    public function buscarIdCalzadoAlmacen($idCalzado,$idAlmacen){
        $idCalzadoAlmacen = 
        CalzadoAlmacen::select('calzado_almacen.id as idCalzadoAlmacen')->
        join('calzados','calzados.id','=','calzado_almacen.idCalzado')
        ->join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
        ->where('idAlmacen','=',$idAlmacen)
        ->where('idCalzado','=',$idCalzado)
        ->get();
        return $idCalzadoAlmacen[0];
    }

    public function actualizarPrecioStock($i){

        $this->total = $this->total - $this->arrayCalzados[$i]['subTotal'] ;


        $this->arrayCalzados[$i]['cantidad'] = $this->cantidad;
        $this->arrayCalzados[$i]['precioVenta'] = $this->precio;

        $this->arrayCalzados[$i]['subTotal'] = $this->cantidad * $this->precio;


        $this->total = $this->total + $this->arrayCalzados[$i]['subTotal'];


        $this->cantidad  = null;
        $this->precio    = null;
    }
    public function eliminarCalzado($index){
        $this->total =  $this->total - $this->arrayCalzados[$index]['subTotal'];

        array_splice($this->arrayCalzados,$index,1);
    }

    public function verProducto($idCalzado){
        $this->vP = true;
        $this->idCalzado = $idCalzado;
    }
}

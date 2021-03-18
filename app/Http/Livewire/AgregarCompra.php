<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proveedor;
use App\Models\Calzado;
use App\Models\CalzadoAlmacen;
use App\Models\Compra;
use App\Models\DetalleNotaCompra;
use Livewire\WithPagination;

class AgregarCompra extends Component
{
    use WithPagination;
    public $idProveedor;
    public $idCalzado;
    public $idAlmacen = null;
    public $arrayCalzados = [];
    public $index;
    public $message;

    public $cantidad   ; 
    public $precio     ; 
    public $criterio     = 'calzado'; 
    public $total = 0;
    public $subTotal=0;

    public $stock ; 


    public $vP = false;
    public $searchTextCalzado;
    public $searchTextProveedor;
    public $mensajeAlmacen = 'Seleccione un Almacen';
    public $final = false ;

    public function render()
    {
        $searchTextCalzado='%'.$this->searchTextCalzado.'%';
        $searchTextProveedor='%'.$this->searchTextProveedor.'%';
        $idAlmacen = $this->idAlmacen;
        return view('livewire.compra.agregar-compra',[
            'proveedores' => Proveedor::where('nombre','LIKE','%'.$searchTextProveedor.'%')
                                ->orWhere('apellidos','LIKE','%'.$searchTextProveedor.'%')
                                ->paginate(3),
            'calzados' =>CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
                                    ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
                                    ->select('almacenes.id as idAlmacen',
                                             'almacenes.sigla',
                                             'calzados.id as idCalzado',
                                             'calzados.descripcion as calzado',
                                             'calzados.precioVenta',
                                             'calzado_almacen.id as idCalzadoAlmacen'
                                    )
                                    ->where('calzado_almacen.idAlmacen','=',$idAlmacen)
                                    ->where('calzados.descripcion','LIKE','%'.$searchTextCalzado.'%')->paginate(3)
        ]);
    }

    public function agregarProveedor($proveedor){
        $proveedor;
    }
    public function seleccionarProveedor(){
        
    }

    public function agregarCalzado($idCalzado){
        $this->idCalzado = $idCalzado; 
        
        if (!$this->existe($this->idCalzado)) {
        
            $calzado = Calzado::findOrFail($idCalzado);

            if (is_null( $this->cantidad)) {
                $this->cantidad = 1;
                $precio = $this->cantidad;

            } else {
                $precio = $this->cantidad;
            }
            
            if (is_null($this->precio)) {
                $this->precio = $calzado->precioCompra;
                $precioCompra = $this->precio;
            }else{
                $precioCompra = $this->precio;
            }

            $subTotal = $this->precio * $this->cantidad;
            $this->total =  $this->total + $subTotal; 

            array_push($this->arrayCalzados,[
                "idCalzados"        => $this->idCalzado,
                "descripcion"       => $calzado->descripcion,
                "precioCompra"      => $this->precio,
                "cantidad"          => $this->cantidad,
                "subTotal"          => $subTotal,
                "idAlmacen"         => $this->idAlmacen
            ]); 

            $this->cantidad = 0;
            $this->message = '';
        }else{
            $this->message = 'El calzado ya fue asignado';
        }
        
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
    public function seleccionarCalzado(){
        

        if ($this->idCalzado) {
            if (!$this->existe($this->idCalzado)) {
                $calzado = Calzado::findOrFail($this->idCalzado);



                if (is_null($this->precio) ) {
                    $this->precio =  $calzado->precioCompra;
                    $precioCompra = $this->precio;
                }else{
                    $precioCompra = $this->precio;
                }

                if (is_null( $this->cantidad)) {
                    $this->cantidad = 1;
                    $precio = $this->cantidad;

                } else {
                    $precio = $this->cantidad;
                }
                
                if (is_null($this->precio)) {
                    $this->precio = $calzado->precioCompra;
                    $precioCompra = $this->precio;
                }else{
                    $precioCompra = $this->precio;
                }

                
                $subTotal = $this->precio * $this->cantidad;
                $this->total =  $this->total + $subTotal; 

                

                array_push($this->arrayCalzados,[
                    "idCalzados"        => $this->idCalzado,
                    "descripcion"       => $calzado->descripcion,
                    "precioCompra"       => $precioCompra,
                    "cantidad"          => $this->cantidad,
                    "subTotal"          => $subTotal,
                    "idAlmacen"         => $this->idAlmacen
                ]); 

                $this->cantidad = null;
                $this->precio = null;
            } else {
                $this->message = 'El Calzado ya fue seleccionado';
            }
        }else{
            $this->message=' Por favor seleccione un calzado';
        }
        
    }
    public function guardarDetalle($usuario){
        $fecha = date('Y-m-d');
        $this->idUser =  $usuario;

        
        $notaCompra = new Compra();
        $notaCompra->fecha  = $fecha;
        $notaCompra->montoTotal  = $this->total;
        $notaCompra->idProveedor  = $this->idProveedor;
        $notaCompra->idUser  = $usuario;
        $notaCompra->save();

        $c = count($this->arrayCalzados);
        
        for ($i=0; $i < $c ; $i++) { 

            $idCalzadoAlmacen = $this->buscarIdCalzadoAlmacen(
                $this->arrayCalzados[$i]['idCalzados'],
                $this->arrayCalzados[$i]['idAlmacen']
                )->idCalzadoAlmacen;


            $detalleCompra = new DetalleNotaCompra();
            $detalleCompra->cantidad = $this->arrayCalzados[$i]['cantidad']; 
            $detalleCompra->subTotal = $this->arrayCalzados[$i]['subTotal']; 
            $detalleCompra->idCalzadoAlmacen = $idCalzadoAlmacen;
            $detalleCompra->idNotaCompra = $notaCompra->id;
            $detalleCompra->save();

            $calzadoAlmacen = CalzadoAlmacen::findOrFail($idCalzadoAlmacen);
            $stock = $calzadoAlmacen->stock;
            $calzadoAlmacen->stock = $stock + $this->arrayCalzados[$i]['cantidad'];
            $calzadoAlmacen->update();

        }

        $this->final =  true;
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
        $this->arrayCalzados[$i]['precioCompra'] = $this->precio;

        $this->arrayCalzados[$i]['subTotal'] = $this->cantidad * $this->precio;


        $this->total = $this->total + $this->arrayCalzados[$i]['subTotal'];


        $this->cantidad  = null;
        $this->precio    = null;
    }
    public function eliminarCalzado($index){
        array_splice($this->arrayCalzados,$index,1);
    }

}

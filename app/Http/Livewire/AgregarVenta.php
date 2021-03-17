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
    public $idCliente = 0;
    public $idCalzado = 0;
    public $idAlmacen = null;
    public $arrayCalzados = [];
    public $index;
    public $idUser;

    public $cantidad    = 0; 
    public $precio   = 0  ; 
    public $message;
    public $total = 0;
    public $subTotal=0;

    public $stockActual = false;

    public $stock = 0 ; 


    public $vP = false;
    public $searchTextCalzado;
    public $searchTextCliente;
    public $mensajeAlmacen = 'Seleccione un Almacen';
    public $final = false ;


    public function render()
    {
        $searchTextCalzado='%'.$this->searchTextCalzado.'%';
        $searchTextCliente='%'.$this->searchTextCliente.'%';
        $idAlmacen = $this->idAlmacen;
        return view('livewire.venta.agregar-venta',[
            'clientes' => Cliente::where('nombre','LIKE','%'.$searchTextCliente.'%')
                                ->orWhere('apellidos','LIKE','%'.$searchTextCliente.'%')
                                ->paginate(10),
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
                                    ->where('descripcion','LIKE','%'.$searchTextCalzado.'%')->paginate(3)
        ]);
    }
    // agregarCliente({{ $cliente->id }})
    public function agregarCliente($cliente){
        $this->idCliente = $cliente;
    }
    public function seleccionarCliente(){
        

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
                    
                $idCalzado =  $this->idCalzado; 
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
                    "idCalzados"        => $idCalzado,
                    "nombre"            => $calzado->nombre,
                    "precioVenta"       => $this->precio,
                    "cantidad"          => $this->cantidad,
                    "subTotal"          => $subTotal,
                    "idAlmacen"         => $this->idAlmacen
                ]);    
                $this->cantidad = 0;
                $this->message = '';
            
            }else{
                $this->message = 'El Calzado ya fue seleccionado';
            }


        }else{
            $this->message=' Por favor seleccione un calzado';

        }
         
    }

    public function agregarCalzado($idCalzado){
        $this->idCalzado = $idCalzado; 
        
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
        
    } 
    public function guardarDetalle($usuario){
        
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

    public function actualizarVenta($i){
        
        $this->arrayCalzados[$i]['cantidad'] = $this->stock;
        $this->arrayCalzados[$i]['precioVenta'] = $this->precio;

        $this->stock   = 0;
        $this->precio = 0;
        $this->precioCompra = 0;
    }
}

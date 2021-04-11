<?php

namespace App\Http\Livewire;

use App\Models\Calzado;
use App\Models\Carrito;
use App\Models\DetalleCarrito;
use Livewire\Component;

class WebDetalleCarrito extends Component{

    public $idCarrito;
    public $idCliente;
    public $idCalzado;
    public $cantidad;
    public $talla;


    public $total;
    protected $listeners = [
        'actualizarDetalle' => 'render'
    ];

    public function render(){

        $carrito = Carrito::join('clientes','clientes.id','carrito.idCliente')
        ->join('detallecarrito','detallecarrito.idCarrito','carrito.id')
        ->where("clientes.id","=",$this->idCliente)
        ->get();


        $carrito1 = Carrito::join('clientes','clientes.id','carrito.idCliente')
        ->where("clientes.id","=",$this->idCliente)->get();
        $this->total = $carrito1[0]->monto;


        return view('livewire.web-detalle-carrito',[
            "carrito"=>$carrito
        ]);
    }
    public function mount($idCliente){
        $this->idCarrito = (Carrito::where("idCliente","=",$idCliente)->get())[0]->id;
        $this->idCliente = $idCliente;
    }
    public function añadirAlCarrito(){
        
        $detalle =  new DetalleCarrito();
        $detalle->cantidad = $this->cantidad;
        $detalle->talla = $this->talla;
        $detalle->idCalzado = $this->idCalzado;
        $detalle->idCarrito = $this->idCarrito;
        $detalle->save();

        $calzado = Calzado::findOrFail($detalle->idCalzado);
        $this->total = $this->total +  ($detalle->cantidad * $calzado->precioVenta);
        
        $carrito= Carrito::findOrFail($detalle->idCarrito);
        $carrito->monto = $this->total;

    }
    public function sumarTotal(){
        
    }
    public function eliminar($idDetalle){
        
        $detalle = DetalleCarrito::findOrFail($idDetalle);
        $calzado = Calzado::findOrFail($detalle->idCalzado);
        $this->total = $this->total -  ($detalle->cantidad * $calzado->precioVenta);
        
        $carrito= Carrito::findOrFail($detalle->idCarrito);
        $carrito->monto = $this->total;
        $carrito->update();
        $detalle->delete();

        $this->emit("eliminar");
    }

}

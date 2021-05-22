<?php

namespace App\Http\Livewire;

use App\Models\Pedido;
use Livewire\Component;

class RepartidorPedidos extends Component
{
    public $idUser;
    public function render(){

        return view('livewire.repartidor-pedidos',[
            'pedidos' => Pedido::join('repartidores','repartidores.id','=','pedido.idRepartidor')
            ->select(
                "pedido.id",
                "pedido.fecha",
                "pedido.fechaentrega",
                "pedido.hora",
                "pedido.horaentrega",
                "pedido.tiempoentrega",
                "pedido.montoTotal",
                "pedido.estado",
                "pedido.idUbicacion",
                "pedido.idRepartidor",
                "pedido.idCliente",
            )
            ->where('repartidores.id','=',$this->idUser)
            ->orderBy('pedido.id', 'asc')
            ->paginate(10)
        ]);
        
    }

    public function mount( $idUser){
        $this->idUser= $idUser;
    }
}

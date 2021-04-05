<?php

namespace App\Http\Livewire;

use App\Models\Pedido;
use Livewire\Component;

class RepartidorPedidos extends Component
{
    public $idUser;
    public function render()
    {
        return view('livewire.repartidor-pedidos',[
            'pedidos' => Pedido::where('repartidores.id','=',$this->idUser)->paginate()

        ]);
        
    }

    public function mount( $idUser){
        $this->idUser= $idUser;
    }
}

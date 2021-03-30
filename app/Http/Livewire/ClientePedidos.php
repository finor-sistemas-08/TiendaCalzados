<?php

namespace App\Http\Livewire;

use App\Models\Pedido;
use Livewire\Component;
use Livewire\WithPagination;

class ClientePedidos extends Component
{
    public $idUser;
    use WithPagination;
    public function render()
    {

        return view('livewire.cliente-pedidos',[
            'pedidos' => Pedido::where('clientes.id','=',$this->idUser)->paginate()
        ]);
    }

    public function mount($idUser){
        $this->idUser = $idUser;
    }
}

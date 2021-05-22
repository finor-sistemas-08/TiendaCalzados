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
            'pedidos' => Pedido::join('clientes','clientes.id','=','pedido.idCliente')
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
            ->where('clientes.id','=',$this->idUser)
            ->orderBy('pedido.id', 'asc')
            ->paginate()
        ]);
    }

    public function mount($idUser){
        $this->idUser = $idUser;
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ActualizarInventario extends Component
{
    public $arrayCalzados;

    public function render()
    {
        return view('livewire.actualizar-inventario');
    }

    public function mount($arrayCalzados)
    {
        $this->arrayCalzados = $arrayCalzados;
    }
}

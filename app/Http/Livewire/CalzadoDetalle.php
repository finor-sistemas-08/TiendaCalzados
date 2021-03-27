<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CalzadoDetalle extends Component
{
    public $calzado;
    public function render()
    {
        return view('livewire.calzado-detalle');
    }
    public function mount($calzado){
        $this->calzado =  $calzado;
    }
}

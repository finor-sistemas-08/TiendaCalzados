<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WebTipoCalzado extends Component
{
    public $tipo;
    public function render()
    {
        return view('livewire.web-tipo-calzado');
    }
    
    public function mount($tipo){
        $this->tipo = $tipo;
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WebMarca extends Component
{
    public $marca;
    public function render()
    {
        return view('livewire.web-marca');
    }
    public function mount($marca){
        $this->marca = $marca;
    }
}

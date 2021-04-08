<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WebCategoria extends Component
{
    public $categoria;
    public function render()
    {
        return view('livewire.web-categoria');
    }
    public function mount($categoria){
        $this->categoria = $categoria;
    }
}

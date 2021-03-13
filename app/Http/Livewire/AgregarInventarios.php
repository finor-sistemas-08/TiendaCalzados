<?php

namespace App\Http\Livewire;

use App\Models\Calzado;
use App\Models\CalzadoAlmacen;
use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class AgregarInventarios extends Component{
    
    use WithPagination;
    public $idCalzado;
    public $idAlmacen = null;
    public $arrayCalzados = [];
    public $cantidad = 0; 
    public $stocks = []; 
    public $vP = false;
    public $searchText;
    public $mensajeAlmacen = 'Seleccione un Almacen';
    public $final = false ;

    public function render(){
        $searchText = '%'.$this->searchText.'%';
        return view('livewire.agregar-inventarios',
            [
                'calzados' => Calzado::where('nombre','LIKE','%'.$searchText.'%')->paginate(3)
            ]
        );
    }

    public function agregarCalzado($idCalzado){
        $this->idCalzado = $idCalzado;        
        array_push($this->arrayCalzados,[
            "idCalzados"        => $this->idCalzado,
            "cantidad"          => $this->cantidad,
            "idAlmacen"         => $this->idAlmacen
        ]); 

        $this->cantidad = 0;

        
    }
    public function agregarAlmacen($idAlmacen){
        $this->idAlmacen = $idAlmacen;
    }
    public function verProducto($idCalzado){
        $this->vP = true;
        $this->idCalzado = $idCalzado;

    }
    public function verTablaProducto(){
        $this->vP = false;

    }
    public function seleccionarCalzado(){
        array_push($this->arrayCalzados,[
            "idCalzados"        => $this->idCalzado,
            "cantidad"          => $this->cantidad,
            "idAlmacen"         => $this->idAlmacen
        ]); 
        $this->cantidad =0;
    }

    public function guardarInventario(){
        $c = count($this->arrayCalzados);
        
        for ($i=0; $i < $c; $i++) { 
            $calzadoAlmacen = new CalzadoAlmacen();
            $calzadoAlmacen->idCalzado = $this->arrayCalzados[$i]['idCalzados'] ;
            $calzadoAlmacen->idAlmacen = $this->arrayCalzados[$i]['idAlmacen'] ;
            $calzadoAlmacen->stock     = $this->arrayCalzados[$i]['cantidad'] ;
            $calzadoAlmacen->save();

            $this->final = true;
        }
    }
}

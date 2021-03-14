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
    public $index;

    public $cantidad     = 0; 

    public $stock =0 ; 
    public $precioVenta =0 ;
    public $precioCompra =0;


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

    // public function mount(){
    //     $this->stock        = 0;
    //     $this->precioVenta  = 0;
    //     $this->precioCompra = 0;
    // }
   

    public function agregarCalzado($idCalzado){
        $this->idCalzado = $idCalzado; 
        $calzado = Calzado::findOrFail($idCalzado);


        array_push($this->arrayCalzados,[
            "idCalzados"        => $this->idCalzado,
            "nombre"            => $calzado->nombre,
            "precioVenta"       => $calzado->precioVenta,
            "precioCompra"      => $calzado->precioCompra,
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
        $calzado = Calzado::findOrFail($this->idCalzado);

        array_push($this->arrayCalzados,[
            "idCalzados"        => $this->idCalzado,
            "nombre"            => $calzado->nombre,
            "precioVenta"       => $calzado->precioVenta,
            "precioCompra"      => $calzado->precioCompra,
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

    // modifica precio y stock

    // public function cargarPrecios($index){
        // $this->index = $index;


        // $this->stock   = $this->arrayCalzados[$index]['cantidad'];
        // $this->precioVenta = $this->arrayCalzados[$index]['precioVenta'];
        // $this->precioCompra = $this->arrayCalzados[$index]['precioCompra'];

        
    // }
    public function actualizarPrecioStock($i){
        $this->arrayCalzados[$i]['cantidad'] = $this->stock;
        $this->arrayCalzados[$i]['precioVenta'] = $this->precioVenta;
        $this->arrayCalzados[$i]['precioCompra'] = $this->precioCompra;

        $this->stock   = 0;
        $this->precioVenta = 0;
        $this->precioCompra = 0;


    }
    public function eliminarCalzado($index){
        $arrayAuxiliar = [];

        $count = count($this->arrayCalzados);
        $c = 0;

        for ($i=0; $i < $count; $i++) { 
            if($i != $index){
                $c = $c + 1;
                $arrayAuxiliar[$i] = $this->arrayCalzados[$c];                
            }
        }

    }
    //     $count = count($this->arrayCalzados);
    //     for ($i=0; $i < $count; $i++) { 
    //         if($i == $index){
                 
    //         }
    //     }
    //     unset($this->arrayCalzados[$i]);
    //     // print_r($this->arrayCalzados);
    //     var_dump($this->arrayCalzados);

    //     // unset($this->arrayCalzados[$i]['nombre']);
    //     // unset($this->arrayCalzados[$i]['precioVenta']);
    //     // unset($this->arrayCalzados[$i]['precioCompra']);
    //     // unset($this->arrayCalzados[$i]['cantidad']);
    //     // unset($this->arrayCalzados[$i]['idAlmacen']);

    // }
}

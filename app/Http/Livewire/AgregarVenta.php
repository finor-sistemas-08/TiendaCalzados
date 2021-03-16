<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Calzado;
use App\Models\CalzadoAlmacen;
use Livewire\Component;
use Livewire\WithPagination;

class AgregarVenta extends Component
{
    use WithPagination;
    public $idCliente;
    public $idCalzado;
    public $idAlmacen = null;
    public $arrayCalzados = [];
    public $index;

    public $cantidad     = 0; 

    public $stock = 0 ; 
    public $precioVenta =0 ;
    public $precioCompra =0;


    public $vP = false;
    public $searchTextCalzado;
    public $searchTextCliente;
    public $mensajeAlmacen = 'Seleccione un Almacen';
    public $final = false ;


    public function render()
    {
        $searchTextCalzado='%'.$this->searchTextCalzado.'%';
        $searchTextCliente='%'.$this->searchTextCliente.'%';
        $idAlmacen = $this->idAlmacen;
        return view('livewire.venta.agregar-venta',[
            'clientes' => Cliente::where('nombre','LIKE','%'.$searchTextCliente.'%')
                                ->orWhere('apellidos','LIKE','%'.$searchTextCliente.'%')
                                ->paginate(3),
            'calzados' =>CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
                                    ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
                                    ->select('almacenes.id as idAlmacen',
                                             'almacenes.sigla',
                                             'calzados.id as idCalzado',
                                             'calzados.nombre as calzado',
                                             'calzados.precioVenta',
                                             'calzado_almacen.id as idCalzadoAlmacen'
                                    )
                                    ->where('calzado_almacen.idAlmacen','=',$idAlmacen)
                                    ->where('nombre','LIKE','%'.$searchTextCalzado.'%')->paginate(3)
        ]);
    }

    public function agregarCliente($cliente){
        $cliente;
    }
    public function seleccionarCliente(){
        
    }

    public function agregarCalzado($idCalzado){
        $this->idCalzado = $idCalzado; 
        $calzado = Calzado::findOrFail($idCalzado);


        array_push($this->arrayCalzados,[
            "idCalzados"        => $this->idCalzado,
            "nombre"            => $calzado->nombre,
            "precioVenta"       => $calzado->precioVenta,
            "cantidad"          => $this->cantidad,
            "idAlmacen"         => $this->idAlmacen
        ]); 

        $this->cantidad = 0;

        
    }
        
        
}

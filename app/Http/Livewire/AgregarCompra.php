<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proveedor;
use App\Models\Calzado;
use App\Models\CalzadoAlmacen;
use Livewire\WithPagination;

class AgregarCompra extends Component
{
    use WithPagination;
    public $idProveedor;
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
    public $searchTextProveedor;
    public $mensajeAlmacen = 'Seleccione un Almacen';
    public $final = false ;

    public function render()
    {
        $searchTextCalzado='%'.$this->searchTextCalzado.'%';
        $searchTextProveedor='%'.$this->searchTextProveedor.'%';
        $idAlmacen = $this->idAlmacen;
        return view('livewire.compra.agregar-compra',[
            'proveedores' => Proveedor::where('nombre','LIKE','%'.$searchTextProveedor.'%')
                                ->orWhere('apellidos','LIKE','%'.$searchTextProveedor.'%')
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

    public function agregarProveedor($proveedor){
        $proveedor;
    }
    public function seleccionarProveedor(){
        
    }

    public function agregarCalzado($idCalzado){
        $this->idCalzado = $idCalzado; 
        $calzado = Calzado::findOrFail($idCalzado);


        array_push($this->arrayCalzados,[
            "idCalzados"        => $this->idCalzado,
            "nombre"            => $calzado->nombre,
            "precioCompra"       => $calzado->precioCompra,
            "cantidad"          => $this->cantidad,
            "idAlmacen"         => $this->idAlmacen
        ]); 

        $this->cantidad = 0;

        
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Compra;


class DetalleCompra extends Component
{
    public $searchText ;
    public function render()
    {
        $searchText = '%'.$this->searchText.'%';
        return view('livewire.compra.detalle-compra',
            [
                'compras' => Compra::join('users','users.id','=','nota_compra.idUser')
                ->join('proveedores','proveedores.id','=','nota_compra.idProveedor')
                ->select('nota_compra.id',
                         'proveedores.nombre',
                         'proveedores.apellidos',
                         'nota_compra.fecha',
                         'nota_compra.montoTotal',
                         'nota_compra.idProveedor',
                         'nota_compra.idUser',
                         )
                ->where('proveedores.nombre','LIKE','%'.$searchText.'%')
                ->paginate(10)
            ]
        );
    }
}

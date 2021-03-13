<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalzadoAlmacen;
use Livewire\WithPagination;

class Inventario extends Component{
    use WithPagination;
    public $searchText;

    public function render()
    {
        $searchText = '%'.$this->searchText.'%';
        return view('livewire.inventario',
        
            ['calzadoAlmacenes' => CalzadoAlmacen::select('calzado_almacen.id',
            'calzado_almacen.stock',
            'calzados.nombre as calzado',        
            'categorias.nombre as categoria',
            'tipo_calzados.tipo as tipo',
            'marca_modelos.id as idMarcaModelo',        
            'marcas.nombre as marca',
            'modelos.nombre as modelo',
            'almacenes.sigla as almacen'
            )
            ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
            ->join('categorias','categorias.id','=','calzados.idCategoria')
            ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
            ->join('marca_modelos','marca_modelos.id','=','calzados.idMarcaModelo')
            ->join('marcas','marcas.id','=','marca_modelos.idMarca')
            ->join('modelos','modelos.id','=','marca_modelos.idModelo')
            ->join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
            // ->where('calzados.nombre','LIKE','%'.$searchText.'%')
            ->orWhere('almacenes.sigla','LIKE','%'.$searchText.'%')
            ->paginate(10)]
        );
    }

}

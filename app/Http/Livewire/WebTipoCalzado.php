<?php

namespace App\Http\Livewire;

use App\Models\Calzado;
use Livewire\Component;

class WebTipoCalzado extends Component
{
    public $tipo;
    public $lista = false;
    public $searchText;
    public $atributo ;
    public $criterio ="calzados";


    public function render(){
        $criterio = "marcas";
        $atributo = "";
        $idTipo = 1;
        $searchText = "%".$this->searchText."%";
        if($criterio=='categorias'){$this->atributo = 'nombre';}
        if($criterio=='marcas'){$this->atributo = 'nombre';}
        if($criterio=='calzados'){$this->atributo = 'descripcion';}
        
        $atributo = $this->atributo;

        $calzado = Calzado::select(
            "calzados.id as idCalzado",
            "calzados.descripcion",
            "calzados.precioVenta as precio",
            "calzados.imagen as img",
            "calzados.idMarcaModelo",
            "tipo_calzados.tipo",
            "categorias.nombre as categoria",
            "marcas.nombre as marca",
            "marcas.id as idMarca",
            "categorias.id as idCategoria",
        )->
        join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
        ->join('categorias','categorias.id','=','calzados.idCategoria')
        ->join('marca_modelos','marca_modelos.id','=','calzados.idMarcaModelo')
        ->join('marcas','marcas.id','=','marca_modelos.idMarca')
        ->where('tipo_calzados.id','=',$idTipo)
        ->where($criterio.'.'.$atributo,'LIKE','%'.$searchText.'%')
        ->get();

        if($calzado){
            $calzado = Calzado::select(
                "calzados.id as idCalzado",
                "calzados.descripcion",
                "calzados.precioVenta as precio",
                "calzados.imagen as img",
                "calzados.idMarcaModelo",
                "tipo_calzados.tipo",
                "categorias.nombre as categoria",
                "marcas.nombre as marca",
                "marcas.id as idMarca",
                "categorias.id as idCategoria",
            )->
            join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
            ->join('categorias','categorias.id','=','calzados.idCategoria')
            ->join('marca_modelos','marca_modelos.id','=','calzados.idMarcaModelo')
            ->join('marcas','marcas.id','=','marca_modelos.idMarca')
            ->where('tipo_calzados.id','=',$idTipo)
            ->get();    
        }


        return view('livewire.web-tipo-calzado',[
            'calzados' => $calzado
        ]);
    }
    
    public function mount($tipo){
        $this->tipo = $tipo;
    }

    public function buscarCalzado($criterio,$searchText,$idTipo){
        if($criterio=='categorias'){$this->atributo = 'nombre';}
        if($criterio=='marcas'){$this->atributo = 'nombre';}
        if($criterio=='calzados'){$this->atributo = 'descripcion';}
        
        $attr = $this->atributo;

        $calzado = Calzado::join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
        ->join('categorias','categorias.id','=','calzados.idCategoria')
        ->where('tipo_calzados.id','=',$idTipo)
        ->where($criterio.'.'.$attr,'LIKE','%'.$searchText.'%')
        ->get();


        return $calzado;
    }

}

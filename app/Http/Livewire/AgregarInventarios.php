<?php

namespace App\Http\Livewire;

use App\Models\Almacen;
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
    public $criterio ;
    public $message;
    public $errorCodigo;
    public $errorExiste;

    public $searchCodigo;
    public $codigo;


// Almacen
    public $sigla;


    public $cantidad    ; 

    public $stock  ; 
    public $precioVenta  ;
    public $precioCompra ;


    public $vP = false;
    public $searchText;
    public $mensajeAlmacen = 'Seleccione un Almacen';
    public $final = false ;

    public function render(){
       $criterio  = $this->criterio;
        $searchText = '%'.$this->searchText.'%';
        $searchCodigo = $this->searchCodigo;

        $arrayCalzado = $this->criterioBusqueda($criterio,$searchText);
        
        // if($criterio == 'tipo_calzados'){
        //     $arrayCalzado = Calzado::join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
        //     ->select('tipo_calzados.tipo as tipo','calzados.descripcion')
        //     ->where($criterio.'.tipo','LIKE','%'.$searchText.'%')
        //     ->paginate(1);
        // }else{
        //     $arrayCalzado = Calzado::paginate(10);
        // }

        
        return view('livewire.almacen.agregar-inventarios',
            [
                'calzados' => $arrayCalzado,
                'calzadoSearch' => Calzado::
                where('codigo','=',$searchCodigo)->paginate(3)
            ]
        );
    }
    public function criterioBusqueda($criterio,$searchText){
        if($criterio == 'calzados'){
            
            $calzado = Calzado::join('categorias','categorias.id','=','calzados.idCategoria')
            ->select('calzados.id','calzados.codigo','calzados.imagen','categorias.nombre as categoria','calzados.descripcion')
            ->where($criterio.'.descripcion','LIKE','%'.$searchText.'%')
            ->orWhere($criterio.'.codigo','=',$searchText)
            ->paginate(1);
            return $calzado;
        }
        if($criterio == 'categorias'){
            $calzado = Calzado::join('categorias','categorias.id','=','calzados.idCategoria')
            ->select('calzados.id','calzados.codigo','calzados.imagen','categorias.nombre as categoria','calzados.descripcion')
            ->where($criterio.'.nombre','LIKE','%'.$searchText.'%')
            ->paginate(1);
            return $calzado;
        }
        if($criterio == 'tipo_calzados'){
            $calzado = Calzado::join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
            ->select('calzados.id','calzados.codigo','calzados.imagen','tipo_calzados.tipo as tipo','calzados.descripcion')
            ->where($criterio.'.tipo','LIKE','%'.$searchText.'%')
            ->paginate(1);
            return $calzado;
        }

        if($criterio == 'marcas'){
            $calzado = Calzado::join('marca_modelos','marca_modelos.id','idMarcaModelo')
            ->join('marcas','marcas.id','=','marca_modelos.idMarca')
            ->select('calzados.id','calzados.codigo','calzados.imagen','marcas.nombre as marca','calzados.descripcion')
            ->where($criterio.'.nombre','LIKE','%'.$searchText.'%')
            ->paginate(1);
            return $calzado;
        }

        return $calzado = Calzado::paginate(5);


    }
    public function mount(){
        $this->errorExiste ='';
    }

    public function resetError(){
        $this->errorExiste = '';
    }
    public function agregarCalzado($idCalzado){
        
        $this->idCalzado = $idCalzado;
        $calzado = Calzado::findOrFail($idCalzado);

        if (is_null($this->precioVenta) ) {
            $this->precioVenta =  $calzado->precioVenta;
            $precioVenta = $this->precioVenta;
        }else{
            $precioVenta = $this->precioVenta;
        }

        if (is_null( $this->cantidad)) {
            $this->cantidad = 1;
            $precio = $this->cantidad;

        } else {
            $precio = $this->cantidad;
        }
        
        if (is_null($this->precioCompra)) {
            $this->precioCompra = $calzado->precioCompra;
            $precioCompra = $this->precioCompra;
        }else{
            $precioCompra = $this->precioCompra;
        }

        

        array_push($this->arrayCalzados,[
            "idCalzados"        => $this->idCalzado,
            "codigo"            => $calzado->codigo,
            "nombre"            => $calzado->descripcion,
            "precioVenta"       => $precioVenta,
            "precioCompra"      => $precioCompra,
            "cantidad"          => $this->cantidad,
            "idAlmacen"         => $this->idAlmacen
        ]); 

        $this->cantidad = null;
        $this->precioCompra = null;
        $this->precioVenta = null;
        
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
    public function existe($idCalzado){
        $c = count($this->arrayCalzados);
        $sw = false;
        
        for ($i=0; $i < $c; $i++) { 
            if($this->arrayCalzados[$i]['idCalzados']==$idCalzado && $this->idAlmacen == $this->arrayCalzados[$i]['idAlmacen']){
                $sw = true;
            }
        }
        return $sw;
    }
    public function seleccionarCalzado(){
        $this->resetError();
        $searchCodigo = $this->searchCodigo;
        $zapato = Calzado::where('codigo','=',$searchCodigo)->get();
        $this->idCalzado = $zapato[0]->id;
        if (!$this->existe($this->idCalzado)) {
            if($this->searchCodigo){


                $calzado = Calzado::findOrFail($this->idCalzado);

                if (is_null($this->precioVenta) ) {
                    $this->precioVenta =  $calzado->precioVenta;
                    $precioVenta = $this->precioVenta;
                }else{
                    $precioVenta = $this->precioVenta;
                }

                if (is_null( $this->cantidad)) {
                    $this->cantidad = 1;
                    $precio = $this->cantidad;

                } else {
                    $precio = $this->cantidad;
                }
                
                if (is_null($this->precioCompra)) {
                    $this->precioCompra = $calzado->precioCompra;
                    $precioCompra = $this->precioCompra;
                }else{
                    $precioCompra = $this->precioCompra;
                }

                

                array_push($this->arrayCalzados,[
                    "idCalzados"        => $calzado->id,
                    "nombre"            => $calzado->descripcion,
                    "codigo"            => $calzado->codigo,
                    "precioVenta"       => $precioVenta,
                    "precioCompra"      => $precioCompra,
                    "cantidad"          => $this->cantidad,
                    "idAlmacen"         => $this->idAlmacen
                ]); 

                $this->cantidad = null;
                $this->precioCompra = null;
                $this->precioVenta = null;
            }else{
                $this->errorCodigo = 'El calzado no existe';
            }
        } else {
           $this->errorExiste = 'El calzado ya fue seleccionado';
        }
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
    public function crearAlmacen(){
        $almacen = new Almacen();
        $almacen->sigla = $this->sigla;
        $almacen->save();
    }

    public function actualizarPrecioStock($i){


        if (is_null($this->precioVenta) ) {

        }else{
            $this->arrayCalzados[$i]['precioVenta'] = $this->precioVenta;
        }

        if (is_null( $this->cantidad)) {

        } else {
            $precio = $this->cantidad;
            $this->arrayCalzados[$i]['cantidad'] = $this->cantidad;
        }
        
        if (is_null($this->precioCompra)) {

        }else{
            $this->arrayCalzados[$i]['precioCompra'] = $this->precioCompra;
        }

        $this->cantidad   = null;
        $this->precioVenta = null;
        $this->precioCompra = null;
    }
    public function eliminarCalzado($index){
        array_splice($this->arrayCalzados,$index,1);
    }
    
}

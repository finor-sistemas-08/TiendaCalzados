<?php

namespace App\Http\Livewire;

use App\Models\Calzado;
use App\Models\CalzadoAlmacen;
use App\Models\MarcaModelo;
use App\Models\Pedido;
use App\Models\Repartidor;
use Livewire\Component;
use Livewire\WithPagination;

class Delivery extends Component
{
    public $searchText;
    use WithPagination;
    public $opcion = false;
    public $idPedido;
    public $arrayCalzado;
    public $cantidad = 0;

    public function render(){
        $arrayCalzado = $this->arrayCalzado;
        
        $searchText = '%'.$this->searchText.'%';
        return view('livewire.delivery',[
            'arrayCalzado' => $arrayCalzado,
            'repartidores' => Repartidor::paginate(10),
            'pedidos' => Pedido::
            // join('repartidores','repartidores.id','=','pedido.idRepartidor')
            join('clientes','clientes.id','=','pedido.idCliente')
            ->select(
                "pedido.id",
                "pedido.fecha",
                "pedido.fechaentrega",
                "pedido.hora",
                "pedido.horaentrega",
                "pedido.tiempoentrega",
                "pedido.montoTotal",
                "pedido.estado",
                "pedido.idUbicacion",
                "pedido.idRepartidor",
                "pedido.idCliente",
            )
            ->orderBy('pedido.id','desc')
            ->where('clientes.nombre','LIKE','%'.$searchText.'%')
            ->paginate(10)
        ]);
    }
    public function seleccionarRepartidor($idPedido,$idRepartidor){
        
        $pedido = Pedido::findOrFail($idPedido);
        $pedido->idRepartidor = $idRepartidor;
        $pedido->update();
        $message =  "Repartidor seleccionado";
        $this->emit('message',$message);

    }

    public function atenderPedido($idPedido){
        $this->opcion = true;
        $this->idPedido = $idPedido;
    }
    public function verListaPedido(){
        $this->opcion = false;
    }
    public function buscarCalzado($idCalzado,$cantidad){
        $this->cantidad = $cantidad;
        
        $calzado  = Calzado::findOrFail($idCalzado);

        $marcaModelo  = MarcaModelo::join('calzados','calzados.idMarcaModelo','=','marca_modelos.id')
        ->where('calzados.id','=',$calzado->id)->get();
        



        $calzadoAlmacen  = CalzadoAlmacen::join('calzados','calzados.id','=','calzado_almacen.idCalzado')
        ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
        ->join('categorias','categorias.id','=','calzados.idCategoria')
        ->join('marca_modelos','marca_modelos.id','=','calzados.idMarcaModelo')
        ->select('calzados.id as idCalzado',
                 'calzado_almacen.idAlmacen as idAlmacen',
                 'calzado_almacen.id as idCalzadoAlmacen',
                 'calzado_almacen.stock',
        )
        ->where('categorias.id','=',$calzado->idCategoria)
        ->where('tipo_calzados.id','=',$calzado->idTipoCalzado)
        ->where('marca_modelos.idMarca','=',$marcaModelo[0]->idMarca)
        ->where('calzados.descripcion','LIKE','%'.$calzado->descripcion.'%')->get();
        $this->arrayCalzado = $calzadoAlmacen;
    }
    public function venderCalzado($idCalzadoAlmacen){
        $calzadoAlmacen = CalzadoAlmacen::findOrFail($idCalzadoAlmacen);
        $calzadoAlmacen->stock = $calzadoAlmacen->stock - $this->cantidad;
        $calzadoAlmacen->update();
        $message = "Calzado seleccionado";
        $this->emit('message',$message);
    }
}

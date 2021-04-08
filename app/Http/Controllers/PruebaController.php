<?php

namespace App\Http\Controllers;

use App\Models\Calzado;
use App\Models\CalzadoAlmacen;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function buscar(){

        $criterio = "marcas";
        $atributo = "";
        $idTipo = 1;
        $searchText = "sjhkjhsk";
        if($criterio=='categorias'){$atributo = 'nombre';}
        if($criterio=='marcas'){$atributo = 'nombre';}
        if($criterio=='calzados'){$atributo = 'descripcion';}


        
        // $attr = $this->atributo;

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


        return $calzado;

        // $calzado = Calzado::
        // join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')->where('tipo_calzados.id','=',1)->get();
        // // $criterio = 'categorias';

        return $calzado;


        // $searchCodigo = "Manaco";
        // $idAlamcen = 1;
        // $criterio = 'marcas';

        // if($criterio == 'calzados'){
            
        //     $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
        //     ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
        //     ->join('categorias','categorias.id','=','calzados.idCategoria')

        //     ->select('categorias.nombre as categoria',
        //             'calzados.id as idCalzado',
        //             'calzados.descripcion',
        //             'calzados.imagen',
        //             'calzados.codigo',
        //             'calzados.precioVenta',
        //             'calzados.precioCompra',
        //             'almacenes.id as idAlmacen',
        //             'almacenes.sigla',
        //             'calzado_almacen.id as idCalzadoAlmacen',
        //             )
        //     ->where($criterio.'.descripcion','LIKE','%'.$searchCodigo.'%')
        //     ->where('almacenes.id','=',$idAlamcen)
        //     ->orWhere($criterio.'.codigo','=',$searchCodigo)
        //     ->paginate(1);
        //     return $calzado;
        // }
        // if($criterio == 'categorias'){
        //     $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
        //     ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
        //     ->join('categorias','categorias.id','=','calzados.idCategoria')

        //     ->select('categorias.nombre as categoria',
        //             'calzados.id as idCalzado',
        //             'calzados.descripcion',
        //             'calzados.imagen',
        //             'calzados.codigo',
        //             'calzados.precioVenta',
        //             'calzados.precioCompra',
        //             'almacenes.id as idAlmacen',
        //             'almacenes.sigla',
        //             'calzado_almacen.id as idCalzadoAlmacen',
        //             )
        //     ->where('almacenes.id','=',$idAlamcen)
        //     ->where($criterio.'.nombre','LIKE','%'.$searchCodigo.'%')
        //     ->paginate(1);
        //     return $calzado;
        // }
        // if($criterio == 'tipo_calzados'){
        //     $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
        //     ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
        //     ->join('categorias','categorias.id','=','calzados.idCategoria')
        //     ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
        //     ->select('categorias.nombre as categoria',
        //             'calzados.id as idCalzado',
        //             'calzados.descripcion',
        //             'calzados.imagen',
        //             'calzados.codigo',
        //             'calzados.precioVenta',
        //             'calzados.precioCompra',
        //             'almacenes.id as idAlmacen',
        //             'almacenes.sigla',
        //             'calzado_almacen.id as idCalzadoAlmacen',
        //             'tipo_calzados.tipo as tipo',
        //             )
        //     ->where('almacenes.id','=',$idAlamcen)
        //     ->where($criterio.'.tipo','LIKE','%'.$searchCodigo.'%')
        //     ->paginate(1);
        //     return $calzado;
        // }

        // if($criterio == 'marcas'){
        //     $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
        //     ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
        //     ->join('categorias','categorias.id','=','calzados.idCategoria')
        //     ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
        //     ->join('marca_modelos','marca_modelos.id','calzados.idMarcaModelo')
        //     ->join('marcas','marcas.id','=','marca_modelos.idMarca')
        //     ->select('categorias.nombre as categoria',
        //             'calzados.id as idCalzado',
        //             'calzados.descripcion',
        //             'calzados.imagen',
        //             'calzados.codigo',
        //             'calzados.precioVenta',
        //             'calzados.precioCompra',
        //             'almacenes.id as idAlmacen',
        //             'almacenes.sigla',
        //             'calzado_almacen.id as idCalzadoAlmacen',
        //             'tipo_calzados.tipo as tipo',
        //             )
        //     ->where('almacenes.id','=',$idAlamcen)
        //     ->where($criterio.'.nombre','LIKE','%'.$searchCodigo.'%')
        //     ->paginate(1);
        //     return $calzado;
        // }
        // $sw = 0;
        // $existe = CalzadoAlmacen::where('idAlmacen','=',1)
        //                          ->where('idCalzado','=',1)
        //                          ->get();
        // if (count($existe)) {
        //     $sw = 1;
        // }
        // return $sw;

        // $calzadoAlmacen = CalzadoAlmacen::where('idAlmacen','=',1)
        // ->where('idCalzado','=',1)
        // ->get();



        // return $calzadoAlmacen[0]->id;

        

    }
    public function existeCalzado($idCalzado,$idAlmacen){
        $sw = false;
        $existe = CalzadoAlmacen::where('idAlmacen','=',$idAlmacen)
                                 ->where('idCalazado','=',$idCalzado)
                                 ->get();
        if (count($existe)) {
            $sw = true;
        }
        return $sw;
    }
}

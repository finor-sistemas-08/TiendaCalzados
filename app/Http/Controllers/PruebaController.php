<?php

namespace App\Http\Controllers;

use App\Models\Calzado;
use App\Models\CalzadoAlmacen;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function buscar(){
        // $criterio = 'categorias';


        $searchCodigo = "Manaco";
        $idAlamcen = 1;
        $criterio = 'marcas';

        if($criterio == 'calzados'){
            
            $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
            ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
            ->join('categorias','categorias.id','=','calzados.idCategoria')

            ->select('categorias.nombre as categoria',
                    'calzados.id as idCalzado',
                    'calzados.descripcion',
                    'calzados.imagen',
                    'calzados.codigo',
                    'calzados.precioVenta',
                    'calzados.precioCompra',
                    'almacenes.id as idAlmacen',
                    'almacenes.sigla',
                    'calzado_almacen.id as idCalzadoAlmacen',
                    )
            ->where($criterio.'.descripcion','LIKE','%'.$searchCodigo.'%')
            ->where('almacenes.id','=',$idAlamcen)
            ->orWhere($criterio.'.codigo','=',$searchCodigo)
            ->paginate(1);
            return $calzado;
        }
        if($criterio == 'categorias'){
            $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
            ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
            ->join('categorias','categorias.id','=','calzados.idCategoria')

            ->select('categorias.nombre as categoria',
                    'calzados.id as idCalzado',
                    'calzados.descripcion',
                    'calzados.imagen',
                    'calzados.codigo',
                    'calzados.precioVenta',
                    'calzados.precioCompra',
                    'almacenes.id as idAlmacen',
                    'almacenes.sigla',
                    'calzado_almacen.id as idCalzadoAlmacen',
                    )
            ->where('almacenes.id','=',$idAlamcen)
            ->where($criterio.'.nombre','LIKE','%'.$searchCodigo.'%')
            ->paginate(1);
            return $calzado;
        }
        if($criterio == 'tipo_calzados'){
            $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
            ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
            ->join('categorias','categorias.id','=','calzados.idCategoria')
            ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
            ->select('categorias.nombre as categoria',
                    'calzados.id as idCalzado',
                    'calzados.descripcion',
                    'calzados.imagen',
                    'calzados.codigo',
                    'calzados.precioVenta',
                    'calzados.precioCompra',
                    'almacenes.id as idAlmacen',
                    'almacenes.sigla',
                    'calzado_almacen.id as idCalzadoAlmacen',
                    'tipo_calzados.tipo as tipo',
                    )
            ->where('almacenes.id','=',$idAlamcen)
            ->where($criterio.'.tipo','LIKE','%'.$searchCodigo.'%')
            ->paginate(1);
            return $calzado;
        }

        if($criterio == 'marcas'){
            $calzado = CalzadoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
            ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
            ->join('categorias','categorias.id','=','calzados.idCategoria')
            ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
            ->join('marca_modelos','marca_modelos.id','calzados.idMarcaModelo')
            ->join('marcas','marcas.id','=','marca_modelos.idMarca')
            ->select('categorias.nombre as categoria',
                    'calzados.id as idCalzado',
                    'calzados.descripcion',
                    'calzados.imagen',
                    'calzados.codigo',
                    'calzados.precioVenta',
                    'calzados.precioCompra',
                    'almacenes.id as idAlmacen',
                    'almacenes.sigla',
                    'calzado_almacen.id as idCalzadoAlmacen',
                    'tipo_calzados.tipo as tipo',
                    )
            ->where('almacenes.id','=',$idAlamcen)
            ->where($criterio.'.nombre','LIKE','%'.$searchCodigo.'%')
            ->paginate(1);
            return $calzado;
        }

    }
}

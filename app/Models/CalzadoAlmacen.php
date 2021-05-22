<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalzadoAlmacen extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'calzado_almacen';

    protected $fillable = [
        'stock',
        'idCalzado',
        'idAlmacen'
    ];
    public $timestamps =false;

    
    static function criterioBusqueda($searchText,$criterio, $idAlmacen){
        switch ($criterio) {
            case 'calzados':
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
                        'calzado_almacen.stock',
                        )
                ->where('almacenes.id','=',$idAlmacen)
                ->where($criterio.'.descripcion','LIKE','%'.$searchText.'%')
                ->orWhere($criterio.'.codigo','=',$searchText)
                ->paginate(10);
                return $calzado;
                break;

            case 'categorias':
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
                        'calzado_almacen.stock'
                        )
                ->where('almacenes.id','=',$idAlmacen)
                ->where($criterio.'.nombre','LIKE','%'.$searchText.'%')
                ->paginate(10);
                return $calzado;
                break;
            case 'tipo_calzados':
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
                        'calzado_almacen.stock',
                        'tipo_calzados.tipo as tipo'
                        )
                ->where('almacenes.id','=',$idAlmacen)
                ->where($criterio.'.tipo','LIKE','%'.$searchText.'%')
                ->paginate(10);
                return $calzado;
                break;
            case 'marcas':
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
                        'calzado_almacen.stock'
                        )
                ->where('almacenes.id','=',$idAlmacen)
                ->where($criterio.'.nombre','LIKE','%'.$searchText.'%')
                ->paginate(10);
                return $calzado;
                break;
            default:
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
                        'calzado_almacen.stock'

                        )
                ->where('almacenes.id','=',$idAlmacen)
                ->paginate(10);

                return $calzado;
                break;
        }
    }
    
}

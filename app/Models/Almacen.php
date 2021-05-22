<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'almacenes';

    protected $fillable = [
        'sigla'
    ];
    public $timestamps =false;

    static function criterioBusqueda($criterio,$searchText){
        
        switch ($criterio) {
            case 'calzados':
                $calzado = Calzado::join('categorias','categorias.id','=','calzados.idCategoria')
                ->select('calzados.id','calzados.codigo','calzados.imagen','categorias.nombre as categoria','calzados.descripcion')
                ->where($criterio.'.descripcion','LIKE','%'.$searchText.'%')
                ->orWhere($criterio.'.codigo','=',$searchText)
                ->orderBy('calzados.id','asc')
                ->paginate(10);
                return $calzado;                
                break;
            case 'categorias':
                $calzado = Calzado::join('categorias','categorias.id','=','calzados.idCategoria')
                ->select('calzados.id','calzados.codigo','calzados.imagen','categorias.nombre as categoria','calzados.descripcion')
                ->where($criterio.'.nombre','LIKE','%'.$searchText.'%')
                ->orderBy('calzados.id','asc')
                ->paginate(10);
                return $calzado;
                break;
            case 'tipo_calzados':
                $calzado = Calzado::join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
                ->select('calzados.id','calzados.codigo','calzados.imagen','tipo_calzados.tipo as tipo','calzados.descripcion')
                ->where($criterio.'.tipo','LIKE','%'.$searchText.'%')
                ->orderBy('calzados.id','asc')
                ->paginate(10);
                return $calzado;
                break;
            case 'marcas':
                $calzado = Calzado::join('marca_modelos','marca_modelos.id','idMarcaModelo')
                ->join('marcas','marcas.id','=','marca_modelos.idMarca')
                ->select('calzados.id','calzados.codigo','calzados.imagen','marcas.nombre as marca','calzados.descripcion')
                ->where($criterio.'.nombre','LIKE','%'.$searchText.'%')
                 ->orderBy('calzados.id','asc')
                ->paginate(10);
                return $calzado;
    
                break;
            default:
            $calzado = Calzado::join('categorias','categorias.id','=','calzados.idCategoria')
            ->select('calzados.id','calzados.codigo','calzados.imagen','categorias.nombre as categoria','calzados.descripcion')
            // ->where($criterio.'.descripcion','LIKE','%'.$searchText.'%')
            // ->orWhere($criterio.'.codigo','=',$searchText)
            ->orderBy('calzados.id','asc')
            ->paginate(10);
            return $calzado;                
                return $calzado;
                break;
        }
        
    }
}

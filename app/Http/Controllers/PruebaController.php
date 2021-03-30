<?php

namespace App\Http\Controllers;

use App\Models\Calzado;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function buscar(){
        // $criterio = 'categorias';


        $searchCodigo = "nike";
        $criterio = 'marcas';

        if($criterio == 'calzados'){
            $calzado = Calzado::join('categorias','categorias.id','=','calzados.idCategoria')
            ->select('categorias.nombre as categoria','calzados.descripcion')
            ->where($criterio.'.descripcion','LIKE','%'.$searchCodigo.'%')
            ->orWhere($criterio.'.codigo','=',$searchCodigo)
            ->paginate(1);
            return $calzado;
        }
        if($criterio == 'categorias'){
            $calzado = Calzado::join('categorias','categorias.id','=','calzados.idCategoria')
            ->select('categorias.nombre as categoria','calzados.descripcion')
            ->where($criterio.'.nombre','LIKE','%'.$searchCodigo.'%')
            ->paginate(1);
            return $calzado;
        }
        if($criterio == 'tipo_calzados'){
            $calzado = Calzado::join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
            ->select('tipo_calzados.tipo as tipo','calzados.descripcion')
            ->where($criterio.'.tipo','LIKE','%'.$searchCodigo.'%')
            ->paginate(1);
            return $calzado;
        }

        if($criterio == 'marcas'){
            $calzado = Calzado::join('marca_modelos','marca_modelos.id','idMarcaModelo')
            ->join('marcas','marcas.id','=','marca_modelos.idMarca')
            ->select('marcas.nombre as marca','calzados.descripcion')
            ->where($criterio.'.nombre','LIKE','%'.$searchCodigo.'%')
            ->paginate(1);
            return $calzado;
        }

    }
}

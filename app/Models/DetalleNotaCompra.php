<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleNotaCompra extends Model
{
    use HasFactory;
    protected $table = 'detalle_compra';
    protected $primaryKey ='id';
    protected $fillable = [
        'cantidad',
        'subTotal',
        'idCalzadoAlmacen',
        'idNotaCompra',
    ];
    public $timestamps=false;
}

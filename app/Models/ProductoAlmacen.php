<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoAlmacen extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'producto_almacen';

    protected $fillable = [
        'stock',
        'idProducto',
        'idAlmacen'

    ];
    public $timestamps =false;
}

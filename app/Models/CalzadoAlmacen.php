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
}

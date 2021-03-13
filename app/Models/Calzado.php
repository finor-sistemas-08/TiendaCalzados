<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calzado extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'calzados';

    protected $fillable = [
        'nombre',
        'precioVenta',
        'precioCompra',
        'imagen',
        'idCategoria',
        'idMarcaModelo',
        'idTipoCalzado'
    ];
    public $timestamps = false;
}

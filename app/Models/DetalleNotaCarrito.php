<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleNotaCarrito extends Model
{
    use HasFactory;
    protected $table = 'detallecarrito';
    protected $primaryKey ='id';
    protected $fillable = [
        'cantidad',
        'talla',
        'estado',
        'idCarrito',
        'idCalzado'
    ];
    public $timestamps=false;
}

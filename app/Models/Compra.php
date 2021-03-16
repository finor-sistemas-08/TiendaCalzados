<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'nota_compra';

    protected $fillable = [
        'fecha',
        'montoTotal',
        'idProveedor',
        'idUser',
    ];
    public $timestamps = false;
    
}

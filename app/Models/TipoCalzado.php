<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCalzado extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'tipo_calzados';

    protected $fillable = [
        'tipo',
        'idImagen'

    ];
    public $timestamps = false;
}
